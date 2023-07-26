@extends('layouts.core')

@section('content-core')
<div class="row mt-4"> 
    <div class="col-12">
        <p class="text-secondary">Rekapan Data Presensi Siswa/Guru.</p>
    </div>
    
    <div class="col-12">
        <div class="card" style="background: #fff; border: 1px solid #eee; box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="data">
                        <thead style="background: #af1f22; color: #fff">
                            <tr>
                                <th>No.</th>
                                <th>NIS/NIP</th>
                                <th>Kelas</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>206765</td>
                                <td>X RPL 1</td>
                                <td>
                                    <button class="btn" style="background: #af1f22"><i class="fa fa-eye text-light"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection