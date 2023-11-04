<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDishRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function index()
    {
        //recupero l'id dell'utente loggato
        $id = Auth::id();

        //recupera il ristorante con lo user_id uguale all'id dello user che è loggato
        $restaurant = Restaurant::where('user_id', $id)->get()->first();

        if (isset($restaurant['id'])) {
            //recupera i piatti che hanno nella colonna 'restaurant_id' l'id del ristorante appena trovato
            $dishes = Dish::where('restaurant_id', $restaurant['id'])->get();

            //se trova dei valori in restaurant_id ritorna i piatti del ristorante, se no ritorna solo la view vuota
            return view("admin.dishes.index", compact("dishes"));
        }

        return view("admin.dishes.index");
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

        //recuper l'id dell'utente loggato
        $id = Auth::id();

        //recupera il ristorante con lo user_id uguale all'id dello user che è loggato
        $restaurant = Restaurant::where('user_id', $id)->get()->first();

        //crea la foreign key e la setta con l'id del ristorante con cui siamo loggati
        $data['restaurant_id'] = $restaurant['id'];

        //checks if the image is set and if so it stores the image
        if (isset($data['image'])) {
            $data['image'] = Storage::put('dishes', $data['image']);
        }

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

        if (isset($data['image'])) {
            // carico il nuovo file
            // salvo in una variabile temporanea il percorso del nuovo file
            $data['image'] = Storage::put('dishes', $data['image']);
        }

        if (isset($dish->image)) {
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
