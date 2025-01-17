@extends('layouts.app')

@section('content')
    <h1>Lista de Cortos</h1>
    <div class="row">
        @foreach ($cortos as $corto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $corto['titulo'] }}</h5>
                        <p class="card-text">Director: {{ $corto['director'] }}</p>
                        <a href="{{ route('cortos.show', $corto['id']) }}" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
