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
                              action="{{ route('admin.challenge.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Title</label>
                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ old('name') }}" required>

                                    @error('title')
                                    <div class="alert  alert-danger">{{ $message }}</div>
                                    @enderror

                                    <input type="checkbox" class="form-check-input" name="test" id="slugCheckbox">
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
                                           value="{{ old('slug') }}" required>
                                    <small id="challengeHelp" class="form-text text-muted">Dit is de opdracht naam in de
                                        URL, gescheiden door '-'. Tevens ook de naam
                                        van de HTML file in de challenges/challenge map.</small>
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
                                           class="form-control @error('slug') is-invalid @enderror"
                                           name="goal"
                                           value="{{ old('goal') }}" required>

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
                                              rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="alert  alert-danger">{{  $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="active" class="col-md-4 col-form-label text-md-end">Active</label>
                                <div class="col-md-6">
                                    <input type="radio" id="active" name="active" value="1" checked>
                                    <label for="active">Yes</label><br>
                                    <input type="radio" id="inactive" name="active" value="0">
                                    <label for="inactive">No</label><br>
                                    @error('active')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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




