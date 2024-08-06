<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    protected $apiController;

    public function __construct(ApiController $apiController)
    {
        $this->apiController = $apiController;
    }

    public function view(Request $request)
    {
        $data['cartItems'] = Session::get('cart');
        $data['cartSubTotal'] = Session::get('cartSubTotal');
        // return $data;
        return view('pages.cart', $data);
    }

    public function add(Request $request)
    {
        $productId      = $request->data['product_id'];
        $options        = $request->data['options'];
        $optionNames    = $request->data['optionNames'];

        // fetch product detail using api
        $response_product = $this->apiController->product($productId);
        $productDetail =  collect($response_product['products'])->first();

        // fetch product sides/options detail for total price
        $responseOptions = collect($this->apiController->options_detail(array_values($options))['options']);
        $optionsPrice = $responseOptions->sum('price');

        $cart = Session::get('cart', []);

        // Check if product already exists in the cart
        $productExists = false;
        foreach ($cart as &$item) {
            if ($item['productId'] == $productId && $item['options'] == $options) {
                $item['quantity']++;
                $item['rowTotal'] = $item['comboTotal'] * $item['quantity'];
                $productExists = true;
                break;
            }
        }

        $rowId = $productId.time();
        if (!$productExists) {
            $cart[$rowId] = [
                'rowId'         => $rowId,
                'productId'     => $productId,
                'productTitle'  => $productDetail['title'],
                'productPrice'  => $productDetail['price'],
                'options'       => $options,
                'optionNames'   => $optionNames,
                'quantity'      => 1,
                'rowTotal'      => $productDetail['price'] + $optionsPrice,
                'comboTotal'    => $productDetail['price'] + $optionsPrice
            ];
        }

        // Calculate the subtotal
        $subTotal = 0;
        foreach ($cart as $product) {
            $subTotal += $product['rowTotal'];
        }

        Session::put('cart', $cart);
        Session::put('cartSubTotal', $subTotal);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function update(Request $request)
    {
        $rowId = $request->row_id;
        $quantity = $request->quantity;

        $cart = Session::get('cart', []);

        $rowTotal = 0;
        foreach ($cart as &$item) {
            if ($item['rowId'] == $rowId) {
                $item['quantity'] = $quantity;
                $item['rowTotal'] = $quantity * $item['comboTotal'];
                $rowTotal = $item['rowTotal'];
                break;
            }
        }

        // Calculate the subtotal
        $subTotal = 0;
        foreach ($cart as $product) {
            $subTotal += $product['rowTotal'];
        }

        Session::put('cart', $cart);
        Session::put('cartSubTotal', $subTotal);
        
        return response()->json(['success' => true, 'message' => 'Cart updated successfully', 'rowTotal' => $rowTotal, 'cartSubTotal' => $subTotal]);
    }

    public function delete(Request $request)
    {
        $cart = Session::get('cart', []);
        $rowId = $request->row_id;

        if (isset($cart[$rowId])) {
            unset($cart[$rowId]);

            // Calculate the subtotal
            $subTotal = 0;
            foreach ($cart as $product) {
                $subTotal += $product['rowTotal'];
            }

            Session::put('cart', $cart);
            Session::put('cartSubTotal', $subTotal);

            return response()->json(['message' => 'Success', ], 200);
        }

        return response()->json(['message' => 'error'], 404);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'order_type' => 'required|in:pickup,delivery'
        ]);

        Session::put('orderType', $request->order_type);

        $data['cartItems']      = Session::get('cart');
        $data['cartSubTotal']   = Session::get('cartSubTotal');
        $data['orderType']      = Session::get('orderType');
        
        return view('pages.checkout', $data);
    }

    public function checkout_process(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'phone'             => 'required',
            'payment_option'     => 'required|in:cash,card'
        ]);

        $postData['name']           = $request->name;
        $postData['email']          = $request->email ?? NULL;
        $postData['phone']          = $request->phone;
        $postData['address']        = $request->address ?? NULL;
        $postData['paymentOption']  = $request->payment_option;
        $postData['cartItems']      = Session::get('cart');
        $postData['cartSubTotal']   = Session::get('cartSubTotal');
        $postData['cartTotal']      = Session::get('cartSubTotal');
        $postData['orderType']      = Session::get('orderType');

        $serverUrl  = env('SERVER_URL');
        $apiToken   = env('API_TOKEN');

        $url = 'api/orders/process';
        
        $response = Http::withHeaders([
            'Authorization' => $apiToken,
        ])->post($serverUrl . $url, $postData);

        if ($response->json('status') === 'success') {
            Session::flush();
        }
        Session::flash('response', $response->json());
        return redirect()->route('order');
    }

    public function order()
    {
        return view('pages.order');
    }

    public function destroy()
    {
        Session::flush();
    }
}
