    @extends('layouts.app')
@vite('resources/js/challenge.js')
@section('content')

    <div class="col-md-8 m-auto mt-4">
        @if (Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Opdrachten
            </div>
            <div id="challengeContainer" class="d-flex row">
                <div id="ChallengeListLeft">
                    <ul class="list-group list-group-flush border-right" id="challengeList">
                        @foreach($challenges as $challenge)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h2>Opdracht {{$challenge->id}}</h2>
                                    <h3>{{$challenge->name}}</h3>
                                </div>
                                <button class="btn btn-primary" data-id="{{$challenge->id}}" id="info">
                                    <span class="material-symbols-outlined" data-id="{{$challenge->id}}" aria-label="informatie opdracht {{$challenge->slug}}">info</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        apiurl = "http://127.0.0.1:8000/api/challenge/"
        challengeRoute = 'http://127.0.0.1:8000/challenge/'
    </script>
@endsection
