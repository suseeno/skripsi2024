<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\about;

class OrderController extends Controller
{
    public function index()
    {
        $banner = banner::all();
        $about = about::all();
        return view('front.home.cekmenu', compact('banner', 'about'));
    }
}
