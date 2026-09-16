<?php

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use Carbon\Carbon;
use App\Models\Portfolio;
use App\Models\About;
use App\Http\Controllers\InquiryController;

/////////////////////////////////////////////////////

Route::get('/services', function () {
    return response()->json([
        'data' => Service::all()->map(function ($service) {
            return [
                'id' => $service->id,
                'title' => $service->name,
                'slug' => Str::slug($service->name),
                'description' => $service->description,
                'previewtext' => $service->previewtext,
                'tagline' => $service->tagline,
                'image_url' => $service->image_path ? asset('storage/' . $service->image_path) : null,
            ];
        })
    ]);
});

////////////////////////////////////////////////////////////
Route::get('/services/{slug}', function ($slug) {
    // Finds the service by checking either a database slug column or the generated slug from the name
    $service = Service::with('categories.images')
        ->get()
        ->first(function ($item) use ($slug) {
            return ($item->slug ?? Str::slug($item->name)) === $slug;
        });

    if (!$service) {
        return response()->json(['message' => 'Service not found'], 404);
    }

    return response()->json([
        'data' => [
            'id' => $service->id,
            'title' => $service->name,
            'slug' => $service->slug ?? Str::slug($service->name),
            'previewtext' => $service->previewtext,
            'tagline' => $service->tagline,
            'description' => $service->description,
            'image_url' => $service->image_path ? asset('storage/' . $service->image_path) : null,
            'categories' => $service->categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'description' => $category->description,
                    'images' => $category->images->map(function ($image) {
                        return asset('storage/' . $image->image_path);
                    })
                ];
            })
        ]
    ]);
});

/////////////////////////////////////////////////////////////

Route::get('/news', function () {
    return response()->json([
        'data' => News::with('category')->latest('id')->get()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'slug' => $article->slug,
                'category' => $article->category->name ?? 'General',
                'description' => $article->content,
                'published_at' => $article->published_at ? Carbon::parse($article->published_at)->format('F d, Y') : null,
                'image_url' => $article->image_path ? asset('storage/' . $article->image_path) : null,
                'tags' => $article->tags ? array_map('trim', explode(',', $article->tags)) : [],
            ];
        })
    ]);
});

// Get a single article by slug
Route::get('/news/{slug}', function ($slug) {
    $article = News::with(['category', 'galleryImages'])->where('slug', $slug)->first();

    if (!$article) {
        return response()->json(['message' => 'Article not found'], 404);
    }

    return response()->json([
        'data' => [
            'id' => $article->id,
            'title' => $article->title,
            'slug' => $article->slug,
            'content' => $article->content,
            'category' => $article->category->name ?? 'General',
            'author' => $article->user->name ?? 'Admin',
            'published_at' => $article->published_at ? Carbon::parse($article->published_at)->format('F d, Y') : null,
            'image_url' => $article->image_path ? asset('storage/' . $article->image_path) : null,
            'gallery' => $article->galleryImages->map(function ($img) {
                return asset('storage/' . $img->image_path);
            }),
            'tags' => $article->tags ? array_map('trim', explode(',', $article->tags)) : [],
        ]
    ]);
});

//////////////////////////////////////////////////////////////////////

Route::get('/portfolios', function () {
    return response()->json([
        'data' => Portfolio::orderBy('sort_order', 'asc')->get()
    ]);
});

/////////////////////////////////////////////////

Route::get('/news-categories', function () {
    return response()->json([
        'data' => \App\Models\NewsCategory::withCount('news')->get()->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'article_count' => $category->news_count,
            ];
        })
    ]);
});


//////////////////////////////////////////////////////////////////////////

Route::get('/about', function () {
    return response()->json([
        'data' => About::first()
    ]);
});

Route::post('/inquiries', [InquiryController::class, 'store']);