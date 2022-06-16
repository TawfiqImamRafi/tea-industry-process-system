<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Purchase;
use App\Models\DailyPrice;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view("dashboard.purchase.create",[
            "price"=> DailyPrice::find($id), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
  

        $purchase = new Purchase();
        $purchase->daily_prices_id = $request->get('daily_prices_id');
        $purchase->farmer_id = $request->get('farmer_id');
        $purchase->amount = $request->get('amount');
        $purchase->deduct = $request->get('deduct');

        $deduct_amount=$request->get('amount') - ($request->get('amount') * $request->get('deduct'))/100;
        
        $purchase->deduct_amount = $deduct_amount;
        $grand_total=$request->get('tea_price')*$deduct_amount;
        $purchase->grand_total = $grand_total;
       

        if ($purchase->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Purchase successfully',
                'redirect' => route('purchase.index')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Purchase not done'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
