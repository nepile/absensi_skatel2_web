@extends('layouts.core')

@section('content-core')
<div class="row mt-4"> 
    <div class="col-12">
        <p class="text-secondary">Rekapan {{ $title }}.</p>
        <button class="btn mb-3 text-light" data-bs-toggle="modal" data-bs-target="#create" style="background: #af1f22"><i class="fa fa-add"></i> Tambah {{ $title }}</button>
        @if ($id_page == 4)
        <a href="{{ route('classManage') }}" class="btn mb-3 text-light" style="background: #af1f22"><i class="fa fa-graduation-cap"></i> Management Kelas</a>
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
                                <td>
                                    @if ($user->class)
                                    {{ $user->class->class_name }}
                                    @else
                                    {{ '-' }}
                                    @endif
                                </td>
                                
                                @endif
                                <td>
                                    {{-- Edit user --}}
                                    <button class="btn" style="background: #af1f22" data-bs-toggle="modal" data-bs-target="{{ '#updateUser'.$user->user_id }}"><i class="fa fa-pencil text-light"></i></button>
                                    <div class="modal fade" id="{{ 'updateUser'.$user->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background: #af1f22">
                                                    <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Edit {{ $title }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('updateUser', $user->user_id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div>
                                                            <label for="name">Nama Lengkap*</label>
                                                            <input type="text" required class="form-control" value="{{ $user->name }}" placeholder="ex. Neville Jeremy" name="name" id="name">
                                                        </div>       
                                                        
                                                        @if ($id_page == 4)
                                                        <div class="mt-3">
                                                            <label for="class_id">Kelas*</label>
                                                            <select name="class_id" required class="form-control" id="class_id">
                                                                @if ($user->class == true)
                                                                <option value="{{ $user->class_id }}">{{$user->class->class_name}}</option>
                                                                @endif
                                                                <option value="">-Pilih Kelas-</option>
                                                                @foreach ($classes as $class)
                                                                <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="modal-footer border-0">
                                                        <button type="submit" class="btn text-light" style="background: #af1f22">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Delete user --}}
                                    <button class="btn" style="background: #af1f22" type="button" data-bs-toggle="modal" data-bs-target="{{ '#delete'.$user->user_id }}"><i class="fa fa-trash text-light"></i></button>
                                    <div class="modal fade" id="{{ 'delete'.$user->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content text-light" style="background: #af1f22">
                                                <div class="modal-header border-0">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin untuk menghapus data?
                                                </div>
                                                <form action="{{ route('deleteUser', $user->user_id) }}" method="POST">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection