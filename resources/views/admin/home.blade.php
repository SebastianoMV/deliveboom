@extends('layouts.app')

@section('content')
<section class="index">
    <div class="container fluid-resize mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="index-container">
                    <div class="index-header">
                        <strong class="d-block">{{ __('Dashboard') }}</strong>
                    </div>
                    <div class="form-margin font-weight-bold">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Benvenuto, <span class="custom-red">{{ Auth::user()->name }}</span>!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
