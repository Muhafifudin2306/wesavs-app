<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Factor;
use App\Models\Grup;
use App\Models\Impact;
use App\Models\Mitigation;
use App\Models\Point;
use App\Models\User;
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
        $factor = Factor::latest()->first();
        $impact = Impact::latest()->first();
        $mitigation = Mitigation::latest()->first();
        $userCount = User::count();
        $blogCount = Blog::count();
        $grupCount = Grup::count();
        $taskCount = Point::count();
        return view('home', compact('blogs', 'factor', 'impact','mitigation', 'userCount', 'blogCount', 'grupCount', 'taskCount'));
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

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::find($id);

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'created_by' => Auth::user()->id
        ]);
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $blog->update([
                'cover' => $coverPath,
            ]);
        };
        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function settingFactor()
    {
        $factor = Factor::latest()->first();
        return view('setting.Factor.read', compact('factor'));
    }

    public function storeFactor(Request $request)
    {
        Factor::create([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function updateFactor(Request $request, $id)
    {
        $factor = Factor::find($id);
        $factor->update([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function destroyFactor($id)
    {
        $factor = Factor::find($id);

        $factor->delete();

        return response()->json(['success' => 'Delete Factor Successfully']);
    }

    public function settingImpact()
    {
        $impact = Impact::latest()->first();
        return view('setting.impact.read', compact('impact'));
    }

    public function storeImpact(Request $request)
    {
        Impact::create([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function updateImpact(Request $request, $id)
    {
        $impact = Impact::find($id);
        $impact->update([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function destroyImpact($id)
    {
        $impact = Impact::find($id);

        $impact->delete();

        return response()->json(['success' => 'Delete Impact Successfully']);
    }
    
    public function settingMitigation()
    {
        $mitigation = Mitigation::latest()->first();
        return view('setting.mitigation.read', compact('mitigation'));
    }

    public function storeMitigation(Request $request)
    {
        Mitigation::create([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function updateMitigation(Request $request, $id)
    {
        $mitigation = Mitigation::find($id);
        $mitigation->update([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function destroyMitigation($id)
    {
        $mitigation = Mitigation::find($id);

        $mitigation->delete();

        return response()->json(['success' => 'Delete Mitigation Successfully']);
    }
}
