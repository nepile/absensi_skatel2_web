@extends('layouts.core')

@section('content-core')
<div class="row mt-4" style="row-gap: 15px"> 

    <div class="col-12">
        <a href="{{ route('categoryPresensi', $rekapan) }}" class="btn btn-secondary">Kembali</a>

        @if ($rekapan == 'bulanan')
        <div class="mt-3 mb-4 d-flex align-items-center" style="column-gap: 10px">
            <div class="col-xl-2">
                <select name="" class="form-control" id="">
                    <option value="">-Month-</option>
                </select>
            </div>
            <div class="col-xl-2">
                <select name="" class="form-control" id="">
                    <option value="">-Year-</option>
                </select>
            </div>
            <div class="col-xl-2">
                <button class="btn text-light" style="background: #af1f22">Cari</button>
            </div>
        </div>
        @endif

        <div class=" mt-3">
            <div class="table-responsive">
                <table class="table table-striped" id="data">
                    <thead style="background: #af1f22; color: #fff">
                        <tr style="white-space: nowrap">
                            <th>No.</th>
                            <th>NIS/NIP</th>
                            <th>Nama</th>
                            @if ($user == 'siswa')
                                <th>Kelas</th>
                            @endif
                            <th>Presensi</th>
                            <th>Waktu Presensi</th>
                            <th>Tanggal Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection