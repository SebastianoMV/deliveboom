@extends('layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection

<style>
    .cart-container {
        width: 100%;
        margin: 50px 0;
        min-height: calc(100vh - 590px);
        background-color: white;
        color: black;
        box-shadow: 0px 0px 15px rgb(189, 189, 189);
        border-radius: 20px;
        overflow: hidden;
    }
</style>
