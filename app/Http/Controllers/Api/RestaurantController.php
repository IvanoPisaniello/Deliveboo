<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Type;

class RestaurantController extends Controller
{
    public function index()
    {
        $query = request()->query();

        //se la querystring è settata ed è diversa da '' allora parte il filtro
        if (isset($query) && $query != []) {
            // FILTRO DELLE CARD DEI RISTORANTI:
            // if ($query['type']) {
            //     dump('la query è type');
            //     $queryString = explode(',', $query['type']);

            //     if (Type::where('name', $queryString)->exists()) {
            //         $typeToSearch = Type::where('name', $queryString)->get()->first();

            //         $relatedRestaurants = $typeToSearch->restaurants;
            //     }
            //     return response()->json([
            //         'results' => $relatedRestaurants,
            //         'count' => $relatedRestaurants->count(),
            //     ]);
            // }

            //FILTRO DEI RISTORANTI TRAMITE CHECKBOX
            $selectedTypes = [];
            foreach ($query as $key => $el) {
                if ($el['value'] == 'true') {
                    $type = Type::where('name', $key)->get()->first();
                    array_push($selectedTypes, $type['id']);
                }
            }

            //$selectedTypes = [1, 2]; Esempio: tipi selezionati con i loro ID (1 per pizzeria, 2 per sushi)
            $relatedRestaurants = Restaurant::whereHas('types', function ($query) use ($selectedTypes) {
                $query->whereIn('type_id', $selectedTypes);
            }, '>=', count($selectedTypes))->get();

            //recupero dei type dei ristoranti filtrati
            for ($i = 0; $i < count($relatedRestaurants); $i++) {
                $relatedRestaurants[$i] = Restaurant::where('name', $relatedRestaurants[$i]['name'])->with(['types'])->get()[0];
            }

            //SE NON TROVA RISTORANTI LI RESTITUISCE TUTTI CON UN MESSAGGIO DI ERRORE IN ALLEGATO
            if (count($relatedRestaurants) == 0) {
                $restaurants = [];
                array_push($restaurants, 'false');
                return response()->json([
                    'results' => $restaurants,
                ]);
            }

            return response()->json([
                'results' => $relatedRestaurants
            ]);
        }

        $restaurants = Restaurant::with([
            'user', 'types', 'dishes', 'dishes.category',
            'dishes.orders', 'orders'
        ])->get();

        return response()->json([
            'results' => $restaurants,
            'count' => $restaurants->count(),
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)
            ->with(['user', 'types', 'dishes', 'dishes.category', 'dishes.orders', 'orders'])
            ->first();

        if (!$restaurant) {
            abort(404);
        }

        return response()->json($restaurant);
    }
}



//FILTRO SBAGLIATO TENUTO PER RICORDO :)
// $typeToSearch = [];

// for ($i=0; $i < count($queryString); $i++) { 
//     array_push($typeToSearch, Type::where('name', $queryString[$i])->get()->first());
// }
// dump($typeToSearch);

// for ($i=0; $i < count($typeToSearch); $i++) { 
//     if ($typeToSearch[$i]->restaurants) {
//         $relatedRestaurants = $typeToSearch[$i]->restaurants;
//     }
// }
//$relatedRestaurants = $typeToSearch->restaurants;
