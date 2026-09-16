<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'previewtext', 'description', 'image_path'];

    public function categories()
    {
        return $this->hasMany(ServiceCategory::class);
    }
}