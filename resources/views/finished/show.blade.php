@extends('layouts.app')

@section('content')

    <div class="container p-4 bg-white rounded card">
        <div class="row">
            <div class="col overflow-auto">
                <div id="tips">
                    <h2>Tips</h2>
                    <hr class="mt-2 mb-3"/>
                    <ul>
                    @foreach($challenge->tips as $tip)
                            <li> {!! Str::markdown($tip->content) !!} </li>
                    @endforeach

                    </ul>
                </div>
            </div>
            <div class="col">
                <h2>Voorbeelden</h2>
                <hr class="mt-2 mb-3"/>
                <div class="row border border-danger">
                    << Hier komen voorbeeld 1 >>
                </div>
                <div class="row border border-danger">
                    << Hier komen voorbeeld 2 >>
                </div>
            </div>

        </div>
        <div class="align-content-center text-center py-4">
            @php
                $completedChallenge = \App\Models\CompletedChallenge::find(2)

            @endphp

            @vite(['resources/js/votehandler.js'])
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
            <form method="POST" action="{{url('/finished', 2)}}">
                @csrf
                <input type="hidden" name="rating" id="rating" value="">
                <button class="btn btn-primary">Sla op en ga naar de volgende uitdaging (dit is test)</button>
            </form>
        </div>
     << Hier komt feedback >>
        </div>
@endsection



