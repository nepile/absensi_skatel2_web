@extends('layouts.auth')

@section('content-auth')
<div class="container-fluid">
    <div class="row bg-dark" style="height: 100vh;">
        <div class="col-xl-4 p-4" style="height: 100%; background: #fff;">
            <a href="#" style="text-decoration: none; color: #000">
                <div class="col-12 d-flex align-items-center">
                    <img src="{{ asset('img/logo.png') }}" style="width: 70px;">
                    <h5 class="ms-2" style="font-weight: bold;">SMK Telkom 2 Medan</h5>
                </div>    
            </a>

            @auth
            <div class="mt-5">
                <h4 style="font-weight: bold">Aksi Ditolak!</h4>
                <p>Silakan logout terlebih dahulu.</p>
    
                <form action="/handle_logout" method="POST">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>

            @else
            <div class="col-xl-9 col-12 mt-5">
                <h5 style="font-weight: bold;" class="mb-0">Selamat Datang!</h5>
                <p style="font-size: 13px;">Login untuk masuk ke dalam portal.</p>
            </div>

            <div class="col-xl-12 mt-4">
                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="/handle_login" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="nip" style="font-weight: 500;">NIP:</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ old('nip') }}" style="border-radius: 5px; height: 50px;" placeholder="Masukkan NIP anda">
                        @error('nip')
                            <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="password" style="font-weight: 500;">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" style="border-radius: 5px; height: 50px;" placeholder="Masukkan password anda">
                        @error('password')
                            <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <button class="btn" type="submit" style="width: 100%; color: #fff; height: 50px; background: #af1f22;">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>

            @endauth

        </div>

        <div class="col-xl-8 p-0 d-xl-block d-none" style="height: 100%;">
            <img src="{{ asset('img/login_bg.png') }}" style="height: 100%; width: 100%; object-fit: cover;">
        </div>
    </div>
</div>

@endsection