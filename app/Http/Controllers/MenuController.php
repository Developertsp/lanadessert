<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        try {
            // Make API request to fetch categories
            $response = Http::get('http://127.0.0.1:8000/api/categories');

            if ($response->successful()) {
                $menus = $response->json()['data']; // Assuming 'data' contains the array of menus
            } else {
                $menus = []; // Default to empty array if request fails or no data returned
            }

            return view('pages.menu', ['menus' => $menus]);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during API request
            return view('pages.menu', ['menus' => []]); // Return with empty array in case of error
        }
    }
}
