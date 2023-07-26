@extends('layouts.core')

@section('content-core')

    <div class="row">
      <p style="font-weight: 600; font-size: 18px">Halo, {{ ucfirst(auth()->user()->level->level_name) }}</p>
    </div>

    <div class="row" style="row-gap: 20px">
      <a href="{{ route('siswa') }}" class="col-md-6 text-decoration-none">
        <div class="card" style="border: 1px solid #eee; box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
          <div class="card-body d-flex flex-column" style="color: #af1f22">
            <div>
              Jumlah Siswa
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="mt-1 mb-0" style="font-weight: bold">206</h3>
              <i class="fa fa-graduation-cap" style="color: #ddd; font-size: 25px"></i>
            </div>
          </div>
        </div>
      </a>
      
      <a href="{{ route('guru') }}" class="col-md-6 text-decoration-none">
        <div class="card" style="border: 1px solid #eee; box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
          <div class="card-body d-flex flex-column" style="color: #af1f22">
            <div>
              Jumlah Guru
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="mt-1 mb-0" style="font-weight: bold">206</h3>
              <i class="fa fa-user" style="color: #ddd; font-size: 25px"></i>
            </div>
          </div>
        </div>
      </a>
      
    </div>

    <div class="row mt-4"> 
      <div class="col-12">
        <div class="d-flex align-items-center">
          <h4 class="mb-0">Siswa</h4>
          <div class="ms-3" style="border: 1px solid #af1f22; width: 100%"></div>
        </div>
        <p class="text-secondary">Rekapan Data Siswa</p>
      </div>

      <div class="col-12">
        <div class="card" style="background: #fff; border: 1px solid #eee; box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="data">
                <thead style="background: #af1f22; color: #fff">
                  <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>206765</td>
                    <td>X RPL 1</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection