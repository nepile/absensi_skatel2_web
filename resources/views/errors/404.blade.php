@extends('layouts.error')

@php
    $title = '404 Not Found'
@endphp

@section('content-error')
    
    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-8" style="height: 80vh">
            <img src="{{ asset('img/404.jpg') }}" style="width: 100%; height: 100%; object-fit: contain" alt="">
        </div>
    </div>

@endsection