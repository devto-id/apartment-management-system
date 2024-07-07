<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "_title" => "Dashboard",
            "_menu" => "dashboard",
            "_breadcrumbs" => [
                [route('dashboard.index'), "Dashboard"],
            ],
        ]);
    }
}
