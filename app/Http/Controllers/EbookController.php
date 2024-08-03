<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {
        $ebook = Ebook::latest()->get();
        return view('ebook.read', compact('ebook'));
    }

    public function settingEbook()
    {
        $ebook = Ebook::latest()->get();
        return view('setting.ebook.read', compact('ebook'));
    }

    public function storeEbook(Request $request)
    {
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('cover-ebook', 'public');
        }
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('file-ebook', 'public');
        }
        Ebook::create([
            'cover' => $coverPath,
            'file' => $filePath,
            'source' => $request->source
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function updateEbook(Request $request, $id)
    {
        $ebook = Ebook::find($id);
        $ebook->update([
            'source' => $request->source
        ]);
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('cover-ebook', 'public');
            $ebook->update([
                'cover' => $coverPath,
            ]);
        };
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('file-ebook', 'public');
            $ebook->update([
                'file' => $filePath,
            ]);
        };

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function destroy($id)
    {
        $ebook = Ebook::find($id);

        $ebook->delete();

        return response()->json(['success' => 'Delete Ebook Successfully']);
    }

}
