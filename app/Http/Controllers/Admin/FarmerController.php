<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Farmer list',
            'farmers' => Farmer::all()
        ];

        return view('dashboard.farmer.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new Farmer',
        ];

        return view('dashboard.farmer.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $farmer = new Farmer();
        $farmer->name = $request->get('name');
        $farmer->phone = $request->get('phone');
        $farmer->address = $request->get('address');

        if ($farmer->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Farmer saved successfully',
                'redirect' => route('farmer.list')
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
            'page_title' => 'Update Farmer',
            'farmer' => Farmer::find($id)
        ];

        return view('dashboard.farmer.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $farmer = Farmer::find($id);
        $farmer->name = $request->get('name');
        $farmer->phone = $request->get('phone');
        $farmer->address = $request->get('address');

        if ($farmer->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Farmer updated successfully',
                'redirect' => route('farmer.list')
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
        $farmer = Farmer::find($id);
        if($farmer->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'Farmer has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete farmer',
        ]);

    }
}
