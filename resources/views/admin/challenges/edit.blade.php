@extends('layouts.app')
@vite(['resources/js/challengeForm.js'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">New Challenge</div>
                    <div class="card-body">
                        <form method="POST" id="challengeForm"
                              action="{{ route('admin.challenge.update', $challenge) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Title</label>
                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ old('name') ?? $challenge->name }}" required>

                                    @error('name')
                                    <div class="alert  alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="checkbox" class="form-check-input" name="slugCheckbox"
                                           id="slugCheckbox">
                                    <label class="text-md-end" for="slugCheckbox">Laat slug hetzelfde zijn als de
                                        opdracht naam</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slug" class="col-md-4 col-form-label text-md-end">Slug</label>
                                <div class="col-md-6">
                                    <input id="slug"
                                           type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           name="slug"
                                           value="{{ old('slug') ?? $challenge->slug }}" required>

                                    @error('slug')
                                    <div class="alert  alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="goal" class="col-md-4 col-form-label text-md-end">Goal</label>
                                <div class="col-md-6">
                                    <input id="goal"
                                           type="text"
                                           class="form-control @error('goal') is-invalid @enderror"
                                           name="goal"
                                           value="{{ old('goal') ?? $challenge->goal }}" required>

                                    @error('goal')
                                    <div class="alert  alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Opdrachtbeschrijving</label>
                                <div class="col-md-6">
                                    <textarea required class="form-control"
                                              name="description"
                                              id="description"
                                              placeholder="Beschrijf de opdracht voor in het hoofdscherm"
                                              rows="3">{{ old('description') ?? $challenge->description }}</textarea>
                                    @error('description')
                                    <div class="alert  alert-danger">{{  $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="active" class="col-md-4 col-form-label text-md-end">Active</label>
                                <div class="col-md-6">
                                    <input type="radio" id="active" name="active" value="1"
                                           @if($challenge->active) checked @endif>
                                    <label for="active">Yes</label><br>
                                    <input type="radio" id="inactive" name="active" @if(!$challenge->active) checked
                                           @endif value="0">
                                    <label for="inactive">No</label><br>
                                    @error('active')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tips" class="col-md-4 text-md-end">Tips</label>
                                <div class="col-md-6">
                                    <a href="{{route('completed-challenge.show', $challenge)}}" class="btn btn-secondary">Pas tips aan</a>
                                    <ul>
                                    @foreach($challenge->tips as $tip)
                                        <li> {!! Str::markdown($tip->content) !!}
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




