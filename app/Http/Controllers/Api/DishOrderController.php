<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DishOrder;

class DishOrderController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        $newDishOrder = new DishOrder();

        //$newDishOrder->order_id = $data['name'];
        $newDishOrder->dish_id = $data['surname'];
        $newDishOrder->save();

        return response()->json([
            'results' => $newDishOrder
        ]);
    }
}
