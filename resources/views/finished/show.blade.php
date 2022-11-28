@extends('layouts.app')
@vite(['resources/js/votehandler.js'])

@section('content')

    <div class="container p-4 bg-white rounded card">
        <div class="d-flex align-items-center">
            <h3>
                <span class="material-symbols-outlined">schedule</span> {{$average}}
            </h3>
        </div>
        <div class="row">
            <div class="col overflow-auto">
                <div id="tips">
                    <h2>Tips
                        @if(Auth::user()->admin)
                        <a class="btn btn-primary" href="{{route('adminTips.create')}}">Create</a>
                        @endif
                    </h2>
                    <hr class="mt-2 mb-3"/>
                    <ul>
                        @foreach($challenge->tips as $tip)
                            <li> {!! Str::markdown($tip->content) !!}
                                @if(Auth::user()->admin)
                                    <form action="{{route('adminTips.destroy',$tip->id)}}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('adminTips.edit',$tip->id)}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col">
                <h2>Voorbeelden</h2>
                <hr class="mt-2 mb-3"/>
                <div class="row">
                    Voorbeeld van een toegankelijke website waar het contrast goed is:
                    <img class="ps-0" src="{{Vite::asset('resources/images/contrast_example.png')}}" alt="Voorbeeld van toegankelijke website">
                </div>
                <div class="row border border-danger">
                    << Hier komen voorbeeld 2 >>
                </div>
            </div>

        </div>
        <div class="align-content-center text-center py-4">
            <h3>Hoe denkt u dat uw webshop scoort op dit onderdeel?</h3>

            <div id="voting">
                <i class="far fa-star" data-vote="1"></i>
                <i class="far fa-star" data-vote="2"></i>
                <i class="far fa-star" data-vote="3"></i>
                <i class="far fa-star" data-vote="4"></i>
                <i class="far fa-star" data-vote="5"></i>
            </div>
            @error('rating')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            Uw score: <span id="count">{{$completedChallenge?->score}}</span>/5

            <a href="{{route('challenge.show', $challenge)}}">Terug</a>
            <form method="POST" action="{{route('completed-challenge.update', $completedChallenge)}}">
                @csrf
                <input type="hidden" name="rating" id="rating" value="">
                <button class="btn btn-primary">Sla op en ga naar de volgende uitdaging.</button>
            </form>
        </div>
        << Hier komt feedback >>
    </div>
@endsection



