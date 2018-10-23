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


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               name="name" value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="display_name">Display name</label>
                        <input id="display_name" class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}"
                               name="display_name" value="{{ old('display_name', $user->display_name) }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                               name="email" value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"
                                   value="1" name="notify" {{ old('status', $user->notify) ? 'checked' : '' }}>
                            Newsletter
                        </label>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4 offset-8">
                        <button class="btn btn-primary pull-right">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
