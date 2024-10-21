<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $guarded;


    public function getImagePathAttribute()
    {
        return 'products/' . $this->product_id . '/' . $this->image_url;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
