<?php

namespace App\Http\Controllers\Admin;
use App\Models\Purchase;
use App\Models\DailyPrice;
use App\Models\TeaCategory;
use App\Models\WholesalerPurchase;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $date = database_formatted_date(Carbon::now());
        $data = [
            'prices' => DailyPrice::with('company','category')->where('date',$date)->get(),
            "sales"=> Purchase::where('farmer_id', Auth::user()->id)->get()->take(5),
            "total_sale"=> Purchase::where('farmer_id', Auth::user()->id)->sum('grand_total'),
            'teaCategory'=> TeaCategory::all(),
            'purchases'=> WholesalerPurchase::where('wholesaler_id',Auth::user()->id)->get()->take(5),
            'total_purchase'=> WholesalerPurchase::where('wholesaler_id',Auth::user()->id)->sum('total'),
            'company_sales'=> WholesalerPurchase::where('company_id',Auth::user()->id)->get()->take(5),
            'total_company_sale'=> WholesalerPurchase::where('company_id',Auth::user()->id)->sum('total'),
            "company_purchases"=> Purchase::with('dailyPrice','dailyPrice.company','dailyPrice.category')->whereHas('dailyPrice', function($q){
                $q->where('company_name', Auth::user()->id);
            })->get()->take(5),
            "company_total_purchase"=> Purchase::with('dailyPrice')->whereHas('dailyPrice', function($q){
                $q->where('company_name', Auth::user()->id);
            })->sum('grand_total'),

        ];

        return view('dashboard.index')->with(array_merge($this->data, $data));
    }
}
