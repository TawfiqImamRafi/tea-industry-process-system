<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyPrice extends Model
{
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function category(){
        return $this->belongsTo(TeaCategory::class,'category_id','id');
    }
}
