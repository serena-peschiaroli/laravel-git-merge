@extends('layouts.app')

@section('content')

<div class="container">
    @if (Session::has('message'))
            <div class="alert alert-success">
              {{ Session::get('message') }}
            </div>
    @endif
    <div class="card">
        <h5 class="card-title"><strong>Nome: </strong> {{ $cocktail->nome}}</h5>
        <h4 class="card-subtitle mb-2 text-muted"> <strong>Alcolico: </strong> {{ $cocktail->e_alcolico ?  'sì' : 'no'}} </h4>
        <div class="card-body">
            <p class="card-text"> <strong>Descrizione: </strong> {{ $cocktail->descrizione}}</p>
            <p class="card-text"> <strong>Colore: </strong> {{ $cocktail->colore}}</p>
            <p class="card-text"> <strong>Prezzo: </strong> {{ $cocktail->prezzo}}</p>
            @if ( count( $cocktail->ingredients) > 0)
                <p class="card-text"> <strong>Ingredienti: </strong></p>
                <ul> 
                    @foreach ($cocktail->ingredients as $ingredient)
                        <li>
                            {{ $ingredient->nome}} : {{ $ingredient->quantita_cl}} <span> cl ;</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <strong>Nessun ingrediente specificato </strong>
            @endif
        </div>
    </div>
    <a href="{{route('cocktails.index')}}" class="btn btn-primary mt-2">Indietro</a>
</div> 
@endsection