<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chitietdonhang;
use App\Models\sanpham;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return response()->json($cart);
    }
    public function add(Request $request)
    {
        
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->quantity;
        } else {
            $cart[$request->id] = $request->only('id', 'name', 'price', 'quantity');
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            return response()->json(['message' => 'Cart updated!', 'cart' => $cart]);
        }

        return response()->json(['message' => 'Product not found in cart.'], 404);
    }

    public function remove(Request $request)
    {   
        $request->validate([
            'id' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);

            return response()->json(['message' => 'Product removed!', 'cart' => $cart]);
        }

        return response()->json(['message' => 'Product not found in cart.'], 404);
    }
}
