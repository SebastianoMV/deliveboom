@extends('layouts.app')

@section('content')
<section class="index">
    <div class="container fluid-resize">
        <div class="index-container">
            <div class="index-header">
                <a class="btn btn-outline-danger index-btn" href="{{route('admin.food.index')}}"><i class="fa-solid fa-utensils"></i>Cibi</a>
                <span class="btn btn-danger index-btn"><i class="fa-solid fa-list-check"></i>Ordini</span>
            </div>
            <div class="index-list">
                <div class="list-head row mx-0">
                    <div class="col-2 list-head-el">N° Ordine</div>
                    <div class="col-2 list-head-el">Totale</div>
                    <div class="col-2 list-head-el">Cliente</div>
                    <div class="col-2 list-head-el">Telefono</div>
                    <div class="col-2 list-head-el">Data ordine</div>
                    <div class="col-2 list-head-el"></div>
                    <div class="line-bottom first"></div>
                </div>
                @foreach ($orders as $order)
                    <div class="list-line row mx-0">
                        <div class="col-2 list-line-el">{{$order->id}}</div>
                        <div class="col-2 list-line-el">{{$order->total_price}}</div>
                        <div class="col-2 list-line-el">{{$order->name}}</div>
                        <div class="col-2 list-line-el">{{$order->phone}}</div>
                        <div class="col-2 list-line-el">{{$order->created_at}}</div>
                        <div class="col-2 list-line-el">
                            <a class="btn btn-primary  list-btn" href="{{ route('admin.orders.show', $order) }}">
                                <i class="fa-solid fa-eye"></i><span class="d-lg-flex d-none btn-text">Mostra</span>
                            </a>
                        </div>
                        <div class="line-bottom"></div>
                    </div>
                @endforeach
                {{-- @foreach ($foods as $food)
                    <div class="list-line row mx-0">
                        <div class="col-3 list-line-el">{{$food->name}}</strong></div>
                        <div class="col-3 list-line-el">
                            @if ($food->image)
                                <div class="food-image" style="background-image: url('{{asset('images/foods/'.$food->image)}};">
                                </div>
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
                                <button type="submit" class="btn btn-danger list-btn">
                                    <i class="fa-solid fa-trash-can"></i><span class="btn-text">Elimina</span>
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
                @endforeach --}}
            </div>
        </div>
    </div>
</section>


    {{-- <div class="container">
        <div class="cart-container row justify-email-center">
            <div class="col">

                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.food.index') }}">Cibi <i
                            class="fa-solid fa-utensils"></i></a>
                    <span class="btn btn-primary">Ordini <i class="fa-solid fa-list-check"></i></span>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">N° Ordine</th>
                            <th scope="col">Totale</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data Dell'ordine</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->created_at }}</td>


                                <td class="">
                                    <a class="btn btn-primary" href="{{ route('admin.orders.show', $order) }}">Mostra</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
