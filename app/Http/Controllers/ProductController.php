<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function addToCart(Product $product)
    {

        // Create or Update Cart
        $cart = Cart::updateOrCreate(['id' => 1]);

        // Update Cart items
        $existProduct = CartItem::where('product_id', $product->id)->first();
        if ($existProduct) {
            CartItem::where('product_id', $product->id)->update([
                'quantity' => ++$existProduct->quantity,
                'total' => $existProduct->quantity * $existProduct->price,
            ]);
        } else {
            $cart->cartItems()->create([
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => 1,
                'total' => $product->price
            ]);
        }

        flash('Product added to the cart successfully!');
        return redirect()->back();
    }
}
