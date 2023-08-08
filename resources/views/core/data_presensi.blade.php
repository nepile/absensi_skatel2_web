@extends('layouts.core')

@section('content-core')
<div class="row mt-4" style="row-gap: 15px"> 

    <div class="col-12">
        <a href="{{ route('categoryPresensi', $rekapan) }}" class="btn btn-secondary">Kembali</a>

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
                        @if ($rekapan == 'harian')
                            @foreach ($presensi_harian as $harian)
                                @if ($user == 'siswa')
                                    @if ($harian->user->level->level_name == $user)
                                        <tr>
                                            <td>{{ $loop->iteration . '.' }}</td>
                                            <td>{{ $harian->user->username }}</td>
                                            <td>{{ $harian->user->name }}</td>
                                            <td>{{ $harian->user->class->class_name }}</td>
                                            <td>{{ $harian->category }}</td>
                                            <td>{{ $harian->time }}</td>
                                            <td>{{ $harian->day . ' ' . $harian->month . ' ' . $harian->year }}</td>
                                        </tr>
                                    @endif
                                @elseif($user == 'guru')
                                    @if ($harian->user->level->level_name == $user)
                                        <tr>
                                            <td>{{ $loop->iteration . '.' }}</td>
                                            <td>{{ $harian->user->username }}</td>
                                            <td>{{ $harian->user->name }}</td>
                                            <td>{{ $harian->category }}</td>
                                            <td>{{ $harian->time }}</td>
                                            <td>{{ $harian->day . ' ' . $harian->month . ' ' . $harian->year }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach

                        @elseif($rekapan == 'bulanan')
                            @foreach ($presensi_bulanan as $bulanan)
                                @if ($user == 'siswa')
                                    @if ($bulanan->user->level->level_name == $user)
                                        <tr>
                                            <td>{{ $loop->iteration . '.' }}</td>
                                            <td>{{ $bulanan->user->username }}</td>
                                            <td>{{ $bulanan->user->name }}</td>
                                            <td>{{ $bulanan->user->class->class_name }}</td>
                                            <td>{{ $bulanan->category }}</td>
                                            <td>{{ $bulanan->time }}</td>
                                            <td>{{ $bulanan->day . ' ' . $bulanan->month . ' ' . $bulanan->year }}</td>
                                        </tr>
                                    @endif
                                @elseif($user == 'guru')
                                    @if ($bulanan->user->level->level_name == $user)
                                        <tr>
                                            <td>{{ $loop->iteration . '.' }}</td>
                                            <td>{{ $bulanan->user->username }}</td>
                                            <td>{{ $bulanan->user->name }}</td>
                                            <td>{{ $bulanan->category }}</td>
                                            <td>{{ $bulanan->time }}</td>
                                            <td>{{ $bulanan->day . ' ' . $bulanan->month . ' ' . $bulanan->year }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach


                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection