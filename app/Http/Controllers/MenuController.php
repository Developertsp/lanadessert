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
        $apiToken = env('API_TOKEN');

       
        $response = Http::withHeaders([
            'Authorization' => $apiToken,
        ])->get($serverUrl . 'api/categories');

       
        if ($response->successful()) {       
            
            $responseData = $response->json();
            $menus = $responseData['data'];
        
           
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
