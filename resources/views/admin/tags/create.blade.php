@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Create Tag</h1>
        </div>

        <form action="{{route('tags.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tag</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title">
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@stop