@extends('layouts.app')

@section('content')
<section class="index">
    <div class="container mb-5">
        <div class="card m-auto index-container" style="width: 20rem;">
            @if ($food->image)
                <img src="{{asset('images/foods/'.$food->image)}}" alt="{{$food->name}}">
            @else
                <img src="https://cdn.dribbble.com/users/1012566/screenshots/4187820/media/3cb974c28eb00627cc0671685c79ffd9.jpg"
                    alt="">
            @endif
            <div class="card-body">
                <h4 class="card-title font-weight-bold">{{ $food->name }}</h4>
                <h6 class="card-title">€ {{ $food->price }}</h6>
                <p class="card-text">{{ $food->description }}</p>
                <p class="card-text">
                    @if ($food->is_visible == 1)
                        Disponibile
                    @else
                        Non disponibile
                    @endif
                </p>
                <p>
                    @if ($food->vegan == 1)
                        <img class="is-vegan" src="{{ asset('images/vegetarian-mark.png') }}" alt="">
                    @endif
                </p>
                <a href="{{route('admin.food.index')}}" class="btn btn-primary index-btn"><i class="fa-solid fa-arrow-left"></i>Torna indietro</a>
                <a href="{{route('admin.food.edit',$food) }}" class="btn btn-secondary index-btn"><i class="fa-solid fa-pen-to-square"></i>Modifica</a>
            </div>
        </div>

    </div>
</section>
@endsection
