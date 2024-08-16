@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="card">
    <div class="card-body">
        <a href="{{route('categories.create')}}" class="btn btn-primary mb-3">Add Category</a>
        @if(count($categories))
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td class="d-flex border-0">
                            <a class="btn btn-info btn-sm mr-1" href="{{route("categories.edit", $category->id)}}"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{route("categories.destroy", $category->id)}}" method="post">
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
            <h3>Categories are empty</h3>
        @endif

        @if($categories->hasPages())
            <div class="p-0 pt-3">
                <div class="d-flex justify-content-end ">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
</div>
    
@stop