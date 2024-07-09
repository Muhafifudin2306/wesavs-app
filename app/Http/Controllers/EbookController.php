<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {
        $ebook = Ebook::latest()->first();
        return view('ebook.read', compact('ebook'));
    }

    public function settingEbook()
    {
        $ebook = Ebook::latest()->first();
        return view('setting.ebook.read', compact('ebook'));
    }

    public function storeEbook(Request $request)
    {

        Ebook::create([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function updateEbook(Request $request, $id)
    {
        $ebook = Ebook::find($id);
        $ebook->update([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function destroy($id)
    {
        $ebook = Ebook::find($id);

        $ebook->delete();

        return response()->json(['success' => 'Delete Ebook Successfully']);
    }

}
