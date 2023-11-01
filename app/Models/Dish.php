<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'visible',
        'image',
        'discount',
        'ingredients',
    ];

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
