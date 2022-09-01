<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FoodRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\Category;
use App\User;

class FoodController extends Controller
{

    public function index()
    {
        $activeUser = Auth::id();
        $foods = Food::where('user_id', $activeUser)->get();
        //$foods = Food::orderBy('id', 'desc')->get();

        return view('admin.pages.index', compact('foods'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.create', compact('categories'));
    }

    public function store(FoodRequest $request)
    {
        $data = $request->all();
        $data['image'] = $this->imageUploader($request, $data);

        $new_food = new Food();
        $new_food->fill($data);
        $new_food->user_id = Auth::id();
        $new_food->save();

        return redirect()->route('admin.food.show', $new_food);
    }

    public function show($id)
    {
        // if(Auth::id() != $id){
        //     abort(403);
        // };

        $food = Food::find($id);

        return view('admin.pages.show', compact('food'));
    }

    public function edit($id)
    {
        $food = Food::find($id);
        $categories = Category::all();

        return view('admin.pages.edit', compact('food', 'categories'));
    }

    public function update(FoodRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $this->imageUploader($request, $data);
        $food = Food::find($id);
        $food->update($data);

        return redirect()->route('admin.food.show', $food);
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        // $destination = 'image/foods'.$food->image;
        $image_path = public_path("/image/foods/").$food->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        $food->delete();

        return redirect()->route('admin.food.index')->with('food_delete_success', "$food->name eliminata correttamente!");
    }

    public function imageUploader($request, $data){
        if($request->file('image')){

            $file = $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image/foods'), $filename);
            $data['image']= $filename;

            return $data['image'];
        }
    }
}
