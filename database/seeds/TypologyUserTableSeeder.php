<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Typology;

class TypologyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_type = config('users');

        $c = 1;
        foreach($users_type as $user_type){

            $typology_id = $user_type['id_category'];
            $user = User::where('id', $c)->first();
            $c++;
            $user->typologies()->attach($typology_id);
        }
    }
}
