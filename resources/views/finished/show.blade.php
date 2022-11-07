@extends('layouts.web')

@section('content')

    @include('partials.vote')

    <form method="POST" action="{{url('/finished', 2)}}">
        @csrf
        <input type="hidden" name="rating" id="rating" value="">
        <button>Sla op en ga naar de volgende uitdaging</button>
    </form>

    <a href="{{route('challenge.show', $challenge)}}">Terug</a>
@endsection



