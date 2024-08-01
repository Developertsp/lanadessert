<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function view(Request $request)
    {
        $data['cartItems'] = Session::get('cart');
        // return $data;
        return view('pages.cart', $data);
    }

    public function add(Request $request)
    {
        // return $request->data['options'];
        $productDetail  = $request->data['product_detail'];
        $productId      = $request->data['product_id'];
        $options        = $request->data['options'];
        $optionNames    = $request->data['optionNames'];

        $cart = Session::get('cart', []);
// return $request;
        // Check if product already exists in the cart
        $productExists = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $productId && $item['options'] == $options) {
                $item['quantity']++;
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $cart[] = [
                'product_id'    => $productId,
                'product_title' => $productDetail['title'],
                'product_price' => $productDetail['price'],
                'options'       => $options,
                'optionNames'   => $optionNames,
                'quantity'      => 1
            ];
        }
        // return $cart;

        Session::put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function destroy()
    {
        Session::flush();
    }
}
