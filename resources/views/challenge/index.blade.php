@extends('layouts.app')
@vite('resources/js/challenge.js')
@section('content')
    <div class="col-md-8 m-auto mt-4">
        <div class="card">
            <div class="card-header">
                Opdrachten
            </div>
            <div id="challengeContainer" class="d-flex row">
                <div class="col-md-4">
                    <ul class="list-group list-group-flush border-right" id="challengeList">
                        @foreach($challenges as $challenge)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h2>Opdracht {{$challenge->id}}</h2>
                                    <h3>{{$challenge->name}}</h3>
                                </div>
                                <button class="btn btn-primary" data-id="{{$challenge->id}}" id="info">
                                    <span class="material-symbols-outlined" data-id="{{$challenge->id}}">info</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        apiurl = "api/challenge/"
        challengeRoute = 'challenge/'
    </script>
@endsection
