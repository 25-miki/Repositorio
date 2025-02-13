@include('layouts.header')

@include('layouts.nav')

<style>
    form * {
        margin: 5px 0px;
    }

    input {
        margin-left: 10px;
    }
</style>

<div class="container">
    <h1 class="mb-4">Editar Fruta</h1>
    <form action="{{ route('frutas.update', $fruta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $fruta->nombre }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="estacion">Estación</label>
            <input type="text" name="estacion" id="estacion" class="form-control" value="{{ $fruta->estacion }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ $fruta->precio }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="unidades">Unidades</label>
            <input type="number" name="unidades" id="unidades" class="form-control" value="{{ $fruta->unidades }}" required>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="unidades">Foto</label>
            <img src="{{ $fruta->foto }}" style="width: 300px" alt="">
            <input type="text" name="foto" id="foto" class="form-control" value="{{ $fruta->foto }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>

@include('layouts.footer')

