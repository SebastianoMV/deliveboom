<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function typologies()
    {
        return $this->belongsToMany('App\Typology');
    }

    public function foods()
    {
        return $this->hasMany('App\Food');
    }

    protected $fillable = [
        'name', 'email', 'password', 'address', 'vat_number', 'city', 'image', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateSlug($nome)
    {
        $slug = Str::slug($nome, '-');
        $base_slug = $slug;
        $slug_exist = User::where('slug', $slug)->first();
        $c = 1;

        while ($slug_exist) {
            $slug = $base_slug . '-' . $c;
            $c++;
            $slug_exist = User::where('slug', $slug)->first();
        }

        return $slug;
    }
}