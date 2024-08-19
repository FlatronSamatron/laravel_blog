@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="card">
    <div class="card-body">
        <a href="{{route('posts.create')}}" class="btn btn-primary mb-3">Add Post</a>
        @if(count($posts))
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->title}}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge bg-primary mr-2">{{$tag->title}}</span>
                            @endforeach
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td class="d-flex border-0">
                            <a class="btn btn-info btn-sm mr-1" href="{{route("posts.edit", $post->id)}}"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{route("posts.destroy", $post->id)}}" method="post">
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
            <h3>Posts are empty</h3>
        @endif

        @if($posts->hasPages())
            <div class="p-0 pt-3">
                <div class="d-flex justify-content-end ">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
</div>
    
@stop