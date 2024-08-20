<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Order;
use App\Models\Point;
use App\Models\UserHasPoint;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $myPoint = UserHasPoint::where('id_user', Auth::user()->id)
                                ->whereBetween('expire_date', [$startOfYear, $endOfYear])
                                ->sum('point');
        $points = Point::latest()->get();
        $gifts = Gift::latest()->get();
        return view('point.read', compact('myPoint', 'gifts', 'endOfYear', 'points'));
    }

    public function settingGift()
    {
        $gift = Gift::latest()->get();
        return view('setting.gift.read', compact('gift'));
    }

    public function indexUserOrder()
    {
        $order = Order::with('product')->latest()->get();
        return view('order.read', compact('order'));
    }

    public function storeGift(Request $request)
    {

        $coverPath = null;
        if ($request->hasFile('image')) {
            $coverPath = $request->file('image')->store('gift', 'public');
        }

        Gift::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->content,
            'point' => $request->point,
            'image' => $coverPath
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function destroyGift($id)
    {
        $gift = Gift::find($id);

        $gift->delete();

        return response()->json(['success' => 'Delete Gift Successfully']);
    }

    public function orderGift(Request $request, $id)
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $gift = Gift::find($id);

        Order::create([
            'id_user' => Auth::user()->id,
            'number' => $request->number,
            'location' => $request->location,
            'status' => 'Pending',
            'id_product' => $gift->id
        ]);

        $pointUser = UserHasPoint::where('id_user', Auth::user()->id)
            ->whereBetween('expire_date', [$startOfYear, $endOfYear])
            ->sum('point');

        $newPoint = $pointUser - $gift->point;

        $firstDataId = UserHasPoint::where('id_user', Auth::user()->id)
            ->whereBetween('expire_date', [$startOfYear, $endOfYear])
            ->orderBy('id', 'asc') // Atau kolom lain yang menentukan urutan
            ->first()->id;

            // Update data pertama
            UserHasPoint::where('id', $firstDataId)
                ->update(['point' => $newPoint]);

            // Update data selain pertama menjadi nol
            UserHasPoint::where('id_user', Auth::user()->id)
                ->whereBetween('expire_date', [$startOfYear, $endOfYear])
                ->where('id', '!=', $firstDataId)
                ->update(['point' => 0]);

        return response()->json(['success' => 'Order Gift Successfully']);
    }


    public function updateGift(Request $request, $id)
    {
        $gift = Gift::find($id);

        $gift->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'point' => $request->point
        ]);
        $coverPath = null;
        if ($request->hasFile('image')) {
            $coverPath = $request->file('image')->store('gift', 'public');
            $gift->update([
                'image' => $coverPath,
            ]);
        };
        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }
}
