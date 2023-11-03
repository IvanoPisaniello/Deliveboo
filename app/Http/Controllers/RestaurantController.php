<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    function store(Request $request){
        $data = $request;

        $restaurant = Restaurant::find();

        $restaurant->types()->attach($data["types"]);

        return;
    }
}