@section('title', 'Login page')

@section('content')



@extends('adminlte::auth.login')

@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection
