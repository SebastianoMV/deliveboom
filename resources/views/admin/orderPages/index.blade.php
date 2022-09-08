@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-email-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.food.index') }}">Foods </a>
                        Orders
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">N Ordine</th>
                                    <th scope="col">Prezzo Piatto</th>
                                    <th scope="col">Piatto</th>
                                    <th scope="col">Totale</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            @dd($orders)
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->order_id }}</th>
                                        <td><strong>{{ $order->price }}</strong></td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>{{ $order->email }}</td>


                                        <td class="w-25">
                                            <a class="btn btn-primary" href="{{ route('admin.orders.show', $order) }}">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
