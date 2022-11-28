
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center text-success">{{$review->challenge->name}}</h3>
                        <br/>
                        <h2>{{ $review->user->name }}</h2>
                        <p>
                            {{ $review->content }}
                        </p>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
