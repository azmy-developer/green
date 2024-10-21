<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $guarded;

    public function getVisionAttribute()
    {
        return app()->isLocale('ar') ? $this->vision_ar : $this->vision_en ;
    }

    public function getGoalsAttribute()
    {
        return app()->isLocale('ar') ? $this->goals_ar : $this->goals_en ;
    }

    public function getMessageAttribute()
    {
        return app()->isLocale('ar') ? $this->message_ar : $this->message_ar ;
    }

    public function getSolutionsAttribute()
    {
        return app()->isLocale('ar') ? $this->solutions_ar : $this->solutions_en ;
    }

    public function getStrategyAttribute()
    {
        return app()->isLocale('ar') ? $this->strategy_ar : $this->strategy_en ;
    }

}
