@extends('layouts.app')

@section('content')
@if(\Illuminate\Support\Facades\Auth::user())
    <form action="{{ route('home.start') }}" >
        <button>Start</button>
    </form>

    <form action="{{ route('home.end') }}" >
        <button>End</button>
    </form>


    {{$average}}

@endif


@endsection
