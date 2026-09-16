<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = Portfolio::orderBy('sort_order', 'asc')->get();
        return view('portfolio.index', compact('items'));
    }

    public function store(Request $request)
    {
        // max:800 enforces < 800 KB per image
        $request->validate([
            'images' => ['required', 'array'],
            'images.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:800'],
            'title' => ['nullable', 'string', 'max:255'],
        ], [
            'images.*.max' => 'Each uploaded image must be less than 800 KB.',
            'images.*.image' => 'All uploaded files must be valid images.',
        ]);

        $maxOrder = Portfolio::max('sort_order') ?? 0;

        foreach ($request->file('images') as $file) {
            $maxOrder++;
            $path = $file->store('portfolio', 'public');

            Portfolio::create([
                'title' => $request->title,
                'image_path' => $path,
                'sort_order' => $maxOrder,
            ]);
        }

        return redirect()->route('portfolio.index')->with('success', 'Image(s) uploaded successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if (Storage::disk('public')->exists($portfolio->image_path)) {
            Storage::disk('public')->delete($portfolio->image_path);
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Image deleted successfully.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:portfolios,id'],
        ]);

        $items = Portfolio::whereIn('id', $request->ids)->get();

        foreach ($items as $item) {
            if (Storage::disk('public')->exists($item->image_path)) {
                Storage::disk('public')->delete($item->image_path);
            }
            $item->delete();
        }

        return redirect()->route('portfolio.index')->with('success', count($items) . ' images removed.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => ['required', 'array'],
            'order.*.id' => ['required', 'exists:portfolios,id'],
            'order.*.sort_order' => ['required', 'integer'],
        ]);

        foreach ($request->order as $item) {
            Portfolio::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json(['status' => 'success', 'message' => 'Order updated.']);
    }
}