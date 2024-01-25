@extends('layouts.app')

@section('content')
<h1 class="text-center mt-2 fs-1">Our Cocktails</h1>
    <div class="container ">

        <a href="{{ route('cocktails.index')}}" class="btn btn-primary">Clicca qui </a>
        
        <div class="row row-cols-4">
            @foreach ($cocktails as $cocktail)
            <div class="col d-flex align-items-stretch h-100 g-4">
                <div class="card border border-0" style="width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $cocktail->nome }}
                        </h2>
                        <h4 class="card-subtitle mb-2 text-muted">
                            {{ $cocktail->e_alcolico ? 'Alcolico' : 'Analcolico' }}
                        </h4>
                        <p class="card-text"> Colorazione: <span class="{{ $cocktail->colore }}">{{ $cocktail->colore }}</span></p>
                        <p class="card-text"> Descrizione: {{ $cocktail->descrizione }} </p>
                        <p class="card-text fw-bold fs-3"> {{ $cocktail->prezzo }}€ </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection