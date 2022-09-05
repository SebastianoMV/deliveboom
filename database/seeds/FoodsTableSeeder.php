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
    public function run()
    {

        $foods = config('foods');

        foreach ($foods as $food) {
            $new_food = new Food();
            $new_food->name = $food['name'];
            $new_food->category_id = $food['category_id'];
            $new_food->user_id = $food['user_id'];
            $new_food->description = $food['description'];
            $new_food->price = $food['price'];
            $new_food->is_visible = $food['is_visible'];
            $new_food->vegan = $food['vegan'];
            $new_food->image = $food['image'];
            $new_food->save();

        };
    }
}
