@extends('layouts.core')

@section('content-core')
<div class="row mt-4"> 
    <div class="col-12">
        <p class="text-secondary">Rekapan Data Presensi Siswa/Guru.</p>
    </div>
    
    <div class="col-12">
        <div class="card" style="background: #fff; border: 1px solid #eee; box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
            <div class="card-body">
                <div style="border-bottom: 1px solid #eee; border-width: 100%;">
                    <a href="{{ route('categoryPresensi', 'harian') }}" class="text-decoration-none d-inline-block">
                        <h6 class="mb-3">Hari Ini <span class="text-dark">({{ date('d M Y', strtotime('now')) }})</span></h6>
                    </a>
                </div>
                <div style="border-bottom: 1px solid #eee; border-width: 100%;">
                    <a href="{{ route('categoryPresensi', 'bulanan') }}" class="text-decoration-none d-inline-block">
                        <h6 class="my-3">Rekapan Persensi</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection