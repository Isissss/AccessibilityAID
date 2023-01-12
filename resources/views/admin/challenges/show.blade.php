@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-10">
                <a href="{{route('admin.challenge.index')}}" class="btn btn-outline-primary mb-2">Ga terug</a>
                <div class="float-end">
                    <a href="{{route('admin.challenge.edit', $challenge)}}"
                        class="btn btn-primary mb-2">Aanpassen</a>
                    <form method="POST" class="d-inline"
                          action="{{route('admin.challenge.destroy', $challenge)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary mb-2" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header"><h1 class="m-0 p-0"> Challenge: {{$challenge->name}}</h1></div>
                    <div class="card-body">
                        <div class="fs-5 mb-2">
                            <span class="fw-bold">Name:</span> {{$challenge->name}}</div>
                        <div class="fs-5 mb-2">
                            <span class="fw-bold">Slug:</span> {{$challenge->slug}}</div>
                        <div class="fs-5 mb-2">
                            <span class="fw-bold">Goal:</span> {{$challenge->goal}}</div>
                        <div class="fs-5 mb-2">
                            <span class="fw-bold">Description:</span> {{$challenge->description}}</div>

                        <div class="fs-5 mb-2">
                            <span class="fw-bold">Tips:</span>  </div>

                            <div>

                                <ul>
                                    @foreach($challenge->tips as $tip)
                                        <li> {!! Str::markdown($tip->content) !!}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        <div class="fs-4 mt-4">
                            <span class="fw-bold">Aantal keer gedaan:</span> <span class="badge rounded-pill bg-success"> {{$completed_count}} </span> </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
