
<section class="card mb-4">
    <img class="card-img-top" src="https://via.placeholder.com/750x150?text={{ urlencode($post->title) }}" alt="Card image cap">

    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{{ $post->summary }}</p>

        <a href="{{ route('post.show', ['post' => $post->_id]) }}" class="btn btn-primary">{{__('Read on')}} →</a>
    </div>

    <div class="card-footer text-muted">
        <time datetime="{{ $post->created_at->format('c') }}">{{ $post->created_at->format('F dS, Y') }}</time>
        by
        <a href="{{ route('post.user', ['user' => $post->author->id]) }}">{{ $post->author->display_name }}</a>

        @can('add_comment')
            <label for="comemnt">Add comment</label>
            <input id="comment" title="yapp back please" type="text" name="comment" />
        @endcan
    </div>
</section>
