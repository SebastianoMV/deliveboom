<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:5|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',
            'price' => 'required|max:99.99|numeric',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.min' => 'Il campo nome deve avere almeno :min caratteri',
            'name.max' => 'Il campo nome può avere massimo :max caratteri',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'description.min' => 'Il campo descrizione deve avere almeno :min caratteri',
            'image.max' => 'L\'url del file deve essere inferiore a :max caratteri',
            'price.required' => 'Il campo prezzo è obbligatorio',
            'price.numeric' => 'Il campo prezzo deve contenere solo numeri',
            'price.max' => 'Il prezzo deve essere inferiore a 100',
        ];
    }
}

