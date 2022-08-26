@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card m-auto" style="width: 20rem;">
            <img class="card-img-top" src="{{ $food->image }}" alt="{{ $food->name }}" title="{{ $food->name }}">

            <div class="card-body">
                <h5 class="card-title">{{ $food->name }}</h5>
                <h6 class="card-title">€ {{ $food->price }}</h6>
                <p class="card-text">{{ $food->description }}</p>
                <p class="card-text">{{ $food->is_visible }}</p>
                <p class="card-text">{{ $food->vegan }}</p>


                <a href="{{ route('admin.food.index') }}" class="btn btn-outline-primary">Torna indietro</a>
                <a href="#" class="btn btn-outline-success">Modifica</a>
            </div>
        </div>

    </div>
@endsection
