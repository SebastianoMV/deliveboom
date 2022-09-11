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
                    <div class="col-1 list-head-el"><span>N° Ordine</span></div>
                    <div class="col-1 list-head-el"><span>Totale</span></div>
                    <div class="col-2 list-head-el"><span>Cliente</span></div>
                    <div class="col-2 list-head-el"><span>Telefono</span></div>
                    <div class="col-2 list-head-el"><span>E-Mail</span></div>
                    <div class="col-2 list-head-el"><span>Indirizzo</span></div>
                    <div class="col-2 list-head-el"><span>Data ordine</span></div>
                    <div class="line-bottom first"></div>
                </div>
                <div class="list-line row mx-0">
                    <div class="col-1 list-line-el">{{$order->id}}</div>
                    <div class="col-1 list-line-el">{{$order->total_price}}</div>
                    <div class="col-2 list-line-el">{{$order->name}}</div>
                    <div class="col-2 list-line-el">{{$order->phone}}</div>
                    <div class="col-2 list-line-el">{{$order->email}}</div>
                    <div class="col-2 list-line-el">{{$order->address}}</div>
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
@endsection
