<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Category;

class CategoryController extends Controller
{
    public function show(){
        return view('admin.pages.adminCategories',[
            'user'=>auth()->user(),
            'categories'=>Category::paginate(20),
        ]);
    }
    public function create(AdminCategoryCreateRequest $request)
    {
        Category::create([
            'name' => $request['category'],
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
