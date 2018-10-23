@extends('layouts.app_sidebar')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('post.show', ['post' => $post]) }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>

    {{-- somehow the route('post.update') generates invalid url, and I don't have time to find out why --}}
    <form action="/post/{{ $post->_id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title', $post->title) }}">
        </div>

        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea id="summary" class="form-control {{ $errors->has('summary') ? 'is-invalid' : '' }}" name="summary">{{ old('summary', $post->summary) }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"
                       value="1" name="status" {{ old('status', $post->status) ? 'checked' : '' }}>
                Visible
            </label>
        </div>

        <div class="row">
            <div class="col-md-2 offset-10">
                <button class="btn btn-primary pull-right">Update</button>
            </div>
        </div>

    </form>

    <hr>

    @if($post->deleted_at === null)
        <form action="{{ route('post.destroy', ['post' => $post]) }}" method="post">
            @csrf
            @method('DELETE')

            <div class="row">
                <div class="col-md-2 offset-10">
                    <button class="btn btn-danger pull-right">DELETE</button>
                </div>
            </div>
        </form>
    @else
        <form action="{{ route('post.undelete', ['post' => $post]) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-md-2 offset-10">
                    <button class="btn btn-warning pull-right">Restore</button>
                </div>
            </div>
        </form>
    @endif
@endsection
