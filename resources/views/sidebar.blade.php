<div class="col-md-4">

    <div class="card">
        <div class="card-header">{{__('Recent posts')}}</div>

        <div class="card-body">
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

            @role('admin')

                <p>asdasd</p>

            @endrole
        </div>
    </div>

</div>