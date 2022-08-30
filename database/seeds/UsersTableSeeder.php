<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $users = config('users');

        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = Hash::make($user['password']);
            $new_user->address = $user['address'];
            $new_user->vat_number = $user['vat_number'];
            $new_user->city = $user['city'];
            $new_user->image = $user['image'];
            $new_user->slug = User::generateSlug($user['name']);
            $new_user->save();

        };
    }
}
