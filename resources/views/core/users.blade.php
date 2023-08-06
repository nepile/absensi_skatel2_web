@extends('layouts.core')

@section('content-core')
<div class="row mt-4"> 
    <div class="col-12">
        <p class="text-secondary">Rekapan {{ $title }}.</p>
        <button class="btn mb-3 text-light" data-bs-toggle="modal" data-bs-target="#create" style="background: #af1f22"><i class="fa fa-add"></i> Tambah {{ $title }}</button>
        @if ($id_page == 4)
        <button class="btn mb-3 text-light" style="background: #af1f22"><i class="fa fa-graduation-cap"></i> Management Kelas</button>
        @endif
    </div>
    
    {{-- modal create --}}
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #af1f22">
                    <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Tambah {{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('createUser') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="level_id" value="@if($id_page == 4) 3 @else 2 @endif">
                        <div class="">
                            <label for="username">NIS/NIP*</label>
                            <input type="number" required min="0" class="form-control" placeholder="ex. 206625" name="username" id="username">
                        </div>
                        <div class="mt-3">
                            <label for="name">Nama Lengkap*</label>
                            <input type="text" required class="form-control" placeholder="ex. Neville Jeremy" name="name" id="name">
                        </div>
                        
                        
                        @if ($id_page == 4)
                        <div class="mt-3">
                            <label for="class_id">Kelas*</label>
                            <select name="class_id" required class="form-control" id="class_id">
                                <option value="">-Pilih Kelas-</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        
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
                                <th>No.</th>
                                <th>NIS/NIP</th>
                                <th>Nama</th>
                                @if ($id_page == 4)
                                <th>Kelas</th>
                                @endif
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr style="white-space: nowrap">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                @if ($id_page == 4)
                                <td>{{ $user->class->class_name }}</td>
                                @endif
                                <td>
                                    <button class="btn" style="background: #af1f22"><i class="fa fa-pencil text-light"></i></button>
                                    <button class="btn" style="background: #af1f22"><i class="fa fa-trash text-light"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection