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
                                <th>Name</th>
                                <th>Action</th>
                                <th>Descriptions</th>
                                <th>Activity Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $loop->iteration . '.' }}</td>
                                <td>{{ $activity->user->username }}</td>
                                <td>{{ $activity->user->name }} ({{ $activity->user->class->class_name }})</td>
                                <td>
                                    {{ $activity->action }}
                                </td>
                                <td>
                                    {{ $activity->activity_desc }}
                                </td>
                                <td>{{ $activity->created_at }}</td>
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