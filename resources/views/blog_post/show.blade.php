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

                <section class="card">
                    <a href="{{ route('post.show', ['post' => $post->_id]) }}">
                        <img class="card-img-top" src="https://via.placeholder.com/750x150?text={{ urlencode($post->title) }}" alt="Card image cap">
                    </a>

                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
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
                            <form class="" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
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
            </div>

            @include('sidebar')
        </div>
    </div>
@endsection
