<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $code = 'ODR - ' . mt_rand(0000,9999);
        Order::create([
            'customer_name' => $request->customer_name,
            'order_type' => $request->order_type,
            'order_code' => $code,
        ]);

        $order = Order::latest()->first();

        return redirect()->route('make-order', $order->id);
    }

    public function make(string $id)
    {
        $order = Order::where('id', $id)->first();
        $category = Category::all();

        return view('pages.employee.order.index', [
            'order' => $order,
            'category' => $category,
        ]);
    }

    public function select(string $id, $category_id)
    {
        $order = Order::where('id', $id)->first();
        $category = Category::where('id', $category_id)->first();
        $product = Product::where('category_id', $category_id)->get();

        return view('pages.employee.order.select', [
            'order' => $order,
            'category' => $category,
            'product' => $product
        ]);

        }

    public function add(Request $request, string $id, $category_id)
    {
        $order_id = $id;
        $product_price = $request->price;
        $sub_total_price = $product_price * $request->qty;
        
        Cart::create([
            'order_id' => $order_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'sub_total_price' => $sub_total_price
        ]);

        return redirect()->route('select-product', [$id, $category_id]);
    }

    public function cart(string $id)
    {
        $data = Cart::with('product')->where('order_id', $id)->get();
        $order = Order::where('id', $id)->first();
        $total_price = Cart::with('product')->where('order_id', $id)->get()->sum('sub_total_price');

        return view('pages.employee.order.cart', [
            'data' => $data,
            'order' => $order,
            'total_price' => $total_price,
        ]);
    }

    public function edit(Request $request, string $order_id, $id )
    {
        Cart::findOrFail($id)->update([
            'qty' => $request->qty,
        ]);

        return redirect()->route('cart', $order_id);

    }

    public function destroy(string $order_id, $id)
    {
        Cart::findOrFail($id)->delete();

        return redirect()->route('cart', $order_id);
    }

    public function checkout(Request $request, string $id)
    {
        $date_time = Carbon::now();
        Transaction::create([
            'order_id' => $id,
            'total_price' => $request->total_price, 
            'date_time' => $date_time,
        ]);

        return redirect()->route('dashboard-employee');
    }
}
