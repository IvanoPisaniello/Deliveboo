<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            [
                'title' => 'Pizza Margherita',
                'description' => 'Delicious classic margherita pizza with tomato, mozzarella, and basil.',
                'price' => 10.99,
                'visible' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.unmondodisapori.it%2Fprodotto%2Fpizza-margherita%2F&psig=AOvVaw0fipN3_Lo1qUCJLaX_uaBa&ust=1698918187277000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCPjVicrBooIDFQAAAAAdAAAAABAE',
                'discount' => 10,
                'ingredients' => 'Tomato, Mozzarella, Basil',
                'restaurant_id' => 1, // Sostituisci con l'ID del ristorante a cui appartiene
            ],
            [
                'title' => 'Spaghetti Carbonara',
                'description' => 'Creamy pasta with eggs, Pecorino cheese, guanciale, and black pepper.',
                'price' => 12.99,
                'visible' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tavolartegusto.it%2Fricetta%2Fspaghetti-alla-carbonara%2F&psig=AOvVaw3O6CR2rPNYHeHR8LiyIIIT&ust=1698918857573000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIi0g4rEooIDFQAAAAAdAAAAABAE',
                'discount' => 5,
                'ingredients' => 'Eggs, Pecorino Cheese, Guanciale, Black Pepper',
                'restaurant_id' => 2, // Sostituisci con l'ID del ristorante a cui appartiene
            ],
            [
                'title' => 'Sushi Sashimi Combo',
                'description' => 'Assorted sashimi slices, including tuna, salmon, and yellowtail.',
                'price' => 19.99,
                'visible' => true,
                'image' => 'https://www.google.com/url?sa=i&url=http%3A%2F%2Fwww.sushidan.com%2Fsushisashimi&psig=AOvVaw2kt37ZdvCdD472hrGaGXb0&ust=1698918940456000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCLDGxrHEooIDFQAAAAAdAAAAABAJ',
                'discount' => 20,
                'ingredients' => 'Tuna, Salmon, Yellowtail',
                'restaurant_id' => 3, // Sostituisci con l'ID del ristorante a cui appartiene
            ],
            [
                'title' => 'Lasagna Bolognese',
                'description' => 'Layered pasta with rich meat sauce, bechamel, and Parmesan cheese.',
                'price' => 14.99,
                'visible' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fcooking.nytimes.com%2Frecipes%2F9530-lasagna&psig=AOvVaw3Qz0IJCd7PglZvMLDPlvsx&ust=1698919005213000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCODDuNDEooIDFQAAAAAdAAAAABAE',
                'discount' => 20,
                'ingredients' => 'Meat Sauce, Bechamel, Parmesan Cheese',
                'restaurant_id' => 4, // Sostituisci con l'ID del ristorante a cui appartiene
            ],
            [
                'title' => 'Pad Thai Noodles',
                'description' => 'Stir-fried rice noodles with shrimp, tofu, peanuts, and tamarind sauce.',
                'price' => 11.99,
                'visible' => true,
                'image' => 'pad_thai.jpg',
                'discount' => null,
                'ingredients' => 'Shrimp, Tofu, Peanuts, Tamarind Sauce',
                'restaurant_id' => 5, // Sostituisci con l'ID del ristorante a cui appartiene
            ],
        ];

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->title = $dish['title'];
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->visible = $dish['visible'];
            $newDish->image = $dish['image'];
            $newDish->discount = $dish['discount'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->save();
        }
    }
}
