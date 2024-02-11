@extends("layout")

@php
    $pageName = "user";
    $userFullname = Session::get('userFullName');
@endphp

@section('content')
    <h1>
        welcome {{ session('userFullName') }}
    </h1>    
@endsection

