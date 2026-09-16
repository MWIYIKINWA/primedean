<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::orderBy('sort_order', 'asc')->get();
        return view('hero-sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120'
        ]);

        if ($request->hasFile('images')) {
            $lastOrder = HeroSlider::max('sort_order') ?? 0;

            foreach ($request->file('images') as $file) {
                $path = $file->store('hero-sliders', 'public');
                $lastOrder++;

                HeroSlider::create([
                    'image_path' => $path,
                    'sort_order' => $lastOrder,
                ]);
            }
        }

        return back()->with('success', 'Hero slider images uploaded successfully.');
    }

    public function destroy(HeroSlider $heroSlider)
    {
        if ($heroSlider->image_path && Storage::disk('public')->exists($heroSlider->image_path)) {
            Storage::disk('public')->delete($heroSlider->image_path);
        }

        $heroSlider->delete();

        return back()->with('success', 'Slide removed successfully.');
    }
}