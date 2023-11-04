<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        //searches in the types table alle the types
        $types = Type::all();

        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name' => ['required', 'string', 'max:255'],
            'vat' => ['required', 'string', 'size:11'],
            'user_address' => ['required', 'string', 'max:255'],
            'user_id',
            'types' => ['required']
        ]);







        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $restaurant = Restaurant::create([
            'name' => $request->restaurant_name,
            'address' => $request->user_address,
            'slug' => $this->generateSlug($request->restaurant_name),
            'vat' => $request->vat,
            'user_id' => $user->id,
        ]);




        $restaurant->types()->attach($request['types']);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    protected function generateSlug(string $title): string
    {
        $counter = 0;

        do {

            //if counter is 0, the slug is $title, else "$title-$counter"
            if ($counter == 0) {
                $slug = $title;
            } else {
                $slug = $title . "-" . $counter;
            }

            //if it doesn't exist the value is null and the while doesn't begin, else il cycles until it doesn't exist
            $alreadyExists = Restaurant::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists);

        return $slug;
    }
}
