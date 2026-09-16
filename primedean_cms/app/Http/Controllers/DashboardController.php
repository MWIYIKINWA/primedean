<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\News;
use App\Models\Portfolio; // Adjust model name if needed
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'serviceCount' => Service::count(),
            'newsCount' => News::count(),
            'portfolioCount' => Portfolio::count(),
            'userCount' => User::count(),
        ]);
    }
}