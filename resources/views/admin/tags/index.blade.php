@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Tags</h1>
@stop

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="card">
    <div class="card-body">
        <a href="{{route('tags.create')}}" class="btn btn-primary mb-3">Add Tag</a>
        @if(count($tags))
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->title}}</td>
                        <td>{{$tag->slug}}</td>
                        <td class="d-flex border-0">
                            <a class="btn btn-info btn-sm mr-1" href="{{route("tags.edit", $tag->id)}}"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{route("tags.destroy", $tag->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3>Tags are empty</h3>
        @endif

        @if($tags->hasPages())
            <div class="p-0 pt-3">
                <div class="d-flex justify-content-end ">
                    {{ $tags->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
</div>
    
@stop