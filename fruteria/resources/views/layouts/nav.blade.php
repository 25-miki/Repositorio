<style>
    .circulo {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: red;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 12px;
        font-weight: bold;
    }
</style>

<nav style="display: flex; justify-content: space-between; align-items: center; padding: 10px;">
    <div style="margin-left: 50px;">
        <a href="{{ url('/') }}">Inicio</a>
    </div>

    <div style="display: flex; gap: 10px; align-items: center;">
    <a href="{{ url('/carrito/') }}" style="position: relative; display: inline-block; margin: 0;">
        <img style="width: 40px;" src="{{ asset('css/grocery-store.png') }}" alt="Carrito">
        <div class="circulo">0</div>
</a>


        @auth
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn btn-danger"  style="border: 0px">Cerrar sesión</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
        @endauth
    </div>
</nav>
