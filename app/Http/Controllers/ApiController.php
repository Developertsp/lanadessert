<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function categories()
    {
        $serverUrl = env('SERVER_URL');
        $apiToken = env('API_TOKEN');
        
        $response = Http::withHeaders([
            'Authorization' => $apiToken,
        ])->get($serverUrl . 'api/categories_a');

        if($response['status'] == 'success'){
            $data['response'] = true;
            $data['categories'] = $response['data'];
        }
        else{
            $data['response'] = false;
        }
        
        return view('pages.categories', $data);

    }

    public function products(Request $request)
    {
        $serverUrl = env('SERVER_URL');
        $apiToken = env('API_TOKEN');

        $url = 'api/category/products/' . $request->category;
        
        $response = Http::withHeaders([
            'Authorization' => $apiToken,
        ])->get($serverUrl . $url);

        if($response['status'] == 'success'){
            $data['response'] = true;
            $data['products'] = $response['data'];
            $data['category'] = $request->category;
        }
        else{
            $data['response'] = false;
            // $data['category'] = $request->category;
        }
        
        return view('pages.products', $data);
    }

    public function product($id)
    {
        $serverUrl = env('SERVER_URL');
        $apiToken = env('API_TOKEN');

        $url = 'api/products/' . $id;
        
        $response = Http::withHeaders([
            'Authorization' => $apiToken,
        ])->get($serverUrl . $url);

        if($response['status'] == 'success'){
            $data['response'] = true;
            $data['products'] = $response['data'];
        }
        else{
            $data['response'] = false;
        }

        return $data;
    }

    public function options_detail($ids)
    {
        $serverUrl = env('SERVER_URL');
        $apiToken = env('API_TOKEN');

        $url = 'api/options/detail/';

        $response = Http::withHeaders([
            'Authorization' => $apiToken,
        ])->get($serverUrl . $url, $ids);

        if($response['status'] == 'success'){
            $data['response'] = true;
            $data['options'] = $response['data'];
        }
        else{
            $data['response'] = false;
        }

        return $data;
    }
}
