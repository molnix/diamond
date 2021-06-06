<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminProductImageUpdateRequest;
use App\ProductImages;
use App\Service\fileServices;
use Illuminate\Support\Facades\Hash;

class ProductImagesController extends Controller
{
    public function update(AdminProductImageUpdateRequest $request, $id, $image_id, fileServices $fileServices){
        $product_image=ProductImages::find($image_id);
        $fileServices->deleteFile($product_image->image_url);
        $time = str_replace('/','a',Hash::make(time()));
        $time = str_replace('.','_',$time);
        $image_path="product_img/".$product_image->product_id."/".$time."/";
        $product_image->update([
            'image_url'=>$image_path.$request->file('update_image_file')->getClientOriginalName(),
        ]);
        $fileServices->uploadFile($request->file('update_image_file'),$image_path);
        return redirect()->back();
    }
    public function delete($id, $image_id, fileServices $fileServices){
        $image=ProductImages::find($image_id);
        $fileServices->deleteFile($image->image_url);
        $image->delete();
        return redirect()->back();
    }
}
