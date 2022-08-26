<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       for($i = 0; $i <30; $i++){
        $new_food = new Food();
        $new_food->name = $faker->word();
        $new_food->category_id = $faker->NumberBetween(1,8);
        $new_food->description = $faker->sentence();
        $new_food->price = $faker->randomDigit();
        $new_food->is_visible = 1;
        $new_food->vegan = $faker->boolean();
        $new_food->image = $faker->imageUrl(640,480,'food',true);
        $new_food->save();
       }
    }
}
