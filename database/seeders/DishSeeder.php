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
                'image' => 'https://images.prismic.io/eataly-us/ed3fcec7-7994-426d-a5e4-a24be5a95afd_pizza-recipe-main.jpg?auto=compress,format',
                'discount' => 10,
                'ingredients' => 'Tomato, Mozzarella, Basil',

            ],
            [
                'title' => 'Spaghetti Carbonara',
                'description' => 'Creamy pasta with eggs, Pecorino cheese, guanciale, and black pepper.',
                'price' => 12.99,
                'visible' => true,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/33/Espaguetis_carbonara.jpg',
                'discount' => 5,
                'ingredients' => 'Eggs, Pecorino Cheese, Guanciale, Black Pepper',

            ],
            [
                'title' => 'Sushi Sashimi Combo',
                'description' => 'Assorted sashimi slices, including tuna, salmon, and yellowtail.',
                'price' => 19.99,
                'visible' => true,
                'image' => 'https://images.squarespace-cdn.com/content/v1/51d3a842e4b0d2448ac01e8d/cad0d366-f2a5-4f44-bbac-a081bf3a9e26/DeluxeSushiCombo.jpg',
                'discount' => 20,
                'ingredients' => 'Tuna, Salmon, Yellowtail',

            ],
            [
                'title' => 'Lasagna Bolognese',
                'description' => 'Layered pasta with rich meat sauce, bechamel, and Parmesan cheese.',
                'price' => 14.99,
                'visible' => true,
                'image' => 'https://www.aiafood.com/sites/default/files/styles/scale_1920/public/recipes/lasagne.jpg?itok=y1YTJOv-',
                'discount' => 20,
                'ingredients' => 'Meat Sauce, Bechamel, Parmesan Cheese',

            ],
            [
                'title' => 'Pad Thai Noodles',
                'description' => 'Stir-fried rice noodles with shrimp, tofu, peanuts, and tamarind sauce.',
                'price' => 11.99,
                'visible' => true,
                'image' => 'pad_thai.jpg',
                'discount' => null,
                'ingredients' => 'Shrimp, Tofu, Peanuts, Tamarind Sauce',

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

            $newDish->save();
        }
    }
}
