@include('layouts.header')
@include('layouts.nav')

<style>
    form * {
        margin: 5px;
    }
</style>


<body>

    <div class="container" style="display: flex; flex-direction: column; width: 50vw">
        <h1>Agregar Nueva Fruta</h1>

        <form action="{{ route('frutas.store') }}" method="POST" enctype="multipart/form-data" style="display:flex; flex-direction: column">
            @csrf

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="estacion">Estación:</label>
            <input type="text" name="estacion" required>

            <label for="foto">Foto:</label>
            <input type="text" name="foto" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" step="0.01" required>

            <label for="unidades">Unidades disponibles:</label>
            <input type="number" name="unidades" required>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px; width: 150px">Guardar Fruta</button>
        </form>

    </div>

</body>

@include('layouts.footer')

</html>
