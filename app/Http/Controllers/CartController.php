<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->get();
        return view('cart', compact('cartItems'));
    }

    public function removeProduct(Product $product)
    {
        CartItem::where('product_id', $product->id)->delete();
        flash('Product removed from the cart successfully!');
        return redirect()->back();
    }
}
