@extends('layouts.app')
@section('content')
<section class="index">
    <div class="container fluid-resize">
        <div class="index-container">
            <div class="index-header">
                <span class="btn btn-primary index-btn"><i class="fa-solid fa-utensils"></i>Cibi</span>
                <a class="btn btn-success index-btn" href="{{ route('admin.orders.index') }}"><i class="fa-solid fa-list-check"></i>Ordini</a>
            </div>
            <div class="index-list">
                <div class="list-head row mx-0">
                    <div class="col-3 list-head-el">Nome</div>
                    <div class="col-3 list-head-el">Immagine</div>
                    <div class="col-6 list-head-el">Prezzo &lpar;&euro;&rpar;</div>
                    <div class="line-bottom first"></div>
                </div>
                @if (session('food_delete_success'))
                    <div class="alert alert-success d-flex justify-content-between w-75 mx-auto" role="danger">
                        <p>{{ session('food_delete_success') }}</p>
                        <a href="{{ route('admin.food.index') }}" class=""><i class="fa-solid fa-xmark"></i></a>
                    </div>
                @endif
                @foreach ($foods as $food)
                    <div class="list-line row mx-0">
                        <div class="col-3 list-line-el">{{$food->name}}</strong></div>
                        <div class="col-3 list-line-el">
                            @if ($food->image)
                                <div style="width: 100%; max-width: 140px;  height: 100px; background-image: url('{{asset('images/foods/' . $food->image)}}; background-position: center; background-size: cover;">

                                </div>
                                {{-- <img src="{{asset('images/foods/' . $food->image)}}" alt="{{$food->name}}"> --}}
                            @else
                                <img src="https://cdn.dribbble.com/users/1012566/screenshots/4187820/media/3cb974c28eb00627cc0671685c79ffd9.jpg" alt="placeholder-{{$food->name}}">
                            @endif
                        </div>
                        <div class="col-2 list-line-el">{{$food->price}}</div>
                        <div class="col-4 d-lg-flex d-none list-line-el">
                            <a class="btn btn-primary list-btn" href="{{route('admin.food.show', $food)}}"><i class="fa-solid fa-eye"></i><span class="btn-text">Mostra</span></a>
                            <a class="btn btn-secondary list-btn"
                                href="{{route('admin.food.edit', $food)}}"> <i class="fa-solid fa-pen-to-square"></i><span class="btn-text">Modifica</span></a>
                            <form
                                onclick="return confirm('Sei sicuro di voler eliminare {{$food->name}}?')"
                                action="{{ route('admin.food.destroy', $food) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger list-btn"><i
                                        class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-4 d-lg-none d-flex list-line-el">
                            <a class="btn btn-primary list-btn" href="{{route('admin.food.show', $food)}}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-secondary list-btn"
                                href="{{route('admin.food.edit', $food)}}"> <i class="fa-solid fa-pen-to-square"></i></a>
                            <form
                                onclick="return confirm('Sei sicuro di voler eliminare {{$food->name}}?')"
                                action="{{ route('admin.food.destroy', $food) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger list-btn"><i
                                        class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                        <div class="line-bottom"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
