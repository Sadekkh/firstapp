<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class wishlistController extends Controller
{

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = products::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }
        $sessionCartId = $request->session()->get('yfbstore_cart_session_id');
        $cart = new wishlist();
        if (Auth::check()) {

            $userId = Auth::id();
            $cart->user_id = $userId;
        } else if ($sessionCartId) {

            $cart->session_id  = $sessionCartId;
        } else {

            $randomSessionId = Str::random(40);
            $request->session()->put('yfbstore_cart_session_id', $randomSessionId);
            $cart->session_id = $randomSessionId;
        }
        $cart->product_id = $productId;
        $cart->save();


        return response()->json(['message' => 'Product added to wishlist.']);
    }
}
