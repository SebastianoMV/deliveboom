@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <form id="foodCreateForm" action="{{ route('admin.food.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- NOME --}}
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name"
                    placeholder="Inserisci il nome del piatto">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <p id="error-name" class="text-danger"></p>
            </div>

            {{-- IMMAGINE --}}
            <div class="form-group">
                <label for="image">Immagine </label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="image"
                    placeholder="Inserisci immagine"
                    accept="image/*">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <p id="error-image" class="text-danger"></p>
            </div>

            {{-- DESCRIZIONE --}}
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" placeholder="Inserisci descrizione"
                    rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <p id="error-description" class="text-danger"></p>
            </div>

            {{-- CATEGORIA --}}
            <select class="form-select form-control my-2" name="category_id">
                <option disabled selected>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- VEGETARIANO --}}
            <input type="radio" value="1"  id="vegetariana" name="vegan">
            <label class="form-check-label" for="vegetariana">Vegetariana</label>

            <input type="radio" class="ml-3" value="0"  id="no-vegetariana" checked   name="vegan">
            <label class="form-check-label" for="no-vegetariana">Non Vegetariana</label>

            <br>

            {{-- DISPONIBILE --}}
            <input type="radio" value="1"  id="disponibile" name="is_visible" checked>
            <label class="form-check-label" for="disponibile" >Disponibile</label>

            <input type="radio" class="ml-3" value="0"  id="no-disponibile" name="is_visible">
            <label class="form-check-label" for="no-disponibile">Non Disponibile</label>

            {{-- PREZZO --}}
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" id="price"
                    placeholder="Inserisci prezzo">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <p id="error-price" class="text-danger"></p>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
