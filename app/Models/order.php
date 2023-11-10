<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'amount',
        'delivery_state'
    ];

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes() {
        return $this->belongsToMany(Dish::class);
    }
}
