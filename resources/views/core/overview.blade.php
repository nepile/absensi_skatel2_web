@extends('layouts.core')

@section('content-core')
    oke

    <form action="{{ route('handleLogout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection