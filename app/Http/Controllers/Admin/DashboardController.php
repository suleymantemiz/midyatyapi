<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEstates = Estate::count();
        $totalUsers = User::count();
        $parcelEstates = Estate::whereNotNull('parcel_number')->count();
        
        return view('admin.dashboard', compact('totalEstates', 'totalUsers', 'parcelEstates'));
    }
} 