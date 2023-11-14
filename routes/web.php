<?php

use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [DishController::class, "index"])->middleware(['auth', 'verified'])->name('home');

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//rotta riepilogo ordini
Route::get('/admin/orders', [OrderController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard.orders');

Route::middleware(['auth', 'verified'])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {

        Route::get("/dishes/create", [DishController::class, "create"])->name("dishes.create");
        Route::post("/dishes", [DishController::class, "store"])->name("dishes.store");

        Route::get("/dishes/index", [DishController::class, "index"])->name("dishes.index");
        Route::get("/dishes/{dish}", [DishController::class, "show"])->name("dishes.show");

        Route::get("/dishes/{dishes}/edit", [DishController::class, "edit"])->name("dishes.edit");
        Route::put("/dishes/{dish}", [DishController::class, "update"])->name("dishes.update"); //da controllare perchè non gli piace il metodo put(che dovrebbe essere corretto)

        Route::delete("/dishes/{dish}", [DishController::class, "destroy"])->name("dishes.destroy");
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
