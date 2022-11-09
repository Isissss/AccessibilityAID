@extends('layouts.app')

@section('content')
    <div class="col-md-6 m-auto mt-4">
        <div class="card">
            <div class="card-header">
                Opdrachten
            </div>
            @foreach($challenges as $challenge)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h2>Opdracht {{$challenge->id}}</h2>
                            <h3>{{$challenge->name}}</h3>
                        </div>
                        <a href="{{route('challenge.show', $challenge->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                 class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
