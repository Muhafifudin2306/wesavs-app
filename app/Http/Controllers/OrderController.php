<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with('product')->latest()->get();
        return view('setting.order.read', compact('order'));
    }

    public function changeStatusDikirim(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update([
            'status' => "Dikirim"
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function changeStatusDone(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update([
            'status' => "Selesai"
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function changeStatusPending(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update([
            'status' => "Pending"
        ]);

        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

}
