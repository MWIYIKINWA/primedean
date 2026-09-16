<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{

    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(15);
        return view('inquiries.index', compact('inquiries'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'company' => 'nullable|string',
            'service' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $inquiry = Inquiry::create($validated);

        return response()->json(['success' => true, 'data' => $inquiry], 201);
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return back()->with('success', 'Inquiry deleted successfully.');
    }

    // ADD THIS TO HANDLE CSV EXPORT
    public function export()
    {
        $inquiries = Inquiry::latest()->get();
        $filename = "website_inquiries_" . date('Y-m-d') . ".csv";

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Date', 'Type', 'Name', 'Email', 'Phone', 'Company', 'Service', 'Message'];

        $callback = function () use ($inquiries, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($inquiries as $inquiry) {
                fputcsv($file, [
                    $inquiry->created_at->format('Y-m-d H:i:s'),
                    $inquiry->type,
                    $inquiry->name,
                    $inquiry->email,
                    $inquiry->phone,
                    $inquiry->company,
                    $inquiry->service,
                    $inquiry->message,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}