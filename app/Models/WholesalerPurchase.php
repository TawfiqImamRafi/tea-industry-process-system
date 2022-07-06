<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WholesalerPurchase extends Model
{
    use HasFactory;
    public function company(){
        return $this->belongsTo(User::class,'company_id','id');
    }
    public function wholesaler(){
        return $this->belongsTo(User::class,'wholesaler_id','id');
    }

    public function category(){
        return $this->belongsTo(TeaCategory::class,'category_id','id');
    }
}
