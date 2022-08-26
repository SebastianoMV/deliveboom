<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $categories = config('categories');

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category['name'];
            $new_category->image = $category['image'];
            $new_category->save();
        };
    }
}
