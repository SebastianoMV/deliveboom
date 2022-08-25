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
                'image' => 'tipology_02.jpg'
            ],
            [
                'name' => 'Pizzeria',
                'image' => 'tipology_07.jpg'
            ],
            [
                'name' => 'Burgers',
                'image' => 'tipology_08.jpg'
            ],
            [
                'name' => 'Cinese',
                'image' => 'tipology_05.jpg'
            ],
            [
                'name' => 'SteakHouse',
                'image' => 'tipology_03.jpg'
            ],
            [
                'name' => 'Italiano',
                'image' => 'tipology_01.jpg'
            ],
            [
                'name' => 'Messicano',
                'image' => 'tipology_04.jpg'
            ],
            [
                'name' => 'Pesce',
                'image' => 'tipology_06.jpg'
            ],

        ];

        foreach($typologies as $typology){
            $new_typology = new Typology();
            $new_typology->name = $typology['name'];
            $new_typology->image = $typology['image'];
            $new_typology->save();

        };
    }
}
