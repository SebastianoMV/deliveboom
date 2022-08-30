<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Typology;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $typologies = Typology::all();
        return view('auth.register', compact('typologies'));
    }


    protected function validator(array $data)
    {
        $user = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'min:4', 'max:255'],
            'city' => ['required', 'string', 'min:2', 'max:255'],
            'vat_number' => ['required', 'string', 'min:11', 'max:11'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'tipologies' => ['required']
        ]);


        return $user;
    }

    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'vat_number' => $data['vat_number'],
            'password' => Hash::make($data['password']),
            'slug' => User::generateSlug($data['name']),
        ]);

        $user->typologies()->attach($data['tipologies']);


        return $user;
    }


}
