<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        try {
            $serverUrl = env('SERVER_URL');
           
            $response = Http::get($serverUrl . 'api/categories', [
                'headers' => [
                    'Authorization' => $request->localstorage()->get('api_token'), 
                ]
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                $menus = $responseData['data']; 

                // Store token in session
                $request->localstorage()->put('api_token', $responseData['company_token']);
            } else {
                $menus = []; 
            }

            return view('pages.menu', ['menus' => $menus]);
        } catch (\Exception $e) {
            return view('pages.menu', ['menus' => []]); 
        }
    }
}

