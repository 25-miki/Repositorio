<html>
    <head>
        <title>Listado de libros</title>
    </head>
        <body>
            <h1>Listado de libros</h1>
            <ul>
            @forelse ($libros as $libro)
            <li>{{ $libro["titulo"] }} ({{ $libro["autor"] }})</li>
            @empty
            <li>No se encontraron libros</li>
            @endforelse
            </ul>
        </body>
</html>