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
        $productDetail  = $request->data['product_detail'];
        $productId      = $request->data['product_id'];
        $options        = $request->data['options'];
        $optionNames    = $request->data['optionNames'];

        $cart = Session::get('cart', []);

        // return count($cart);
        // Check if product already exists in the cart
        $productExists = false;
        foreach ($cart as &$item) {
            if ($item['productId'] == $productId && $item['options'] == $options) {
                $item['quantity']++;
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $cart[] = [
                'rowId'         => count($cart) + 1,
                'productId'     => $productId,
                'productTitle'  => $productDetail['title'],
                'productPrice'  => $productDetail['price'],
                'options'       => $options,
                'optionNames'   => $optionNames,
                'quantity'      => 1,
                'rowTotal'      => $productDetail['price']
            ];
        }
        Session::put('cart', $cart);
        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function update(Request $request)
    {
        $rowId = $request->row_id;
        // $options = $request->options;
        $quantity = $request->quantity;
// return $request;
        $cart = Session::get('cart', []);

        foreach ($cart as &$item) {
            if ($item['rowId'] == $rowId) {
                $item['quantity'] = $quantity;
                $item['rowTotal'] = $quantity * $item['productPrice'];
                break;
            }
        }
// return $cart;
        Session::put('cart', $cart);
        return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
    }


    public function destroy()
    {
        Session::flush();
    }
}
