@extends('layouts.app')

@section('content')

<div class="container">
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
                        <th scope="row">{{$cocktail->id}}</th>
                        <td>{{$cocktail->nome}}</td>
                        <td> {{ $cocktail->e_alcolico ? 'Alcolico' : 'Analcolico' }}</td>
                        <td> 
                            <a href="{{route('cocktails.show', ['cocktail'=>$cocktail->id])}}" class="btn btn-success"> Dettagli </a>
                        </td>
                    </tr>
                @endforeach
                
            
            
        </tbody>
        </table>
</div>
    
@endsection
