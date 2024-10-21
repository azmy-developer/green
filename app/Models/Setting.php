<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MediaEmbed\MediaEmbed;
class Setting extends Model
{
    use HasFactory;
    protected $guarded;

    public function getTitleAttribute()
    {
        return app()->isLocale('ar') ? $this->title_ar : $this->title_en ;
    }

    public function getDescriptionAttribute()
    {
        return app()->isLocale('ar') ? $this->description_ar : $this->description_en ;
    }
}
