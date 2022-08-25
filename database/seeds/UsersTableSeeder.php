<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $users =
        [
            [
                'name'=> 'Ichiban',
                'email'=>'Ichiban@gmail.com',
                'password'=>'12345',
                'address'=>'via Ichiban',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_01.jpg',
            ],
            [
                'name'=>'Yoshinoya',
                'email'=>'Yoshinoya@gmail.com',
                'password'=>'12345',
                'address'=>'via Yoshinoya',
                'vat_number'=>'12345678910',
                'city'=>'Reggio Calabria',
                'image'=>'logo_02.png',
            ],
            [
                'name'=>'Sorbillo',
                'email'=>'Sorbillo@gmail.com',
                'password'=>'12345',
                'address'=>'via Sorbillo',
                'vat_number'=>'12345678910',
                'city'=>'Genova',
                'image'=>'logo_03.png',
            ],
            [
                'name'=>'Spontini',
                'email'=>'Spontini@gmail.com',
                'password'=>'12345',
                'address'=>'via Spontini',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_04.png',
            ],
            [
                'name'=>'Flower Burger',
                'email'=>'Flower@gmail.com',
                'password'=>'12345',
                'address'=>'via Flower',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_05.png',
            ],
            [
                'name'=>'Five Guys',
                'email'=>'Fg@gmail.com',
                'password'=>'12345',
                'address'=>'via Five',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_06.png',
            ],
            [
                'name'=>'Eataly',
                'email'=>'Eataly@gmail.com',
                'password'=>'12345',
                'address'=>'via Eataly',
                'vat_number'=>'12345678910',
                'city'=>'Ancona',
                'image'=>'logo_07.jpg',
            ],
            [
                'name'=>'La Piadineria',
                'email'=>'La Piadineria@gmail.com',
                'password'=>'12345',
                'address'=>'via La Piadineria',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_08.jpg',
            ],
            [
                'name'=>'RoadHouse',
                'email'=>'RoadHouse@gmail.com',
                'password'=>'12345',
                'address'=>'via RoadHouse',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_09.webp',
            ],
            [
                'name'=>'Old Wild West',
                'email'=>'OWW@gmail.com',
                'password'=>'12345',
                'address'=>'via Old Wild West',
                'vat_number'=>'12345678910',
                'city'=>'Ancona',
                'image'=>'logo_10.jpg',
            ],
            [
                'name'=>'Panda Express',
                'email'=>'Panda@gmail.com',
                'password'=>'12345',
                'address'=>'via dei Panda',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_11.png',
            ],
            [
                'name'=>'Wok to Walk',
                'email'=>'wok@gmail.com',
                'password'=>'12345',
                'address'=>'via dei Wok',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_12.png',
            ],
            [
                'name'=>'Taco Bell',
                'email'=>'Tacoooos@gmail.com',
                'password'=>'12345',
                'address'=>'via Bell',
                'vat_number'=>'12345678910',
                'city'=>'Ancona',
                'image'=>'logo_13.webp',
            ],
            [
                'name'=>'Calavera',
                'email'=>'Calavera@gmail.com',
                'password'=>'12345',
                'address'=>'via Calavera',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_14.png',
            ],
            [
                'name'=>'Pescaria',
                'email'=>'Pescaria@gmail.com',
                'password'=>'12345',
                'address'=>'via Pescaria',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_15.jpg',
            ],
            [
                'name'=>'NordSee',
                'email'=>'NordSee@gmail.com',
                'password'=>'12345',
                'address'=>'via NordSee',
                'vat_number'=>'12345678910',
                'city'=>'Verona',
                'image'=>'logo_16.png',
            ],

        ];

        foreach($users as $user){
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->address = $user['address'];
            $new_user->vat_number = $user['vat_number'];
            $new_user->city = $user['city'];
            $new_user->image = $user['image'];
            $new_user->slug = Str::slug($user['name'],'-');
            $new_user->save();
        };
    }
}
