<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeaCategory;
use Illuminate\Http\Request;

class TeaCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Tea Category List',
            'categories' => TeaCategory::all()
        ];

        return view('dashboard.tea_category.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new category',
        ];

        return view('dashboard.tea_category.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $category = new TeaCategory();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
 

        if ($category->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Category saved successfully',
                'redirect' => route('category.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Category failed to save'
        ]);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'Update Category',
            'category' => TeaCategory::find($id)
        ];

        return view('dashboard.tea_category.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $category = TeaCategory::find($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');


        if ($category->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Category updated successfully',
                'redirect' => route('category.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Category failed to update'
        ]);
    }

    public function destroy($id)
    {
        $category = TeaCategory::find($id);
        if($category->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'category has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete category',
        ]);

    }
}
