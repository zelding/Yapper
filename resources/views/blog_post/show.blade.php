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

                        <a class="pull-right">{{ __('Comments') }}: 0</a>

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
                        @endcan
                    </div>
                </section>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{__('Recent posts')}}</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
