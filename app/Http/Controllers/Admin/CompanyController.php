<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Company list',
            'companies' => Company::all()
        ];

        return view('dashboard.company.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new Company',
        ];

        return view('dashboard.company.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $Company = new Company();
        $Company->name = $request->get('name');
        $Company->phone = $request->get('phone');
        $Company->email = $request->get('email');
        $Company->address = $request->get('address');

        if ($Company->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Company saved successfully',
                'redirect' => route('company.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Company failed to save'
        ]);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'Update Company',
            'company' => Company::find($id)
        ];

        return view('dashboard.company.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $Company = Company::find($id);
        $Company->name = $request->get('name');
        $Company->phone = $request->get('phone');
        $Company->email = $request->get('email');
        $Company->address = $request->get('address');

        if ($Company->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Company updated successfully',
                'redirect' => route('company.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Company failed to update'
        ]);
    }

    public function destroy($id)
    {
        $Company = Company::find($id);
        if($Company->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'Company has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete Company',
        ]);

    }
}
