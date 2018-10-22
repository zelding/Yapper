@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">

                <div class="card-body">
                    <h2 class="card-title">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a href="#" class="btn btn-primary">Read More →</a>
                </div>

                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Start Bootstrap</a>
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
