@extends('layouts.app_sidebar')

@section('content')

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

@endsection
