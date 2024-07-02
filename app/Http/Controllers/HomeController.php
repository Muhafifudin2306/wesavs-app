<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('home', compact('blogs'));
    }

    public function settingHome()
    {
        $blogs = Blog::latest()->get();
        return view('setting.home.read', compact('blogs'));
    }

    public function storeBlog(Request $request)
    {

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'cover' => $coverPath,
            'created_by' => Auth::user()->id
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return response()->json(['success' => 'Delete Blog Successfully']);
    }
}
