@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="cart-container row justify-email-center">
            <div class="col">
                <div class="">
                    @if (session('food_delete_success'))
                        <div class="alert alert-success d-flex justify-content-between" role="danger">
                            <p>{{ session('food_delete_success') }}</p>
                            <a href="{{ route('admin.food.index') }}" class=""><i class="fa-solid fa-xmark"></i></a>
                        </div>
                    @endif
                    <div class="card-header">
                        <span class="btn btn-primary">Cibi <i class="fa-solid fa-utensils"></i></span>
                        <a class="btn btn-success" href="{{ route('admin.orders.index') }}"> Ordini <i
                                class="fa-solid fa-list-check"></i></a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Immagine</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                                <tr>
                                    <td><strong>{{ $food->name }}</strong></td>
                                    <td>
                                        @if ($food->image)
                                            <img style="width: 100px; max-height: 120px;"
                                                src="{{ asset('images/foods/' . $food->image) }}" alt="{{ $food->name }}">
                                        @else
                                            <img style="width: 100px; max-height: 120px;"
                                                src="https://cdn.dribbble.com/users/1012566/screenshots/4187820/media/3cb974c28eb00627cc0671685c79ffd9.jpg"
                                                alt="">
                                        @endif
                                    </td>
                                    <td>{{ $food->price }}</td>


                                    <td class="w-25">
                                        <a class="btn btn-primary" href="{{ route('admin.food.show', $food) }}">Mostra</a>
                                        <a class="btn btn-secondary"
                                            href="{{ route('admin.food.edit', $food) }}">Modifica</a>
                                        <form class="d-inline"
                                            onclick="return confirm('Sei sicuro di voler eliminare {{ $food->name }}?')"
                                            action="{{ route('admin.food.destroy', $food) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
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

    button.btn-danger {
        padding: 10px;
    }
</style>
