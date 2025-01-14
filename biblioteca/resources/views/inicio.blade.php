<html>
<head>
<title>Inicio</title>
</head>
<body>
<p>Bienvenido/a {{ $nombre }}</p>
<p><a href="{{ route('listado_libros') }}">Listado de libros</a></p>
<p>La hora actual es {{ time() }}</p>
</body>
</html>