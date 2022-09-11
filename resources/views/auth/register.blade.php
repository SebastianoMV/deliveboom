@extends('layouts.app')

@section('content')
<section class="index">
    <div class="container fluid-resize">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="index-container">
                    <div class="index-header">
                        <strong class="d-block">Registrazione</strong>
                    </div>
                    <form
                        class="form-margin"
                        id="userCreateForm"
                        method="POST"
                        action="{{ route('register') }}">
                        @csrf
                        {{-- NOME --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">Nome del Ristorante:</label>
                            <div class="col-md-6">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    autocomplete="name"
                                    autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- EMAIL --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">E-Mail:</label>
                            <div class="col-md-6">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- INDIRIZZO --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right font-weight-bold">Indirizzo:</label>
                            <div class="col-md-6">
                                <input
                                    id="address"
                                    type="text"
                                    value="{{ old('address') }}"
                                    class="form-control @error('address') is-invalid @enderror"
                                    name="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- CITTA --}}
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right font-weight-bold">Città:</label>
                            <div class="col-md-6">
                                <input
                                    id="city"
                                    type="text"
                                    value="{{ old('city') }}"
                                    class="form-control @error('city') is-invalid @enderror"
                                    name="city"
                                    autocomplete="city">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- P. IVA --}}
                        <div class="form-group row">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right font-weight-bold">Partita Iva:</label>
                            <div class="col-md-6">
                                <input
                                    id="vat_number"
                                    type="text"
                                    value="{{ old('vat_number') }}"
                                    class="form-control @error('vat_number') is-invalid @enderror"
                                    name="vat_number"
                                    autocomplete="vat_number">
                                @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- PASSWORD --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold">Password:</label>
                            <div class="col-md-6">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- CONFERMA PASSWORD --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right font-weight-bold">Conferma Password:</label>
                            <div class="col-md-6">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    @error('password_confirmation') is-invalid @enderror
                                    name="password_confirmation"
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-form-label text-md-right font-weight-bold">Seleziona una o più tipologie:</div>
                        </div>
                        <div class="form-group row">
                            @foreach ($typologies as $typology)
                                <label
                                    for="{{ $typology->name }}"
                                    class="col-4 col-form-label text-md-right">{{ $typology->name }}</label>
                                <div class="col-md-1 col-8 col-form-label align-items-center">
                                    <input
                                        id="{{ $typology->name }}"
                                        type="checkbox"
                                        name="tipologies[]"
                                        value="{{ $typology->id }}"
                                        @if (in_array($typology->id, old('tipologies', []))) checked @endif>
                                </div>
                            @endforeach
                            @error('tipologies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary index-btn">
                                    <i class="fa-solid fa-id-card"></i>Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
