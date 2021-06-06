<?php

namespace App\Http\Controllers;

use App\Price;
use App\WorkType;
use Illuminate\Http\Request;
use App\Http\Requests\PriceCreateRequest;
use App\Http\Requests\WorkTypeCreateRequest;

class PriceController extends Controller
{
    public function index(){
        return view('pricesPage.prices',[
            'work_types'=>WorkType::all(),
        ]);
    }
    public function admin_show(){
        return view('admin.pages.adminPrices',[
            'work_types'=>WorkType::all(),
        ]);
    }

    public function create_work_type(WorkTypeCreateRequest $request){
        WorkType::create([
            'name'=>$request['name'],
        ]);
        return redirect()->back();
    }
    public function delete_work_type($id){
        WorkType::find($id)->delete();
        return redirect()->back();
    }

    public function create_price(PriceCreateRequest $request){
        Price::create([
            'work_type_id'=>$request['work_type_id'],
            'name'=>$request['name'],
            'price'=>$request['price'],
        ]);
        return redirect()->back();
    }
    public function delete_price($id){
        Price::find($id)->delete();
        return redirect()->back();
    }
}
