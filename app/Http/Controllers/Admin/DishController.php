<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDishRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data['image'] = Storage::put('dishes', $data['image']);
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



        if (key_exists("image", $data)) {
            // carico il nuovo file
            // salvo in una variabile temporanea il percorso del nuovo file
            $data['image'] = Storage::put('dishes', $data['image']);

            // Dopo aver caricato la nuova immagine, PRIMA di aggiornare il db,
            // cancelliamo dallo storage il vecchio file.

            Storage::delete($dish->image);
        }

        $dish->update($data);

        return redirect()->route('admin.dishes.show', $dish->id);
    }

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);




        if ($dish->image) {
            Storage::delete($dish->image);
        }


        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
