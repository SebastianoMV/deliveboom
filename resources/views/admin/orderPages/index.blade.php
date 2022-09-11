@extends('layouts.app')
@section('content')
<section class="index">
    <div class="container fluid-resize">
        <div class="index-container">
            <div class="index-header">
                <a class="btn btn-outline-danger index-btn" href="{{route('admin.food.index')}}"><i class="fa-solid fa-utensils"></i>Cibi</a>
                <span class="btn btn-danger index-btn"><i class="fa-solid fa-list-check"></i>Ordini</span>
            </div>
            @if (count($orders) === 0)
                <h3 class="w-100 text-center my-3 font-weight-bolder">L'elenco degli ordini è vuoto.</h3>
            @else
                <div class="index-list">
                    <div class="list-head row mx-0">
                        <div class="col-2 list-head-el"><span>N° Ordine</span></div>
                        <div class="col-2 list-head-el"><span>Totale</span></div>
                        <div class="col-2 list-head-el"><span>Cliente</span></div>
                        <div class="col-2 list-head-el"><span>Telefono</span></div>
                        <div class="col-4 list-head-el"><span>Data ordine</span></div>
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
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
