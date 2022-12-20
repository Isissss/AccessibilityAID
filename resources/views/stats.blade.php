@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<div class="container">
    <h1 class="text-center display-3">Accessibility</h1>
    <div class="row">
        <div class="col-sm">
            <p class="blockquote">De reden waarom toegankelijkheid zo belangrijk is, is omdat er veel meer mensen zijn dan we denken die beperkingen hebben</p>
            <p class="blockquote">In de statistiek kan je zien dat er totaal 6.7 miljoen Nederlanders zijn die een beperking hebben.</p>
            <p class="blockquote">Dit is rond <strong>38%</strong> van de Nederlandse populatie</p>
            <p class="blockquote">Dit betekent, dat als je site niet toegankelijk is dan kan <strong>1/3 van jouw klanten</strong> je producten niet kan kopen.</p>
            <p class="blockquote">Dit veroorzaakt minder inkomsten en groei voor je webshop</p>
            <p class="blockquote">Maar met dit digitale handboek kan je de uitdaging aangaan en de tips gebruiken om <strong>jouw</strong> website te verbeteren.</p>
        </div>
        <div class="col-sm">
            <img src="https://media.discordapp.net/attachments/396548841786179585/1054486482489966592/output-onlinepngtools.png" alt="Responsive Image" class="img-thumbnail rounded">
        </div>
    </div>
    <a type="button" class="btn btn-primary float-end" href="{{route('challenge.index')}}">Digitale Handboek</a>
</div>
@endsection
