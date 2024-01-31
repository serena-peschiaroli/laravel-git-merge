@extends('layouts.app')

@section('content')

<div class="container bg-dark text-white">
    <h1 class="">Vieni a prendere una sbronza fotonica</h1>

    <form class="p-4" action="{{route('cocktails.store')}}" method="POST">

        @csrf
        <div class="mb-1">
            <label for="nome" class="form-label"><strong>Nome</strong></label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome')}}">
            @error('nome')
            <div class="invalid-feedback"> {{$message}}</div>
            @enderror
        </div>
        <div class="mb-1">
            Seleziona gli ingredienti
            @foreach ($ingredients as $ingredient)
            <div class="form-check text-white">
                <input @checked(in_array($ingredient->id, old('ingredients', []))) type="checkbox" name="ingredients[]" id="ingredient-{{$ingredient->id}}" value="{{$ingredient->id}}" >
                <label for="ingredient-{{$ingredient->id}}">
                {{$ingredient->nome}}</label>

            </div>
                
            @endforeach
        </div>

        <div class="mb-1">
            <label for="descrizione" class="form-label"><strong>descrizione</strong></label>
            <textarea class="form-control" id="descrizione" rows="3" name="descrizione">{{ old('descrizione')}}</textarea>
        </div>

        <div class="mb-1">
            <label for="prezzo" class="form-label"><strong>prezzo</strong></label>
            <input type="number" class="form-control @error('prezzo') is-invalid @enderror" id="prezzo" name="prezzo" step="0.01" value="{{ old('prezzo')}}">
            @error('prezzo')
            <div class="invalid-feedback"> {{$message}}</div>
            @enderror
        </div>

        <div class="mb-1">
            <label for="colore" class="form-label"><strong>colore</strong></label>
            <input type="text" class="form-control @error('colore') is-invalid @enderror" id="colore" name="colore" value="{{ old('colore')}}">
            @error('colore')
            <div class="invalid-feedback"> {{$message}}</div>
            @enderror
        </div>

        <div class="mb-1">
        <label for="e_alcolico" class="form-label"><strong>sei maggiorenne?</strong></label>
            <select class="form-select @error('e_alcolico') is-invalid @enderror" name="e_alcolico">
                <option value="">Seleziona la tua preferenza</option>
                <option @selected(old('e_alcolico') === '1') value="1">alcolico</option>
                <option @selected(old('e_alcolico') === '0') value="0">analcolico</option>
                @error('e_alcolico')
                    <div class="invalid-feedback"> {{$message}}</div>
                @enderror
            </select>
        </div>

        <button class="btn btn-danger" type="submit">Salva</button>
    </form>
</div>
    
@endsection