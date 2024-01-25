@extends('layouts.app')

@section('content')

<div class="container bg-dark text-white">
    <h1 class="">Modifica la bevanda</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="p-4" action="{{route('cocktails.update', ['cocktail' => $cocktail->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-1">
            <label for="nome" class="form-label"><strong>Nome</strong></label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $cocktail->nome)}}">
        </div>

        <div class="mb-1">
            <label for="descrizione" class="form-label"><strong>descrizione</strong></label>
            <textarea class="form-control" id="descrizione" rows="3" name="descrizione">{{ old('descrizione', $cocktail->descrizione)}}</textarea>
        </div>

        <div class="mb-1">
            <label for="prezzo" class="form-label"><strong>prezzo</strong></label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" step="0.01" value="{{ old('prezzo', $cocktail->prezzo)}}">
        </div>

        <div class="mb-1">
            <label for="colore" class="form-label"><strong>colore</strong></label>
            <input type="text" class="form-control" id="colore" name="colore" value="{{ old('colore', $cocktail->colore)}}">
        </div>

        <div class="mb-1">
        <label for="e_alcolico" class="form-label"><strong>sei maggiorenne?</strong></label>
            <select class="form-select" name="e_alcolico">
                <option @selected(old('e_alcolico', $cocktail->e_alcolico) === '1') value="1">alcolico</option>
                <option @selected(old('e_alcolico', $cocktail->e_alcolico) === '0') value="0">analcolico</option>
            </select>
        </div>

        <button class="btn btn-danger" type="submit">Salva</button>
    </form>
</div>
    
@endsection