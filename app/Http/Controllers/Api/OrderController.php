<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        
        $newOrder = new Order;

        $newOrder->firstname = $data['name'];
        $newOrder->lastname = $data['surname'];
        $newOrder->email = $data['mail'];
        $newOrder->address = $data['address'];
        $newOrder->amount = $request->store['totalPrice'];
        $newOrder->delivery_state = 0;
        $newOrder->save();

        return response()->json([
            'results' => $newOrder
        ]);
    }
}
