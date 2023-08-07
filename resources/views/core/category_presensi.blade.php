@extends('layouts.core')

@section('content-core')
<div class="row mt-4" style="row-gap: 15px"> 

    <div class="col-12">
        <a href="{{ route('presensi') }}" class="btn btn-secondary">Kembali</a>
        <div class=" mt-3">
            <h5 class="text-primary">Rekapan {{ ucfirst($rekapan) }}</h5>
            <p class="my-2 text-secondary" style="font-size: 14px">Pilih kategori presensi yang ingin anda lihat</p>
            <hr>
        </div>
    </div>
    
    <a href="" class="col-xl-6 text-decoration-none">
        <div class="card border-0 text-light" style="background: #af1f22">
            <div class="card-body d-flex justify-content-between align-items-center">
                <span>Presensi Siswa</span>
                <span>
                    <i class="fa fa-graduation-cap" style="font-size: 25px"></i>
                </span>
            </div>
        </div>
    </a>    

    <a href="" class="col-xl-6 text-decoration-none">
        <div class="card border-0 text-light" style="background: #af1f22">
            <div class="card-body d-flex justify-content-between align-items-center">
                <span>Presensi Guru</span>
                <span>
                    <i class="fa fa-user" style="font-size: 25px"></i>
                </span>
            </div>
        </div>
    </a>    
    
</div>
@endsection