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
    public function index(){
        $tipologies = Typology::all();
        $users = User::all();

        return response()->json(compact('tipologies', 'users'));
    }

    public function getFoodByTypology($id){
        $tipology = Typology::where('id', $id)->with('users')->first();

        return response()->json($tipology);
    }
}
