<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Typology;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies =
        [
            [
                'name' => 'Giapponese',
                'image' => ''
            ],
            [
                'name' => 'Pizzeria',
                'image' => ''
            ],
            [
                'name' => 'Burgers',
                'image' => ''
            ],
            [
                'name' => 'Cinese',
                'image' => ''
            ],
            [
                'name' => 'SteakHouse',
                'image' => ''
            ],
            [
                'name' => 'Italiano',
                'image' => ''
            ],
            [
                'name' => 'Messicano',
                'image' => ''
            ],
            [
                'name' => 'Pesce',
                'image' => ''
            ],

        ];

        foreach($typologies as $typology){
            $new_typology = new Typology();
            $new_typology->name = $typologies;
            $new_typology->save();

        };
    }
}
