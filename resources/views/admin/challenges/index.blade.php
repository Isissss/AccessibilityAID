@extends('layouts.app')
@vite(['resources/js/admin.js'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-10">
                <a href="{{route('admin.challenge.create')}}" class="btn btn-primary mb-2 float-end">Nieuwe opdracht
                    toevoegen</a>
                <table class="table overflow-scroll table-striped">
                    <thead>
                    <tr class="align-content-center">
                        <th scope="col">#</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actief</th>
                        <th scope="col">Acties</th>
                    </tr>
                    </thead>
                    <tbody id="challengeToggle">
                    @foreach($challenges as $challenge)
                        <tr class="align-middle">
                            <th scope="row">{{$challenge->id}}</th>
                            <td class=" align-items-center overflow-hidden">@if(!View::exists("challenge.challenges.$challenge->name"))
                                    <span class="material-symbols-outlined m-0 p-0 text-danger align-middle"
                                          title="Actie vereist, geen valide HTML file gelinkt!"> error </span> @endif
                                <span class="align-items-center align-middle">{{$challenge->name}} </span></td>
                            <td class="">{{$challenge->slug}} </td>
                            <td class="col-sm-1">
                                <div class="form-check form-switch fs-4"><input type="checkbox" role="switch"
                                                                                id="visibilityToggle"
                                                                                class="active-btn form-check-input"
                                                                                data-id="{{($challenge->id)}}"
                                                                                @if($challenge->active) checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                </div>
                            </td>
                            <td class="col-sm-3"><a href="{{route('admin.challenge.show', $challenge)}}"
                                                    class="btn btn-success btn-sm">Info</a> <a
                                    href="{{route('admin.challenge.edit', $challenge)}}"
                                    class="btn btn-primary btn-sm">Aanpassen</a>
                                <form method="POST" class="d-inline"
                                      action="{{route('admin.challenge.destroy', $challenge)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection
