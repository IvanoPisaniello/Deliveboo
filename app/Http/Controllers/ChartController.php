<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order;

class ChartController extends Controller
{
    public function index() {
        $orders = Auth::user()->restaurant->orders;

        $labels = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 
        'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

        return view('chart', [
            'orders' => $orders,
            'labels' => $labels
        ]);
    }
}
