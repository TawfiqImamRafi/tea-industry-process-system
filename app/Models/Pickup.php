<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    public function dailyPrice(){
        return $this->belongsTo(DailyPrice::class,'daily_prices_id','id');
    }

    public function farmer(){
        return $this->belongsTo(User::class,'farmer_id','id');
    }
}
