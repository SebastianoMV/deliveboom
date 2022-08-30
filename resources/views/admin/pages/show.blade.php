@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card m-auto" style="width: 20rem;">
            <img class="card-img-top" src="{{asset('foods/'.$food->image)}}" alt="{{ $food->name }}" title="{{ $food->name }}">

            <div class="card-body">
                <h5 class="card-title">{{ $food->name }}</h5>
                <h6 class="card-title">€ {{ $food->price }}</h6>
                <p class="card-text">{{ $food->description }}</p>
                <p class="card-text">
                    @if ($food->is_visible == 1)
                        disponibile
                    @else
                        non disponibile
                    @endif
                </p>
                <p>Vegetariana:
                    @if ($food->vegan == 1)
                        si
                    @else
                        no
                    @endif
                </p>

                <a href="{{ route('admin.food.index') }}" class="btn btn-primary">Torna indietro</a>
                <a href="{{ route('admin.food.edit', $food) }}" class="btn btn-secondary">Modifica</a>
            </div>
        </div>

    </div>
@endsection
