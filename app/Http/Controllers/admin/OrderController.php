<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('game')->orderByDesc('created_at')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('game')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|in:cart,pending,processing,completed,cancelled',
            'admin_note' => 'nullable|string'
        ]);

        $order->status = $request->input('status');
        $order->admin_note = $request->input('admin_note');
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }
}
