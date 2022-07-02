<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeaCategory;
use App\Models\UserRole;
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
}
