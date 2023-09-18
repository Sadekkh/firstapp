<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\city;
use App\Models\orders;
use App\Models\products;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class cartController extends Controller
{

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = products::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }
        $sessionCartId = $request->session()->get('yfbstore_cart_session_id');
        $cart = new carts();
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
        $ip = $request->ip();
        $cart->product_id = $productId;
        $cart->ip_adress = $ip;
        $cart->save();


        return response()->json(['message' => 'Product added to cart.']);
    }
    public function show(Request $request)
    {
        $sessionCartId = $request->session()->get('yfbstore_cart_session_id');
        $cart = carts::with('product.image')->where('session_id', $sessionCartId)->get();
        return view('components.cartblade', compact('cart'));
    }
    public function delete($id)
    {
        carts::find($id)->delete();
        return redirect()->back();
    }
    public function addproductcart($id)
    {
        $product = products::with('image', 'category', 'attribute.attribute', 'variation.variation')->where('id', $id)->where('status', 'active')->get();
        return view('components.addprodcart', compact('product'));
    }
    public function addproductcart1(Request $request, $id)
    {
        $product = products::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }
        $sessionCartId = $request->session()->get('yfbstore_cart_session_id');
        $dataToUpdate = $request->all();
        if (Auth::check()) {

            $userId = Auth::id();
            $dataToUpdate['user_id'] = $userId;
        } else if ($sessionCartId) {
            $dataToUpdate['session_id'] = $sessionCartId;
        } else {

            $randomSessionId = Str::random(40);
            $request->session()->put('yfbstore_cart_session_id', $randomSessionId);
            $dataToUpdate['session_id'] = $sessionCartId;
        }
        $ip = $request->ip();
        $dataToUpdate['ip_adress'] = $ip;
        $dataToUpdate['product_id'] = $id;
        carts::create($dataToUpdate, ['product_id' => $id,]);

        return redirect()->route('product');
    }
    public function checkout(Request $request)
    {
        $sessionCartId = $request->session()->get('yfbstore_cart_session_id');
        $cart = carts::with('product.image')->where('session_id', $sessionCartId)->get();
        $state = state::all();
        return view('components.checkout', compact('cart', 'state'));
    }
    public function getcity($state)
    {
        $city = city::where('state_id', $state)->get();

        return response()->json($city);
    }
    public function valid_checkout(Request $request)
    {
        $sessionCartId = $request->session()->get('yfbstore_cart_session_id');

        $order_code = Str::random(10);
        $dataToUpdate = $request->all();
        $dataToUpdate['session_id'] = $sessionCartId;
        $dataToUpdate['order_code'] = $order_code;
        if (Auth::check()) {

            $userId = Auth::id();
            $dataToUpdate['user_id'] = $userId;
        }
        orders::create($dataToUpdate);
        $cart = carts::where('session_id', $sessionCartId);
        $cart->update(['state'=> '2']);
        session()->flash('message', $order_code);
        return redirect()->route('product');
    }
}
