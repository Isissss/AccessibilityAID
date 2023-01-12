@extends('layouts.app')
@vite(['resources/js/finishedChallenge.js'])

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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <h2 class="px-3">Tips</h2>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#noWordpress"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Geen Wordpress
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#wordpress"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Wordpress
                            </button>
                        </li>
                        @if(Auth::user()->admin)
                            <a class="btn btn-primary" href="{{route('adminTips.create', ['id' => $challenge->id])}}">Create</a>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="noWordpress" role="tabpanel" aria-labelledby="noWordpress-tab" tabindex="0">
                            <ul id="tipContainer">
                                @foreach($challenge->tips as $tip)
                                    @if(!$tip->wordpress)
                                        <li> {!! Str::markdown($tip->content) !!}
                                            @if(Auth::user()->admin)
                                                <form action="{{route('adminTips.destroy', $tip)}}" method="Post">
                                                    <a class="btn btn-primary" href="{{route('adminTips.edit', $tip)}}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        </li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane" id="wordpress" role="tabpanel" aria-labelledby="wordpress-tab" tabindex="0">
                            <ul id="tipContainer">
                                @foreach($challenge->tips as $tip)
                                    @if($tip->wordpress)
                                        <li> {!! Str::markdown($tip->content) !!}
                                            @if(Auth::user()->admin)
                                                <form action="{{route('adminTips.destroy', $tip)}}" method="Post">
                                                    <a class="btn btn-primary" href="{{route('adminTips.edit', $tip)}}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        </li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2>Voorbeelden</h2>
                <hr class="mt-2 mb-3"/>
                <div class="row">
                    Voorbeeld van een toegankelijke website waar het contrast goed is:
                    <img class="ps-0" src="{{Vite::asset('resources/images/contrast_example.png')}}"
                         alt="Voorbeeld van toegankelijke website">
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

        </div>
        <div class="row">
            <div class="col overflow-auto">
                <div id="tips">
                    <h2>Wat heeft u over dit onderdeel geleerd?</h2>
                    <hr class="mt-2 mb-3"/>
                    <form action="{{route('completed-challenge.update', $completedChallenge)}}" id="finishForm" method="post">
                        @method('PUT')
                        @CSRF
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="feedback_1" name="feedback_1">
                            <label class="form-check-label" for="feedback_1">
                                Feedback 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="feedback_2" name="feedback_2">
                            <label class="form-check-label" for="feedback_2">
                                Feedback 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="feedback_3" name="feedback_3">
                            <label class="form-check-label" for="feedback_3">
                                Feedback 3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="feedback_4" name="feedback_4">
                            <label class="form-check-label" for="feedback_4">
                                Feedback 4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="feedback_5" name="feedback_5">
                            <label class="form-check-label" for="feedback_5">
                                Feedback 5
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="feedback_6" name="feedback_6">
                            <label class="form-check-label" for="feedback_6">
                                Feedback 6
                            </label>
                        </div>
                        <input type="hidden" name="rating" id="rating" value="">
                    </form>
                </div>
            </div>
            <div class="col">
                <h2>Feedback voor ons</h2>
                <hr class="mt-2 mb-3"/>

            </div>

        </div>
        <button class="btn btn-primary" id="submitForm">Sla op en ga naar de volgende uitdaging.</button>
    </div>
    <script>
        apiurl = "/api/challenge/contrast/finished/"
    </script>
@endsection



