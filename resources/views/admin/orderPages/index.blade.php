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
                                    <th scope="col">Id</th>
                                    <th scope="col">Totale</th>
                                    <th scope="col">Stato Pagamento</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td><strong>{{ $order->total_price }}</strong></td>
                                        <td>
                                            @if($order->status_payment)
                                                <i class="fa-solid fa-check"></i>
                                            @else
                                                <i class="fa-solid fa-xmark"></i>
                                            @endif
                                        </td>
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
