@extends('layouts.web')

@section('content')

    <div class="container w-75 ">
        <div class="row">
            <div class="col border border-danger">
                <div>
                    << Hier komen de tips >>
                </div>
            </div>
            <div class="col">
                <div class="row border border-danger">
                    << Hier komen de Voorbeelden 1 >>
                </div>
                <div class="row border border-danger">
                    << Hier komen de Voorbeelden 2 >>
                </div>
            </div>

        </div>
        <div class="align-content-center text-center py-4">
            @include('partials.vote')

        </div>
     << Hier komt feedback >>
        </div>
@endsection



