@extends('layouts.app_sidebar')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back to home</a>
        </div>

        @role('admin')
            <div class="col-md-3 offset-6">
                <a href="{{ route('post.edit', ['post' => $post]) }}"
                   class="btn btn-outline-primary pull-right">Edit</a>
            </div>
        @endrole
    </div>

    @role('admin')

        <div class="row mt-3">

            <div class="col-md-4">
                <strong>Created: </strong> {{ $post->created_at->format('Y-m-d H:i:s') }}
            </div>

            @if($post->updated_at !== null)
                <div class="col-md-4">
                    <strong>Updated: </strong> {{ $post->updated_at->format('Y-m-d H:i:s') }}
                </div>
            @endif

            @if($post->deleted_at !== null)
                <div class="col-md-4">
                    <strong>Deleted: </strong> {{ $post->deleted_at->format('Y-m-d H:i:s') }}
                </div>
            @endif

        </div>

    @endrole

    <section class="card mt-3">
        <a href="{{ route('post.show', ['post' => $post->_id]) }}">
            <img class="card-img-top" src="https://via.placeholder.com/750x150?text={{ urlencode($post->title) }}" alt="Card image cap">
        </a>

        <div class="card-body">
            <h2 class="card-title {{ $post->deleted_at !== null ? 'bg-danger text-white' : ($post->status ? '' : 'bg-warning text-white') }}">{{ $post->title }}</h2>
            <article class="card-text">{{ $post->content }}</article>
        </div>

        <div class="card-footer text-muted">
            <time datetime="{{ $post->created_at->format('c') }}">{{ $post->created_at->format('F dS, Y') }}</time>
            by
            <a href="{{ route('post.user', ['user' => $post->author->id]) }}">{{ $post->author->display_name }}</a>

            <span class="pull-right">{{ __('Comments') }}: {{ $post->comments->count() }}</span>

            <ul class="list-group mt-3 mb-3">
                @forelse($post->comments as $comment)
                    <li class="list-group-item">
                        <strong class="pull-left">{{ $comment->user->display_name }}:</strong>
                        <span class="pull-right">{{$comment->content}}</span>
                    </li>
                @empty
                    <li class="list-group-item">No comments yet</li>
                @endforelse
            </ul>

            @can('add_comment')
                <form class="" method="POST" action="{{ route('login') }}" aria-label="{{ __('Comment') }}">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Add comment</label>

                        <textarea id="comment" title="yapp back please"
                                  class="form-control"
                                  type="text" name="comment"></textarea>
                    </div>
                </form>
            @else
                <p>Log in or Register to comment</p>
            @endcan
        </div>
    </section>

@endsection
