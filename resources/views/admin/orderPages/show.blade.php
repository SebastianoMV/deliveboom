@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card m-auto" style="width: 20rem;">

            <div class="card-body">
                <h5 class="card-title">Ordine Numero: {{ $order->id }}</h5>
                <h6 class="card-title">Totale Ordine {{ $order->total_price }} €</h6>
                <p class="card-text">{{ $order->name }}</p>
                <p class="card-text">
                    @if ($order->status_payment)
                        Pagato
                    @else
                        Non Pagato
                    @endif
                </p>

                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Torna indietro</a>

            </div>
        </div>

    </div>
@endsection
