@extends('layouts.app')

@section('content')

    <form action="{{ route('home.start') }}" >
        <button>Start</button>
    </form>

    <form action="{{ route('home.end') }}" >
        <button>End</button>
    </form>


{{$average}}

@endsection
