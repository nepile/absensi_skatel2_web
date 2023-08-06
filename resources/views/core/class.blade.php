@extends('layouts.core')

@section('content-core')
<div class="row mt-4"> 
    <div class="col-12">
        <p class="text-secondary">Rekapan {{ $title }}.</p>
        <a class="btn btn-secondary mb-3" href="{{ route('siswa') }}">Kembali</a>
        <button class="btn mb-3 text-light" data-bs-toggle="modal" data-bs-target="#create" style="background: #af1f22"><i class="fa fa-add"></i> Tambah {{ $title }}</button>
    </div>
    
        {{-- modal create --}}
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background: #af1f22">
                        <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Tambah {{ $title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('createClass') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div>
                                <label for="class_name">Nama Kelas*</label>
                                <input type="text" required class="form-control" placeholder="ex. XI RPL 1" name="class_name" id="class_name">
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn text-light" style="background: #af1f22">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    
    <div class="col-12">
        <div class="card" style="background: #fff; border: 1px solid #eee; box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="data">
                        <thead style="background: #af1f22; color: #fff">
                            <tr style="white-space: nowrap">
                                <th>ID Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $class->class_name }}</td>
                                    <td>
                                        {{-- Edit user --}}
                                        <button class="btn" style="background: #af1f22" data-bs-toggle="modal" data-bs-target="{{ '#updateClass'.$class->class_id }}"><i class="fa fa-pencil text-light"></i></button>
                                        <div class="modal fade" id="{{ 'updateClass'.$class->class_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #af1f22">
                                                        <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Edit {{ $title }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('updateClass', $class->class_id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div>
                                                                <label for="name">Nama Kelas*</label>
                                                                <input type="text" required class="form-control" value="{{ $class->class_name }}" placeholder="ex. XII RPL 1" name="class_name" id="class_name">
                                                            </div>
                                                        </div>
    
                                                        <div class="modal-footer border-0">
                                                            <button type="submit" class="btn text-light" style="background: #af1f22">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- Delete user --}}
                                        <button class="btn" style="background: #af1f22" type="button" data-bs-toggle="modal" data-bs-target="{{ '#delete'.$class->class_id }}"><i class="fa fa-trash text-light"></i></button>
                                        <div class="modal fade" id="{{ 'delete'.$class->class_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content text-light" style="background: #af1f22">
                                                    <div class="modal-header border-0">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kelas</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin untuk menghapus data?
                                                    </div>
                                                    <form action="{{ route('deleteClass', $class->class_id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-footer border-0">
                                                            <button type="submit" class="btn btn-light">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- this data --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection