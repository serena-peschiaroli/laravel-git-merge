@extends('layouts.app')

@section('content')

<div class="container bg-dark text-white">
    <h1 class="">Vieni a prendere una sbronza fotonica</h1>

    <form class="p-4" action="{{route('cocktails.store')}}" method="POST">

        @csrf
        <div class="mb-1">
            <label for="nome" class="form-label"><strong>Nome</strong></label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome')}}">
        </div>

        <div class="mb-1">
            <label for="descrizione" class="form-label"><strong>descrizione</strong></label>
            <textarea class="form-control" id="descrizione" rows="3" name="descrizione">{{ old('descrizione')}}</textarea>
        </div>

        <div class="mb-1">
            <label for="prezzo" class="form-label"><strong>prezzo</strong></label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" step="0.01" value="{{ old('prezzo')}}">
        </div>

        <div class="mb-1">
            <label for="colore" class="form-label"><strong>colore</strong></label>
            <input type="text" class="form-control" id="colore" name="colore" value="{{ old('colore')}}">
        </div>

        <div class="mb-1">
        <label for="e_alcolico" class="form-label"><strong>sei maggiorenne?</strong></label>
            <select class="form-select" name="e_alcolico">
                <option value="">Seleziona la tua preferenza</option>
                <option @selected(old('e_alcolico') === '1') value="1">alcolico</option>
                <option @selected(old('e_alcolico') === '0') value="0">analcolico</option>
            </select>
        </div>

        <button class="btn btn-danger" type="submit">Salva</button>
    </form>
</div>
    
@endsection