<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\DailyPrice;
use App\Models\TeaCategory;
use Carbon\Carbon;

class DailyPriceController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Price list',
            'prices' => DailyPrice::with('company','category')->get(),

        ];

        return view('dashboard.price.index')->with(array_merge($this->data, $data));
    }

    public function pickuplist()
    {
        $data = [
            'page_title' => 'Pickup  request',
            'prices' => DailyPrice::where("pickup",true)->get(),

        ];

        return view('dashboard.price.pickup')->with(array_merge($this->data, $data));
    }
    public function purchaselist()
    {
        $data = [
            'page_title' => 'Pickup  request',
            'prices' => DailyPrice::where("purchase",2)->get(),

        ];

        return view('dashboard.price.purchaselist')->with(array_merge($this->data, $data));
    }
    public function confirmpurchase()
    {
        $data = [
            'page_title' => 'Pickup  request',
            'prices' => DailyPrice::where("purchase",3)->get(),

        ];

        return view('dashboard.price.confirmpurchase')->with(array_merge($this->data, $data));
    }
    public function purchase($id)
    {
        $Company = DailyPrice::find($id);
    
        if($Company->purchase == 1){
            $Company->purchase = 2;
            $Company->save(); 
        }
        else{
            $Company->purchase = 1;
            $Company->save(); 
        }

        return back();

       
    }
    public function purchaseconfirm($id)
    {
        $Company = DailyPrice::find($id);
    
   
            $Company->purchase = 3;
            $Company->save(); 
     

        return back();

       
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new daily price',
            'companies' => Company::all(),
            'categories' => TeaCategory::all(),
        ];

        return view('dashboard.price.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'tea_price' => 'required',
            'amount' => 'required',
            'category_id' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $Company = new DailyPrice();
        $Company->company_name = $request->get('user_id');
        $Company->category_id = $request->get('category_id');
        $Company->pickup = false;
        $Company->date = Carbon::now();
        $Company->tea_price = $request->get('tea_price');
        $Company->amount = $request->get('amount');

        if ($Company->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'daily price saved successfully',
                'redirect' => route('price.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'daily price failed to save'
        ]);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'Update daily price',
            'price' => DailyPrice::find($id),
            'companies' => Company::all(),
            'categories' => TeaCategory::all(),
        ];

        return view('dashboard.price.edit')->with(array_merge($this->data, $data));
    }
    public function pickup($id)
    {
        $Company = DailyPrice::find($id);
        $Company->pickup = !$Company->pickup;
        $Company->save();

        return back();
       

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'company_name' => 'required',
            'tea_price' => 'required',
            'amount' => 'required',
            'category_id' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $Company = DailyPrice::find($id);
        $Company->company_name = $request->get('company_name');
        $Company->category_id = $request->get('category_id');
        $Company->tea_price = $request->get('tea_price');
        $Company->amount = $request->get('amount');
        if ($Company->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'daily price updated successfully',
                'redirect' => route('price.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'daily price failed to update'
        ]);
    }

    public function destroy($id)
    {
        $Company = DailyPrice::find($id);
        if($Company->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'daily price has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete daily price',
        ]);

    }
    public function today()
    {
        $date = database_formatted_date(Carbon::now());
        $data = [
            'page_title' => 'Price list',
            'prices' => DailyPrice::with('company','category')->where('date',$date)->get(),

        ];

        return view('dashboard.price.today')->with(array_merge($this->data, $data));
    }
}
