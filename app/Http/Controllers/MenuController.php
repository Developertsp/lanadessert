<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
public function index(Request $request)
{
    try {
        $serverUrl = env('SERVER_URL');
        
        $response = Http::withHeaders([
            'Authorization' => $request->session()->get('api_token'),
        ])->get($serverUrl . 'api/categories');
        
        if ($response->successful()) {
            $responseData = $response->json();
            $menus = $responseData['data'];
            $token = $responseData['company_token'];

            $request->session()->put('api_token', $token);
        } else {
            $menus = [];
        }

        return view('pages.menu', ['menus' => $menus]);
    } catch (\Exception $e) {
        Log::error('Error fetching menu data: ' . $e->getMessage());
        return view('pages.menu', ['menus' => []]);
    }
}

}
