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

    <form action="{{ route('post.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea id="summary" class="form-control {{ $errors->has('summary') ? ' is-invalid' : '' }}" name="summary">{{ old('summary') }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" name="content">{{ old('content') }}</textarea>
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="1" name="status">
                Visible
            </label>
        </div>

        <div class="row">
            <div class="col-md-2 offset-10">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        </div>

    </form>
@endsection
