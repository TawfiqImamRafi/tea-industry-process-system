<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function salePrice(){
        return $this->belongsTo(DailyPrice::class,'price_id','id');
    }

    public function farmer(){
        return $this->belongsTo(Farmer::class,'farmer_id','id');
    }
}
