<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SettingLanding;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $sectionOneDesc = SettingLanding::where('name', 'section-1-desc')->first()->description ?? null;
        $sectionOneHeroBg = SettingLanding::where('name', 'section-1-hero-bg')->first()->description ?? null;
        $sectionFourLocation = SettingLanding::where('name', 'section-4-location')->first()->description ?? null;
        $sectionFourNumber = SettingLanding::where('name', 'section-4-number')->first()->description ?? null;
        $sectionFourEmail = SettingLanding::where('name', 'section-4-email')->first()->description ?? null;
        $gallery = Gallery::latest()->get();
        return view('welcome', compact('sectionOneDesc', 'sectionOneHeroBg', 'sectionFourLocation','sectionFourNumber','sectionFourEmail', 'gallery'));
    }
}
