@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-email-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">foods</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Immagine</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Buttons</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($foods as $food)
                                    <tr>
                                        <th scope="row">{{ $food->id }}</th>
                                        <td><strong>{{ $food->name }}</strong></td>
                                        <td>{{ $food->image }}</td>
                                        <td>{{ $food->price }}</td>


                                        <td class="w-25">
                                            <a class="btn btn-danger" href="{{ route('admin.food.show', $food) }}">Show</a>
                                            <a class="btn btn-success" href="#">Edit</a>
                                            <form class="d-inline"
                                                onclick="return confirm('Sei sicuro di voler eliminare {{ $food->name }}?')"
                                                action="#" method="food">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-dark"> Delete</button>
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
    </div>
@endsection
