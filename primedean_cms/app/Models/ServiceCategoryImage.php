<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategoryImage extends Model
{
    protected $fillable = ['service_category_id', 'image_path'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}