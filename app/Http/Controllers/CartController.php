<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function view(Request $request)
    {
        return session('cart');
    }

    public function add(Request $request)
    {
        // return $request->data['options'];
        $productId = $request->data['product_id'];
        $options = $request->data['options'];

        // Assuming you have a Cart model to manage the cart
        $cart = session()->get('cart', []);

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
                'product_id' => $productId,
                'options' => $options,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }
}
