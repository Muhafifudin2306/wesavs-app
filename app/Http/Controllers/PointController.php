<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\UserHasPoint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function index()
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $myPoint = UserHasPoint::where('id_user', Auth::user()->id)
                                ->whereBetween('expire_date', [$startOfYear, $endOfYear])
                                ->sum('point');

        return view('point.read', compact('myPoint', 'endOfYear'));
    }
}
