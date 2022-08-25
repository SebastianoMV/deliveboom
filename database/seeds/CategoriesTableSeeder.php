<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
        [
            [
                'name' => 'Pizza',
                'image' => 'pizza.margherita.jpg'
            ],
            [
                'name' => 'Bevande',
                'image' => 'bibite.jpg'
            ],
            [
                'name' => 'Dolci',
                'image' => 'dolci.jpg'
            ],
            [
                'name' => 'Contorni',
                'image' => 'contorni.jpg'
            ],
            [
                'name' => 'Primi Piatti',
                'image' => 'carbonara-guanciale.jpg'
            ],
            [
                'name' => 'Secondi Piatti',
                'image' => 'secondi-piatti.jpg'
            ],
            [
                'name' => 'Panini',
                'image' => 'hamburgerjpg.jpg'
            ],
            [
                'name' => 'Vegetariano',
                'image' => 'vegjpg.jpg'
            ],

        ];

        foreach($categories as $category){
            $new_category = new Category();
            $new_category->name = $category['name'];
            $new_category->image = $category['image'];
            $new_category->save();

        };
    }
}
