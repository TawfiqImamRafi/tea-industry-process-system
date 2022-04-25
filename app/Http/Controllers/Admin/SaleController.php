<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Farmer;
use App\Models\DailyPrice;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Sales list',
            'sales' => Sale::with('salePrice','salePrice.category','salePrice.company','farmer')->get()
        ];

        return view('dashboard.sale.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new Sale',
            'prices' => DailyPrice::with('company','category')->get(),
            'farmers' => Farmer::all(),
        ];

        return view('dashboard.sale.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'price_id' => 'required',
            'farmer_id' => 'required',
            'amount' => 'required',
            'total_price' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $farmer = new Sale();
        $farmer->price_id = $request->get('price_id');
        $farmer->farmer_id = $request->get('farmer_id');
        $farmer->amount = $request->get('amount');
        $farmer->total_price = $request->get('total_price');

        if ($farmer->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Sale saved successfully',
                'redirect' => route('sale.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Farmer failed to save'
        ]);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'Update Sale',
            'sale' => Sale::find($id),
            'prices' => DailyPrice::with('company','category')->get(),
            'farmers' => Farmer::all(),
        ];

        return view('dashboard.sale.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'price_id' => 'required',
            'farmer_id' => 'required',
            'amount' => 'required',
            'total_price' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $farmer = Sale::find($id);
        $farmer->price_id = $request->get('price_id');
        $farmer->farmer_id = $request->get('farmer_id');
        $farmer->amount = $request->get('amount');
        $farmer->total_price = $request->get('total_price');

        if ($farmer->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Sale updated successfully',
                'redirect' => route('sale.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Farmer failed to update'
        ]);
    }

    public function destroy($id)
    {
        $farmer = Sale::find($id);
        if($farmer->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'Sale has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete sale',
        ]);

    }
}
