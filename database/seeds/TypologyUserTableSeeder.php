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

        // foreach($users as $user){
        //     $user = User::where($user->id = $c);
        //     $c++;
        //     $typology_id = $user->id_category;

        //     $user->typologies()->attach($typology_id);
        // }
        $users = User::all();
        $c = 1;
        foreach($users_type as $user_type){

            $typology_id = $user_type['id_category'];
            $user = User::where('id', $c)->first();
            $c++;
            $user->typologies()->attach($typology_id);
        }
    }
}
