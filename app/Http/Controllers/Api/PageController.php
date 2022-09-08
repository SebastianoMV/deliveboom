<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\User;
use App\Typology;
use App\Category;
use App\Order;

class PageController extends Controller
{
    public function index()
    {
        $typologies = Typology::all();
        $users = User::with("typologies")->get();
        return response()->json(compact('typologies', 'users'));
    }

    public function getUserByTypology($id)
    {
        $tipology = Typology::where('id', $id)->with('users')->first();
        return response()->json($tipology);
    }

    public function getUserBySlug($slug)
    {
        $user = User::where('slug', $slug)->first();
        return response()->json($user);
    }

    public function getFoodByUserWithCategory($id)
    {
        $foods = Food::where('user_id', $id)->with('category')->get();
        $categories = Category::all();
        return response()->json(compact('foods', 'categories'));
    }

    public function getFoodByCategory($id)
    {
        $foods = Food::where('user_id', $id)->where('category_id', $id)->get();
        return response()->json($foods);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $new_order = new Order();
        $new_order->fill($data);
        $new_order->save();
        for ($i = 0; $i < count($data['foods']); $i++) {
            $new_order->foods()->attach([$data['foods'][$i] => ['quantity' => $data['quantity'][$i]]]);
        }
        return response()->json($new_order);
    }
}
