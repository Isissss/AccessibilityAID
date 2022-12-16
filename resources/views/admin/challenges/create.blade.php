@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">New Challenge</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.challenge.store') }}" enctype="multipart/form-data">
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
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Slug</label>
                                <div class="col-md-6">
                                    <input id="slug"
                                           type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           name="slug"
                                           value="{{ old('slug') }}" required>

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
                                    <textarea  required class="form-control"
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
{{--                            <div class="row mb-3">--}}
{{--                                <label for="category_id"--}}
{{--                                       class="col-md-4 col-form-label text-md-end">Server/Location</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <select required--}}
{{--                                            name="category_id"--}}
{{--                                            class="form-control @error('category_id') is-invalid @enderror"--}}
{{--                                            id="category_id">--}}
{{--                                        <option value="" selected hidden>Select a server</option>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option value="{{$category->id}}" @if (old('category_id') == $category->id) selected @endif>{{$category->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('category_id')--}}
{{--                                    <div class="alert  alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-3 form-group">--}}
{{--                                <label for="description" class="col-md-4 col-form-label text-md-end">Why are you--}}
{{--                                    suggesting this?</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <textarea  required class="form-control"--}}
{{--                                               name="description"--}}
{{--                                               id="description"--}}
{{--                                               rows="3">{{ old('description') }}</textarea>--}}
{{--                                    @error('description')--}}
{{--                                    <div class="alert  alert-danger">{{  $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




