@extends('layouts.web')

@section('content')
{{$challenge->name}}

    <a href="{{route('completed-challenge.show', $challenge)}}">Eindig challenge</a>
@endsection

