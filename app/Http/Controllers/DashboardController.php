<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller

{
    public function index()
    {
        $serverUrl = env('SERVER_URL');
        $apiToken = env('API_TOKEN');
        
        $response = Http::withHeaders([
            'Authorization' => $apiToken,
        ])->get($serverUrl . 'api/menu');

        $data['menu'] = $response['data'];

        $collection = collect($response['data']);
        $data['group'] = $collection->groupBy('category_id');
        $data['menus'] = $collection->pluck('category.name',)->unique()->values()->all();
        
        return view ('dashboard', $data);
    }
}
