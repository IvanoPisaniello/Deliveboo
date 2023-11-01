<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDishRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();

        return view("admin.dishes.index", compact("dishes"));
    }

    public function show($id)
    {
        $dish = Dish::findOrFail($id);

        return view("admin.dishes.show", compact("dish"));
    }

    public function create()
    {
        return view("admin.dishes.create");
    }

    public function store(StoreDishRequest $request)
    {
        //validates the data through the StoreDishRequest
        $data = $request->validated();

        //creates the dish in the database with the data from the from
        $dish = Dish::create($data);

        return redirect()->route("admin.dishes.show", $dish->id);
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);

        return view("admin.dishes.edit", ["dish" => $dish]);
    }

    public function update(StoreDishRequest $request, $id)
    {
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

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);

        // if ($dish->image) {
        //     Storage::delete($dish->image);
        // }

        // $dish->restaurants()->detach();

        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
