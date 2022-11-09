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
<form method="POST" action="{{url(route('completed-challenge.update', [$completedChallenge]))}}">
    @csrf
    <input type="hidden" name="rating" id="rating" value="">
    <button class="btn btn-primary">Sla op en ga naar de volgende uitdaging (dit is test)</button>
</form>
