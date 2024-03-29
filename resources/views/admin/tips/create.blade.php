@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Tip</h2>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{session('status')}}
            </div>
        @endif
        <form action="{{route('adminTips.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content:</strong>
                        <input type="text" name="content" class="form-control" placeholder="Content">
                        @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <input type = "hidden" name ="challenge_id" class="form-control" placeholder="challenge id" value="{{$request->id}}">
                        @error('challenge_id')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>


@endsection
