<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::latest()->get();
        return view('user.read', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json(['success' => 'Delete User Successfully']);
    }

    public function updateData(Request $request, $id){
        $userId = User::find($id);

        $userId->update([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'number' => $request->input('number'),
        ]);

        return response()->json(['message' => 'Update Data user berhasil!'], 201);
    }
}
