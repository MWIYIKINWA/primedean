<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        // Fetch existing record or create a new empty model instance
        $about = About::first() ?? new About();

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($about->image_path && Storage::disk('public')->exists($about->image_path)) {
                Storage::disk('public')->delete($about->image_path);
            }

            // Store new image path and save
            $path = $request->file('image')->store('about', 'public');
            $about->image_path = $path;
            $about->save();
        }

        return back()->with('success', 'About section image updated successfully.');
    }

    public function edit()
    {
        // Fetch the first record to display the current image preview
        $about = About::first();

        return view('about.edit', compact('about'));
    }

}