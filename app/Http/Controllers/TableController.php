<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\User;
use App\Product;

class TableController extends Controller
{
    public function showAdminOrderTable(){
        return view('admin.tables.orderTable',[
            'jobs'=>Job::with('status','worker','client')->get(),
            ]);
    }
    public function showAdminUserTable(){
        return view('admin.tables.userTable',[
            'allUsers'=>User::with('access')->get(),
            ]);
    }
    public function showAdminCategoryTable(){
        return view('admin.tables.categoryTable',[
            'categories'=>Category::all(),
            ]);
    }
    public function showAdminProductTable(){
        return view('admin.tables.productTable',[
            'products'=>Product::all(),
            ]);
    }
}
