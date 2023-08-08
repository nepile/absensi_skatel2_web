@extends('layouts.core')

@section('content-core')
<div class="row mt-4"> 
    <div class="col-12">
        <p class="text-secondary">Rekapan {{ $title }}.</p>
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
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>206765</td>
                                <td>Neville Jeremy Onorato Laia (XII RPL 1)</td>
                                <td>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores unde at voluptatum, odit dicta, quas eos minima officia, neque ipsam doloremque alias tempore cumque dolorum perspiciatis natus perferendis quod laboriosam?
                                </td>
                                <td>
                                    <button class="btn" style="background: #af1f22" data-bs-toggle="modal" data-bs-target="#detail"><i class="fa fa-eye text-light"></i></button>
                                    
                                    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background: #af1f22">
                                                    <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Detail Aktivitas</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    oke
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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