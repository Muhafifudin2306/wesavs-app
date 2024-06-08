<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $id = Auth::user()->id;
        $userId = User::find($id);

        return view('akun.read', compact('userId'));
    }

    public function updateData(Request $request){
        $id = Auth::user()->id;
        $userId = User::find($id);

        $userId->update([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'number' => $request->input('number'),
        ]);

        return response()->json(['message' => 'Update Data user berhasil!'], 201);
    }


    public function uploadCropImage(Request $request)
    {
        $folderPath = public_path('upload/profile');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);

        $id = Auth::user()->id;
        $userId = User::find($id);

        $userId->update(['image' => $imageName]);


        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }
}
