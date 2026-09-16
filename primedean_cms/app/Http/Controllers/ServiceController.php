<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('categories.images')->latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'previewtext' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'categories' => ['nullable', 'array'],
            'categories.*.name' => ['required', 'string', 'max:255'],
            'tagline' => ['required', 'string', 'max:255'],
            'categories.*.description' => ['nullable', 'string'],
            'categories.*.images' => ['nullable', 'array'],
            'categories.*.images.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        // 1. Save Top-Level Service
        $service = Service::create([
            'name' => $request->name,
            'tagline' => $request->tagline,
            'previewtext' => $request->previewtext,
            'description' => $request->description,
            'image_path' => $request->hasFile('image')
                ? $request->file('image')->store('services', 'public')
                : null,
        ]);

        // 2. Save Nested Categories & Their Images
        if ($request->has('categories')) {
            foreach ($request->categories as $categoryData) {
                $category = $service->categories()->create([
                    'name' => $categoryData['name'],
                    'description' => $categoryData['description'] ?? null,
                ]);

                // 3. Save Multiple Images per Category
                if (isset($categoryData['images'])) {
                    foreach ($categoryData['images'] as $imageFile) {
                        $category->images()->create([
                            'image_path' => $imageFile->store('service_categories', 'public')
                        ]);
                    }
                }
            }
        }

        return redirect()->route('services.index')->with('success', 'Service and categories successfully created.');
    }

    public function destroy(Service $service)
    {
        // Delete main service image
        if ($service->image_path && Storage::disk('public')->exists($service->image_path)) {
            Storage::disk('public')->delete($service->image_path);
        }

        // Delete all nested category images
        foreach ($service->categories as $category) {
            foreach ($category->images as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
            }
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service and all related categories deleted.');
    }

    public function edit(Service $service)
    {
        // Eager load categories and images to pass to the view
        $service->load('categories.images');
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'previewtext' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],

            'categories' => ['nullable', 'array'],
            'categories.*.id' => ['nullable', 'integer', 'exists:service_categories,id'],
            'categories.*.name' => ['required', 'string', 'max:255'],
            'categories.*.description' => ['nullable', 'string'],
            'categories.*.images' => ['nullable', 'array'],
            'categories.*.images.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],

            // Tracking arrays for deletions
            'deleted_category_ids' => ['nullable', 'string'],
            'deleted_image_ids' => ['nullable', 'string'],
        ]);

        // 1. Update Main Service
        $service->name = $request->name;
        $service->tagline = $request->tagline;
        $service->previewtext = $request->previewtext;
        $service->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($service->image_path && Storage::disk('public')->exists($service->image_path)) {
                Storage::disk('public')->delete($service->image_path);
            }
            $service->image_path = $request->file('image')->store('services', 'public');
        }
        $service->save();

        // 2. Process Deleted Categories
        if ($request->filled('deleted_category_ids')) {
            $deletedCatIds = json_decode($request->deleted_category_ids, true);
            if (is_array($deletedCatIds) && count($deletedCatIds) > 0) {
                $catsToDelete = \App\Models\ServiceCategory::whereIn('id', $deletedCatIds)->get();
                foreach ($catsToDelete as $cat) {
                    foreach ($cat->images as $img) {
                        Storage::disk('public')->delete($img->image_path);
                    }
                    $cat->delete();
                }
            }
        }

        // 3. Process Deleted Images
        if ($request->filled('deleted_image_ids')) {
            $deletedImgIds = json_decode($request->deleted_image_ids, true);
            if (is_array($deletedImgIds) && count($deletedImgIds) > 0) {
                $imgsToDelete = \App\Models\ServiceCategoryImage::whereIn('id', $deletedImgIds)->get();
                foreach ($imgsToDelete as $img) {
                    Storage::disk('public')->delete($img->image_path);
                    $img->delete();
                }
            }
        }

        // 4. Update or Create Categories
        if ($request->has('categories')) {
            foreach ($request->categories as $catData) {
                if (isset($catData['id'])) {
                    // Update existing category
                    $category = \App\Models\ServiceCategory::find($catData['id']);
                    if ($category) {
                        $category->update([
                            'name' => $catData['name'],
                            'description' => $catData['description'] ?? null,
                        ]);
                    }
                } else {
                    // Create new category
                    $category = $service->categories()->create([
                        'name' => $catData['name'],
                        'description' => $catData['description'] ?? null,
                    ]);
                }

                // Upload new images for this category
                if (isset($catData['images']) && $category) {
                    foreach ($catData['images'] as $imageFile) {
                        $category->images()->create([
                            'image_path' => $imageFile->store('service_categories', 'public')
                        ]);
                    }
                }
            }
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
}