<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyPrice;
use App\Models\TeaCategory;
use App\Models\UserRole;
use App\Models\WholesalerPurchase;
use Illuminate\Http\Request;

class WholesalerController extends Controller
{
    public function companyList(){
        return view('dashboard.wholesaler.index',[
            'userRole'=> UserRole::where('role_id',2)->get(),
        ]);

    }
    public function teaCategory(){
        return view('dashboard.wholesaler.tea_category',[
            'teaCategory'=> TeaCategory::all(),
        ]);

    }
    public function purchaselist(){
        return view('dashboard.wholesaler.purchaselist',[
            'purchases'=> WholesalerPurchase::all(),
        ]);

    }
    public function purchase($id){
        return view('dashboard.wholesaler.purchase',[
            'tea'=>DailyPrice::where('id',$id)->first(),
        ]);

    }
    public function store(Request $request)
    {
 
        $purchase = new WholesalerPurchase;
 
        $purchase->company_name = $request->company_name;
        $purchase->tea_category = $request->category_name;
        $purchase->price = $request->tea_price;
        $purchase->amount = $request->amount;
        $total=$request->tea_price*$request->amount;
        $purchase->total = $total;
 
        $purchase->save();
        return back();
    }
}
