<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order;

class OrderController extends Controller
{
    public function index() {
        //recupero ordini relativi a ristorante
        $orders = Auth::user()->restaurant->orders->sortByDesc('created_at');

        return view('orders', [
            'orders' => $orders
        ]);
    }
}
