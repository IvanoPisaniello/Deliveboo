<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class order extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'firstname',
    //     'lastname',
    //     'email',
    //     'address',
    //     'amount',
    //     'delivery_state'
    // ];

    public function dish() {
        return $this->belongsToMany(Dish::class);
    }
}
