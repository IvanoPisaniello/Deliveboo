<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDishRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\User;
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
        //recupera l'utente loggato
        $user = Auth::user();

        //recupera il piatto con id corrispondente al parametro in input
        $dish = Dish::findOrFail($id);

        //recupera il ristorante con lo user_id uguale all'id dello user che è loggato
        $restaurant = Restaurant::where('id', $dish['restaurant_id'])->get()->first();

        //recupera l'utente con id uguale al restaurant_id del ristorante collegato al piatto
        $loggedUser = User::where('id', $restaurant['user_id'])->get()->first();

        if ($user['id'] == $loggedUser['id']) {
            return view("admin.dishes.show", compact("dish"));
        }

        return abort(404);
    }

    public function create()
    {
        $categories = Category::all();

        return view("admin.dishes.create", compact("categories"));
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

        //controlla se l'immagine è settata, se lo è allora salva l'immagine
        if (isset($data['image'])) {
            $data['image'] = Storage::put('dishes', $data['image']);
        }

        //creates the dish in the database with the data from the from
        $dish = Dish::create($data);

        return redirect()->route("admin.dishes.show", $dish->id);
    }

    public function edit($id)
    {
        $categories = Category::all();

        $user = Auth::user();

        $dish = Dish::findOrFail($id);

        //recupera il ristorante con lo user_id uguale all'id dello user che è loggato
        $restaurant = Restaurant::where('id', $dish['restaurant_id'])->get()->first();

        $loggedUser = User::where('id', $restaurant['user_id'])->get()->first();

        if ($user['id'] == $loggedUser['id']) {
            return view("admin.dishes.edit", ["dish" => $dish, "categories" => $categories,]);
        }

        return abort(404);
    }

    public function update(StoreDishRequest $request, $id)
    {
        $dish = Dish::findOrFail($id);
        $data = $request->validated();

        //se c'è una nuova immagine settata salva quella, se no rimette quella presente in precedenza
        if (isset($data['image'])) {
            // carico il nuovo file
            // salvo in una variabile temporanea il percorso del nuovo file
            $data['image'] = Storage::put('dishes', $data['image']);

            if ($dish->image != null) {
                //se c'è una nuova immagine settata cancella quella vecchia
                Storage::delete($dish->image);
            }
        } else {
            Storage::put('dishes', $dish->image);
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
