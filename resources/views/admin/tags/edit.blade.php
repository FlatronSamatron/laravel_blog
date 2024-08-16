@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Edit Tag</h1>
@stop

@section('content')
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Edit Tag</h1>
        </div>

        <form action="{{route('tags.update', $tag->id)}}" method="post">
            @csrf
            @method('put')

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input value="{{$tag->title}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title">
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>

@stop