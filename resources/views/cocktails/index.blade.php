@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <a class="btn btn-primary mb-3" href="{{ route('cocktails.create') }}">aggiungi cocktail</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Alcolico</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cocktails as $cocktail)
                    <tr>
                        <th scope="row">{{ $cocktail->id }}</th>
                        <td>{{ $cocktail->nome }}</td>
                        <td> {{ $cocktail->e_alcolico ? 'Alcolico' : 'Analcolico' }}</td>
                        <td>
                            <a href="{{ route('cocktails.show', ['cocktail' => $cocktail->id]) }}" class="btn btn-success">
                                Dettagli </a>
                            <a href="{{ route('cocktails.edit', ['cocktail' => $cocktail->id]) }}"
                                class="btn btn-warning">Modifica</a>

                            <form action="{{ route('cocktails.destroy', ['cocktail' => $cocktail->id]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">Cancella</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
