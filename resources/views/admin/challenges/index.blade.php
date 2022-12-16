@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                                <table class="table overflow-scroll table-striped">
                                    <thead>
                                    <tr class="align-content-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Slug</th>
                                        {{--            <th scope="col">Doel</th>--}}
                                        {{--            <th scope="col">Omschrijving</th>--}}
                                        <th scope="col">Actief</th>
                                        <th scope="col">Acties</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($challenges as $challenge)
                                        <tr class="align-middle">
                                            <th scope="row">{{$challenge->id}}</th>
                                            <td class="col-md-2"> {{$challenge->name}}</td>
                                            <td class="col-md-2">{{$challenge->slug}}</td>
{{--                                                            <td>{{$challenge->goal}}</td>--}}
{{--                                                            <td>{{$challenge->description}}</td>--}}
                                            <td>
                                                <div class="form-check form-switch fs-4"><input type="checkbox" role="switch" id="flexSwitchCheckDefault" class="active-btn form-check-input" data-id="{{($challenge->id)}}"
                                                                                           @if($challenge->active) checked @endif>
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="btn btn-success btn-sm">Info</a> <a href="#" class="btn btn-primary btn-sm">Aanpassen</a>
                                                <form method="POST" class="d-inline" action="{{route('admin.challenge.destroy', $challenge)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                </div>

                            </div>

            </div>
        </div>

@endsection
