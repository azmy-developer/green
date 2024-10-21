<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded;


    // Accessors


    public function getNameAttribute()
    {
        return app()->isLocale('ar') ? $this->name_ar : $this->name_en ;
    }

    public function getDescAttribute()
    {
        return app()->isLocale('ar') ? $this->desc_ar : $this->desc_en ;
    }
}
