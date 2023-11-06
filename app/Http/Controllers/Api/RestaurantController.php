<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Type;

class RestaurantController extends Controller
{
    public function index()
    {
        /*
        $queryString = request()->query();

        if (isset($queryString) && $queryString != '' && Type::where('name', $queryString)->exists()) {
            $typeToSearch = Type::where('name', $queryString)->get()->first();

            $relatedRestaurants = $typeToSearch->restaurants;

            return response()->json([
                'results' => $relatedRestaurants,
                'count' => $relatedRestaurants->count()
            ]);
        }
        */

        $restaurants = Restaurant::with([
            'user', 'types', 'dishes', 'dishes.category',
            'dishes.orders', 'orders'
        ])->get();

        return response()->json([
            'results' => $restaurants,
            'count' => $restaurants->count()
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)
            ->with(['user', 'types', 'dishes', 'dishes.category', 'dishes.orders', 'orders'])
            ->first();

        if (!$restaurant) {
            abort(404);
        }

        return response()->json($restaurant);
    }
}
