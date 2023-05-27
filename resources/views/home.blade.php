@extends('base')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Immo </h1>
            <p> <h1>Bienvenue sur nôtre agence immobilière</h1>
            </p>
        </div>
    </div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach($properties as $property)
            <div class="col">

               @include('property.card')

            </div>
            @endforeach
        </div>
    </div>



@endsection
