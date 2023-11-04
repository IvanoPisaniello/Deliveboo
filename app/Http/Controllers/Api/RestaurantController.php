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

    public function show($slug) {
        $restaurant = Restaurant::where('slug', $slug)
        ->with(['user', 'types', 'dishes', 'dishes.category', 'dishes.orders', 'orders'])
        ->first();

        if (!$restaurant) {
            abort(404);
        }

        return response()->json($restaurant);
    }
}
