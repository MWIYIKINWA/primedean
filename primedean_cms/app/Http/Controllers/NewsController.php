<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $articles = News::with(['category', 'galleryImages'])->latest('published_at')->paginate(10);
        return view('news.index', compact('articles'));
    }

    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get();
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'news_category_id' => ['required', 'exists:news_categories,id'],
            'content' => ['nullable', 'string'],
            'published_at' => ['required', 'date'],
            'tags' => ['nullable', 'string', 'max:255'],
            'main_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'article_images' => ['nullable', 'array'],
            'article_images.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        $mainImagePath = $request->hasFile('main_image')
            ? $request->file('main_image')->store('news/featured', 'public')
            : null;

        $article = News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'news_category_id' => $request->news_category_id,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'published_at' => $request->published_at,
            'tags' => $request->tags,
            'image_path' => $mainImagePath,
        ]);

        if ($request->hasFile('article_images')) {
            foreach ($request->file('article_images') as $file) {
                $article->galleryImages()->create([
                    'image_path' => $file->store('news/gallery', 'public')
                ]);
            }
        }

        return redirect()->route('news.index')->with('success', 'News article published successfully.');
    }

    public function edit(News $news)
    {
        $news->load('galleryImages');
        $categories = NewsCategory::orderBy('name')->get();
        return view('news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'news_category_id' => ['required', 'exists:news_categories,id'],
            'content' => ['nullable', 'string'],
            'published_at' => ['required', 'date'],
            'tags' => ['nullable', 'string', 'max:255'],
            'main_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'article_images' => ['nullable', 'array'],
            'article_images.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'deleted_image_ids' => ['nullable', 'string'],
        ]);

        $news->title = $request->title;
        $news->news_category_id = $request->news_category_id;
        $news->content = $request->input('content');
        $news->published_at = $request->published_at;
        $news->tags = $request->tags;

        if ($request->hasFile('main_image')) {
            if ($news->image_path && Storage::disk('public')->exists($news->image_path)) {
                Storage::disk('public')->delete($news->image_path);
            }
            $news->image_path = $request->file('main_image')->store('news/featured', 'public');
        }

        $news->save();

        if ($request->filled('deleted_image_ids')) {
            $deletedIds = json_decode($request->deleted_image_ids, true);
            if (is_array($deletedIds) && count($deletedIds) > 0) {
                $imagesToDelete = NewsImage::whereIn('id', $deletedIds)->get();
                foreach ($imagesToDelete as $img) {
                    if (Storage::disk('public')->exists($img->image_path)) {
                        Storage::disk('public')->delete($img->image_path);
                    }
                    $img->delete();
                }
            }
        }

        if ($request->hasFile('article_images')) {
            foreach ($request->file('article_images') as $file) {
                $news->galleryImages()->create([
                    'image_path' => $file->store('news/gallery', 'public')
                ]);
            }
        }

        return redirect()->route('news.index')->with('success', 'News article updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image_path && Storage::disk('public')->exists($news->image_path)) {
            Storage::disk('public')->delete($news->image_path);
        }

        foreach ($news->galleryImages as $img) {
            if (Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News article deleted.');
    }
}