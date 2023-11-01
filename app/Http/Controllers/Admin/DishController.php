<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDishRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(){
        $dishes = Dish::all();

        return view("admin.dish.index", compact("dishes"));    
    }

    public function show($id)
    {
        $dish = Dish::findOrFail($id);

        return view("admin.dish.show", compact("dish"));
    }

    public function create(){
        $restaurants = Restaurant::all();

        return view("admin.dish.create", ["restaurants" => $restaurants]);
    }

    public function store(StoreDishRequest $request){
        $data = $request->validated();

        // if (isset($data["image"])) {
        //     // Salvo il file in data che è quello che passo al project per creare un nuovo progetto
        //     $data["image"] = Storage::put("dishes", $data["image"]);
        // };


        // Questo fa il new dish, il fill e il save tutto insieme
        $dish = Dish::create($data);

        // if(key_exists("orders", $data)){
        //     $dish->orders()->attach($data["orders"]);
        // }


        return redirect()->route("admin.dishes.show", $dish->id);
    }

    public function edit($id){
        $dish = Dish::findOrFail($id);
        $restaurants = Restaurant::all();

        return view("admin.dish.edit", ["restaurants" => $restaurants]);
    }

    public function update(StoreDishRequest $request, $id){
        $dish = Dish::findOrFail($id);
        $data = $request->validated();

        // if (isset($data["image"])) {

        //     if ($dish->image) {
        //         Storage::delete($dish->image);
        //     }

        //     $image_path = Storage::put("dishes", $data["image"]);

        //     $data["image"] = $image_path;
        // }

        // if(isset($restaurants)){
        //     $dish->restaurants()->sync($data["restaurants"]);

        // }

        $dish->update($data);

        return redirect()->route('admin.dishes.show', $dish->id);
    }

    public function destroy($id){
        $dish = Dish::findOrFail($id);

        // if ($dish->image) {
        //     Storage::delete($dish->image);
        // }

        $dish->restaurants()->detach();

        $dish->delete();

        return redirect()->route('admin.dish.index');
    }



}
