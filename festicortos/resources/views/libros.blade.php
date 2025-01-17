@extends('layouts.app')

@section('content')
    <h1>Lista de Libros</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro['titulo'] }}</td>
                    <td>{{ $libro['autor'] }}</td>
                    <td>{{ $libro['año'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
