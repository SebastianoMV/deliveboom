@extends('layouts.app')

@section('content')
    <div class="container">

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
                    {{-- @dd($foods) --}}
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

    </div>
@endsection
