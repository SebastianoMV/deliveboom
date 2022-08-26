<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FoodRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\Category;
use App\User;

class FoodController extends Controller
{

    public function index()
    {
        $activeUser= Auth::id();
        // $foods = Food::where('user_id', $activeUser)->get();
        $foods = Food::orderBy('id','desc')->get();

        return view('admin.pages.index', compact('foods'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.create',compact('categories'));

    }

    public function store(FoodRequest $request)
    {
        $data = $request->all();
        $new_food= new Food();
        $new_food->fill($data);
        $new_food->user_id = Auth::id();
        $new_food->save();

        return redirect()->route('admin.food.show', $new_food);
    }

    public function show($id)
    {
        $food = Food::find($id);

        return view('admin.pages.show', compact('food'));
    }

    public function edit($id)
    {
        $food = Food::find($id);
        $categories = Category::all();

        return view('admin.pages.edit', compact('food','categories'));
    }

    public function update(FoodRequest $request, $id)
    {
        $data = $request->all();
        $food = Food::find($id);
        $food->update($data);

        return redirect()->route('admin.food.show', $food);
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect()->route('admin.food.index');
    }
}
