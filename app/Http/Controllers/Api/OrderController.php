<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Dish;
use Braintree\Gateway;
use App\Mail\newOrder;
use App\Mail\newOrderRestaurant;
use Illuminate\Support\Facades\Mail;
use App\Models\Restaurant;

class OrderController extends Controller
{
    // public function index()
    // {
    //     $this->generate();
    // }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string'],
            'store.totalPrice' => ['required', 'numeric', 'min:0'],
        ]);

        $newOrder = Order::create([
            'firstname' => $data['name'],
            'lastname' => $data['surname'],
            'email' => $data['email'],
            'address' => $data['address'],
            'amount' => $request->store['totalPrice'],
            'delivery_state' => 0,
            'restaurant_id' => $data['store']['cartDish'][0]['restaurant_id']
        ]);

        //email inviata all'utente che ordina
        Mail::to($data['email'])->send(new newOrder($data));
        //email inviata al ristoratore
        $restaurantId = $data['store']['cartDish'][0]['restaurant_id'];
        $restaurantEmail = Restaurant::where('restaurants.id', $restaurantId)
            ->join('users', 'restaurants.user_id', '=', 'users.id')
            ->value('users.email');
        Mail::to($restaurantEmail)->send(new newOrderRestaurant($data));



        //ciclo su quello che contiene il cartDish che contiene elementi del tipo:
        //$data['store']['cartDish'][0] = id: 8, price: "20.00", restaurant_id: 27, title: "Pizza Margherita"
        for ($i = 0; $i < count($data['store']['cartDish']); $i++) {
            //per ogni iterazione vado a prendere nella tabella Dishes il piatto con id corrispondente all'i dell'i-esimo piatto passato da front-end(il ->first() è necessario se no ritorna un array e non un oggetto)
            $singleDish = Dish::where('id', '=', $data['store']['cartDish'][$i]['id'])->get()->first();

            //va ad inserire nella tabella ponte la coppia di id dell'ordine e del piatto e nella colonna quantity aggiunge il 'count' di ogni piatto
            $singleDish->orders()->attach($newOrder, ['quantity' => $data['store']['cartDish'][$i]['count']]);
        }

        return response()->json([
            'results' => $newOrder, 'message' => 'grazie'
        ]);
    }

    public function generate()
    {
        $gateway = new Gateway([
            //environment da lasciare cosi per tutti, mettere nel .env solo le altre credenziali
            'environment' => 'sandbox',
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY"),
        ]);

        $token = $gateway->clientToken()->generate();

        return response()->json(
            $token
        );
    }

    public function payment(Request $request)
    {
        $amount = $request['amount'];
        $nonceFromTheClient = request('payment_method_nonce');

        $gateway = new Gateway([
            //environment da lasciare cosi per tutti, mettere nel .env solo le altre credenziali
            'environment' => 'sandbox',
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY"),
        ]);

        $results = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        return response()->json(["results" => $results]);
    }
}
