@extends('layouts.app')

@section('content')

    <div class="row justify-content-center g-2">
        @foreach($reviews as $review)
            <div class="col-sm-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$review->challenge->name}}</h5>
                        <p class="font-bold">User:
                        <span class="card-title">{{ $review->user->name }} </span>
                        <p class="card-text">Review:</p>
                        <p class="card-text">{{$review->content}}</p>

                        <form action="{{ route('reviews.destroy',$review->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('reviews.show',$review->id) }}">show</a>
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
