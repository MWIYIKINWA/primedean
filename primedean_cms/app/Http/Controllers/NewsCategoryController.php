<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        // withCount('news') lets us see how many articles belong to each category
        $categories = NewsCategory::withCount('news')->orderBy('name')->paginate(10);
        return view('news-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('news-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:news_categories,name'],
        ]);

        NewsCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('news-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('news-categories.edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:news_categories,name,' . $newsCategory->id],
        ]);

        $newsCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('news-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        // Note: Because of cascadeOnDelete() in migrations, this will also delete all news articles in this category!
        $newsCategory->delete();

        return redirect()->route('news-categories.index')->with('success', 'Category deleted successfully.');
    }
}