@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Edit Post</h1>
@stop

@section('content')
    <div>
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Edit Post</h1>
        </div>

        <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Post</label>
                    <input type="text" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Enter description" spellcheck="false">{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="3" placeholder="Enter content" spellcheck="false">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="custom-select @error('category') is-invalid @enderror">
                        @foreach($categories as $k => $v)
                            <option @selected($k === $post->category->id) value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select name="tags[]" multiple="" class="custom-select">
                        @foreach($tags as $k => $v)
                            <option @selected($post->tags->pluck('id')->contains($k)) value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Thumbnail</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="thumbnail" type="file" class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>
                <img src="{{$post->getImage()}}" alt="">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>

@stop