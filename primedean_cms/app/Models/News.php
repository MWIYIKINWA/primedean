<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'news_category_id',
        'user_id',
        'title',
        'slug',
        'content',
        'image_path',
        'tags',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(NewsImage::class);
    }
}