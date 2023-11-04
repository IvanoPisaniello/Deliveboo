<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index() {

        $restaurants = Restaurant::with(['user', 'types', 'dishes', 'dishes.category',
        'dishes.orders', 'orders'])
        ->get();

        return response()->json([
            'results' => $restaurants,
            'count' => $restaurants->count()
        ]);
    }
}
