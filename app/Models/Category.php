<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
