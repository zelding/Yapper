<div class="card">
    <div class="card-header">{{__('Recent posts')}}</div>

    <div class="card-body">

        @role('admin')

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('post.create') }}" class="btn btn-outline-primary pull-right">Create new post</a>
                </div>
            </div>

        @endrole

        <ul class="list-group mt-3 mb-3">
            @forelse($data as $items)
                <li class="list-group-item">
                    {{ $items->first()->created_at->format('Y F') }}
                    <span class="badge badge-primary pull-right">{{ $items->count() }}</span>
                </li>
            @empty
                <li class="list-item-group">No posts yet :(</li>
            @endforelse
        </ul>
    </div>
</div>
