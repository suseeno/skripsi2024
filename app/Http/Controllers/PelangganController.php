<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\banner;
use App\Models\about;

class PelangganController extends Controller
{
    public function index()
    {
        $banner = banner::all();
        $about = about::all();
        return view('front.home.cekmenu', compact('banner', 'about'));
    }
}
