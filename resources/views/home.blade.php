@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @forelse($posts as $post)
                @include('blog_post.preview', ['post' => $post])
            @empty
                <div class="card">
                    <div class="card-header">{{__('No posts found')}}</div>
                    <div class="card-body">
                        <p>Sorry about that</p>
                    </div>
                </div>
            @endforelse
        </div>

        @include('sidebar', ['data' => $sidebar])
    </div>
</div>
@endsection
