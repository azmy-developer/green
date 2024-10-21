<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;


    protected $guarded;

    public function getJobAttribute()
    {
        return app()->isLocale('ar') ? $this->job_ar : $this->job_en ;
    }
}
