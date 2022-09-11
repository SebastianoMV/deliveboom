@extends('layouts.app')
@section('content')
<section class="index">
    <div class="container fluid-resize mb-5">
        <form
            id="foodCreateForm"
            class="index-container px-4 pt-2 pb-4"
            action="{{route('admin.food.store')}}"
            method="POST"
            enctype="multipart/form-data"
            style="background-color: #fff6eb">
            @csrf
            {{-- NOME  --}}
            <div class="form-group">
                <label for="name"><strong>Nome</strong></label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{old('name')}}"
                    name="name"
                    id="name"
                    placeholder="Inserisci il nome del piatto.">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <p id="error-name" class="text-danger"></p>
            </div>
            {{-- IMMAGINE --}}
            <div class="form-group">
                <label for="image"><strong>Immagine</strong></label>
                <input
                    type="file"
                    class="form-control @error('image') is-invalid @enderror"
                    name="image"
                    value="{{old('image')}}"
                    id="image"
                    placeholder="Inserisci immagine"
                    accept="image/*">
                @error('image')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <p id="error-image" class="text-danger"></p>
            </div>
            {{-- DESCRIZIONE --}}
            <div class="form-group">
                <label for="description"><strong>Descrizione</strong></label>
                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    id="description"
                    cols="30"
                    placeholder="Inserisci descrizione."
                    rows="10">{{old('description')}}
                </textarea>
                @error('description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <p id="error-description" class="text-danger"></p>
            </div>
            {{-- CATEGORIA --}}
            <select
                class="form-select form-control mt-2 mb-3"
                name="category_id">
                <option disabled selected>Seleziona una categoria.</option>
                @foreach ($categories as $category)
                    <option
                        value="{{$category->id}}"
                        @if ($category->id == old('category_id')) selected @endif>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>

            {{-- VEGETARIANO --}}
            <div class="mt-3">
                Vegetariano:
                <br>
                <input type="radio" value="1"  id="vegetariana" name="vegan">
            <label class="form-check-label" for="vegetariana">Si</label>

            <input type="radio" class="ml-3" value="0"  id="no-vegetariana" checked   name="vegan">
            <label class="form-check-label" for="no-vegetariana">No</label>
            </div>


            <br>

            {{-- DISPONIBILE --}}
            <div class="mb-3">
                Disponibile:
                <br>
                <input type="radio" value="1"  id="disponibile" name="is_visible" checked>
                <label class="form-check-label" for="disponibile" >Si</label>

                <input type="radio" class="ml-3" value="0"  id="no-disponibile" name="is_visible">
                <label class="form-check-label" for="no-disponibile">No</label>
            </div>
            {{-- PREZZO --}}
            <div class="form-group mt-3">
                <label for="price"><strong>Prezzo</strong></label>
                <input
                    type="text"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price') }}"
                    name="price"
                    id="price"
                    placeholder="Inserisci prezzo.">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <p id="error-price" class="text-danger"></p>
            </div>
            <button type="submit" class="btn btn-primary index-btn"><i class="fa-solid fa-upload"></i>Carica</button>
            <a class="btn btn-danger index-btn" href="{{ url()->previous() }}"><i class="fa-regular fa-circle-xmark"></i>Annulla</a>
        </form>
    </div>
</section>
@endsection
