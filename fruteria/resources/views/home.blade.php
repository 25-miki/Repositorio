
<div class="container">
    <h1 class="mb-4">Bienvenido a la Frutería</h1>
    <p>Hola, {{ Auth::user()->name }}. ¡Gracias por visitar nuestra tienda!</p>

    <div class="row">
        <div class="col-md-6">
            <h3>Tu carrito</h3>
            <p><a href="{{ route('carrito.index') }}" class="btn btn-info">Ver carrito</a></p>
        </div>
        <div class="col-md-6">
            <h3>Ver frutas disponibles</h3>
            <p><a href="{{ route('frutas.index') }}" class="btn btn-info">Ver frutas</a></p>
        </div>
    </div>
</div>
