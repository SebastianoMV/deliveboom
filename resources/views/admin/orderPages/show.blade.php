@extends('layouts.app')

@section('content')

<section class="index">
    <div class="container fluid-resize">
        <div class="index-container">
            <div class="index-header">
                <a class="btn btn-primary index-btn" href="{{route('admin.orders.index')}}"><i class="fa-solid fa-arrow-left"></i>Torna indietro</a>
            </div>
            <div class="index-list">
                <div class="list-head row mx-0">
                    <div class="col-2 list-head-el">N° Ordine</div>
                    <div class="col-2 list-head-el">Totale</div>
                    <div class="col-2 list-head-el">Cliente</div>
                    <div class="col-2 list-head-el">Telefono</div>
                    <div class="col-2 list-head-el">E-Mail</div>
                    <div class="col-2 list-head-el">Data ordine</div>
                    <div class="line-bottom first"></div>
                </div>
                <div class="list-line row mx-0">
                    <div class="col-2 list-line-el">{{$order->id}}</div>
                    <div class="col-2 list-line-el">{{$order->total_price}}</div>
                    <div class="col-2 list-line-el">{{$order->name}}</div>
                    <div class="col-2 list-line-el">{{$order->phone}}</div>
                    <div class="col-2 list-line-el">{{$order->email}}</div>
                    <div class="col-2 list-line-el">{{$order->created_at}}</div>
                    <div class="line-bottom first"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container fluid-resize">
        <div class="index-container no-shadow">
            <div class="index-list">
                <div class="list-head row mx-0">
                    <div class="col-6 list-head-el">Piatto</div>
                    <div class="col-3 list-head-el">Prezzo</div>
                    <div class="col-3 list-head-el">Quantità</div>
                    <div class="line-bottom first"></div>
                </div>
                @foreach ($foods as $food)
                <div class="list-line row mx-0">
                    <div class="col-3 list-line-el">{{$food->name}}</div>
                    <div class="col-3 list-line-el">
                        @if ($food->image)
                            <div class="food-image" style="background-image: url('{{asset('images/foods/'.$food->image)}};">
                            </div>
                        @else
                            <img src="https://cdn.dribbble.com/users/1012566/screenshots/4187820/media/3cb974c28eb00627cc0671685c79ffd9.jpg" alt="placeholder-{{$food->name}}">
                        @endif
                    </div>
                    <div class="col-3 list-line-el">{{$food->price}}</div>
                    <div class="col-3 list-line-el">{{$food->quantity}}</div>
                    <div class="line-bottom"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="container">

        <div class="card m-auto">

            <div class="">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">N Ordine</th>
                            <th scope="col">Totale</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data Dell'ordine</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->created_at }}</td>


                                <td class="w-25">
                                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Torna indietro</a>
                                </td>
                            </tr>

                    </tbody>
                </table>

                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">N Ordine</th>
                            <th scope="col">Totale</th>
                            <th scope="col">Quantità</th>

                        </tr>
                    </thead>
                    @dd($foods)
                    <tbody>

                        @foreach ( $foods as $food)
                        <tr>
                            <th scope="row">{{ $food->name }}</th>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->quantity }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div> --}}
@endsection
