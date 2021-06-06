<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilters;
use Illuminate\Http\Request;
use App\Http\Requests\AdminProductCreateRequest;
use App\Category;
use App\Product;
use App\ProductImages;
use App\Service\fileServices;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function admin_show(){
        return view('admin.pages.adminProducts',[
            'user'=>auth()->user(),
            'products'=>Product::paginate(20),
            'categories'=>Category::all(),
        ]);
    }

    public function index(Request $request,ProductFilters $filters){
        $url='gallery';
        $products=Product::paginate(20)->withPath($url);
        if(isset($request->categories) && $request->categories != null){
            $url.='?categories='.$request->categories;
            $products=Product::filter($filters)->paginate(20)->withPath($url);
        }
        return view('jalleryProductsPage.products',[
            'categories'=>Category::all(),
            'products'=>$products,
        ]);
    }
    public function show($id){
        return view('jalleryProductsPage.product',[
            'product'=>Product::find($id),
        ]);
    }

    public function create(AdminProductCreateRequest $request, fileServices $fileServices){
        $product=Product::create([
            'name'=>$request['name'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'category_id'=>$request['category_id'],
        ]);
        if($request->file('images')[0]!=null){
            foreach($request->file('images') as $image){
                $time = str_replace('/','a',Hash::make(time()));
                $time = str_replace('.','_',$time);
                $image_path="product_img/".$product->id."/".$time."/";
                ProductImages::create([
                    'product_id'=>$product->id,
                    'image_url'=>$image_path.$image->getClientOriginalName(),
                ]);
                $fileServices->uploadFile($image,$image_path);
            }
        }

        return redirect()->back();
    }
    public function delete($id, fileServices $fileServices){
        $product=Product::with('product_images')->find($id);
        if(isset($product->product_images[0])){
            $files=array();
            foreach ($product->product_images as $image){
                array_push($files,$image->image_url);
            }
            $fileServices->deleteFile($files);
            $product->product_images()->delete();
        }
        $product->delete();
        return redirect()->back();
    }
    public function show_admin_update($id){
        return view('admin.updates.updateProduct',[
            'product'=>Product::with('category','product_images')->find($id),
            'categories'=>Category::all(),
        ]);
    }
    public function admin_update(AdminProductCreateRequest $request, $id, fileServices $fileServices){
        $product=Product::find($id);
        $product->update([
            'name'=>$request['name'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'category_id'=>$request['category_id'],
        ]);
        if($request->file('images')[0]!=null){
            foreach($request->file('images') as $image){
                $time = str_replace('/','a',Hash::make(time()));
                $time = str_replace('.','_',$time);
                $image_path="product_img/".$product->id."/".$time."/";
                ProductImages::create([
                    'product_id'=>$product->id,
                    'image_url'=>$image_path.$image->getClientOriginalName(),
                ]);
                $fileServices->uploadFile($image,$image_path);
            }
        }

        return redirect()->back();
    }
}
