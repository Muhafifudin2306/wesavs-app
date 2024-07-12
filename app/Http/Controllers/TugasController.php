<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $points = Point::latest()->get();
        return view('tugas.read', compact('points'));
    }

    public function indexSetting()
    {
        $points = Point::latest()->get();
        return view('setting.tugas.read', compact('points'));
    }

    public function updateData(Request $request, $id)
    {
        $mitigation = Point::find($id);
        $mitigation->update([
            'point' => $request->point
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }
}
