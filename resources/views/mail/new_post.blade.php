<h2>Dear Yapper user!</h2>

<p>We just added a new blog post:</p>

<p>{{ $post->title }}</p>

<p>{{ $post->summary }}</p>

<p>If you are interested check it out <a target="_blank" href="{{ route('post.show', ['post' => $post]) }}">here</a></p>
