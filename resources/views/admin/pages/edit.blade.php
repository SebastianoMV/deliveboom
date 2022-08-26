@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.food.update', $food) }}" method="POST">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name"
                    placeholder="Inserisci il nome del piatto">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Immagine </label>
                <input type="text" class="form-control" name="image" value="{{ old('image') }}" id="image"
                    placeholder="Inserisci url">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" name="description" id="description" cols="30" placeholder="Inserisci descrizione"
                    rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <select class="form-select form-control my-2" name="category_id">
                <option disabled selected>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- VEGETARIAN --}}
          <input type="radio" value="1"  id="vegetariana" name="vegan">
          <label class="form-check-label" for="vegetariana">Vegetariana</label>

          {{-- NON-VEGETARIAN --}}

          <input type="radio" class="ml-3" value="0"  id="no-vegetariana" checked   name="vegan">
          <label class="form-check-label" for="no-vegetariana">Non Vegetariana</label>


            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="text" class="form-control" value="{{ old('price') }}" name="price" id="price"
                    placeholder="Inserisci prezzo">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
