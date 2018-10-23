@extends('layouts.app_sidebar')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back to home</a>
        </div>

        @if($user->id === Auth::user()->id )
            <div class="col-md-3 offset-6">
                <a href="{{ route('user.edit', ['user' => $user]) }}"
                   class="btn btn-outline-primary pull-right">Edit</a>
            </div>
        @endif
    </div>

    <section class="card mt-3">
        <form method="post" action="{{ route('user.update', ['user' => $user]) }}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <h2 class="card-title">{{$user->display_name }} profile</h2>
                <div class="card-text">

                    <div class="row">
                        <div class="col-md-12">
                            <strong>Name: </strong> {{ $user->name }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <strong>Display name: </strong> {{ $user->display_name }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <strong>Newsletter: </strong> {{ $user->notofy ? 'Yes' : 'No' }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <strong>Registered: </strong> {{ $user->created_at->format('Y-m-md H:i:s') }}
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </section>

@endsection
