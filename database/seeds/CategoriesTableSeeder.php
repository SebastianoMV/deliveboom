<?php

use Illuminate\Database\Seeder;

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
            {
                'name' => 'Giapponese',
                'image' => ''
            },
            {
                'name' => 'Pizzeria',
                'image' => ''
            },
            {
                'name' => 'Burgers',
                'image' => ''
            },
            {
                'name' => 'Cinese',
                'image' => ''
            },
            {
                'name' => 'SteakHouse',
                'image' => ''
            },
            {
                'name' => 'Italiano',
                'image' => ''
            },
            {
                'name' => 'Messicano',
                'image' => ''
            },
            {
                'name' => 'Pesce',
                'image' => ''
            },

        ];

        foreach($typologies as $typology){
            $new_typology = new Typology();
            $new_typology->name = $typologies;
            $new_ingredient->slug = Str::slug($ingredient,'-');
            $new_ingredient->save();

        };
    }
}
