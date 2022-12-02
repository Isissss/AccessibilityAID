@extends('layouts.app')

@section('content')
    <div class="col-md-8 m-auto mt-4">
        @if (Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Resultaten
            </div>
            <div class="d-flex row">
                <div>
                    <ul class="list-group list-group-flush">
                        @foreach($results as $result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h2>Opdracht {{$result->challenge_id}}</h2>
                                    <h3>{{$result->challenge->name}}</h3>
                                    <h3>{{substr($result->completed_at, 0, 10)}}</h3>
                                </div>
                                <a href="">
                                    <button class="btn btn-primary" data-id="{{$result->id}}" id="info">
                                        <span class="material-symbols-outlined" data-id="{{$result->id}}">info</span>
                                    </button>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
