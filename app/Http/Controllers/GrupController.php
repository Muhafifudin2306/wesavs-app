<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrupController extends Controller
{
    public function index()
    {
        return view('grup.read');
    }

    public function indexChat()
    {
        return view('grup.chat.read');
    }
}
