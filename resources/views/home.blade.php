@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' HALAMAN UTAMA
') }}</div>
                    <img src="{{asset('back\img\af.png')}}" alt="">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('s') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
