<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth; // Import the Auth facade


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->id);

        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('console_id', $product->id)
                        ->first();

        if ($cartItem) {
            $cartItem->amount++;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'console_id' => $product->id,
                'amount' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('console_id', $request->id)
                        ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function increment(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('console_id', $request->id)
                        ->first();

        if ($cartItem) {
            $cartItem->amount++;
            $cartItem->save();
        }

        return redirect()->back();
    }

    public function decrement(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('console_id', $request->id)
                        ->first();

        if ($cartItem && $cartItem->amount > 1) {
            $cartItem->amount--;
            $cartItem->save();
        } elseif ($cartItem && $cartItem->amount == 1) {
            $cartItem->delete();
        }

        return redirect()->back();
    }
}
