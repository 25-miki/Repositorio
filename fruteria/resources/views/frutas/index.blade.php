@include('layouts.header')
<style>
    .banner{
        width: auto;
        height: 400px;
        margin: auto;
        background-image: url("css/15671.jpg");
        background-size: contain; 
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<body>
    @include('layouts.nav')
    <div class="banner">
    </div>
    <div class="container">
        <h1>Frutería</h1>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="estaciones">
            <a href="{{ route('fruta.index') }}" class="btn {{ !request('estacion') ? 'btn-active' : '' }}">Todas</a>
            <a href="{{ route('fruta.index', ['estacion' => 'verano']) }}" class="btn {{ request('estacion') == 'verano' ? 'btn-active' : '' }}">Verano</a>
            <a href="{{ route('fruta.index', ['estacion' => 'invierno']) }}" class="btn {{ request('estacion') == 'invierno' ? 'btn-active' : '' }}">Invierno</a>
            <a href="{{ route('fruta.index', ['estacion' => 'primavera']) }}" class="btn {{ request('estacion') == 'primavera' ? 'btn-active' : '' }}">Primavera</a>
            <a href="{{ route('fruta.index', ['estacion' => 'otoño']) }}" class="btn {{ request('estacion') == 'otoño' ? 'btn-active' : '' }}">Otoño</a>
        </div>


        <div class="frutas">
            @foreach ($frutas as $fruta)
                <div >
                    <div class="card">
                        <img src="{{ $fruta->foto }}" alt="{{ $fruta->nombre }}">
                        <h5>{{ $fruta->nombre }}</h5>
                        <p>{{ number_format($fruta->precio, 2) }}€/Kg</p>
                        <div class="botones">
                            <form action="{{ route('carrito.agregar') }}" method="POST" class="form">
                                @csrf
                                <input type="hidden" name="fruta_id" value="{{ $fruta->id }}">
                                <button type="submit" class="btn-carrito btn-success">+</button>
                            </form>

                            <form action="{{ route('carrito.quitar') }}" method="POST" class="form">
                                @csrf
                                <input type="hidden" name="fruta_id" value="{{ $fruta->id }}">
                                <button type="submit" class="btn-carrito btn-danger">-</button>
                            </form>
                            
                            @if (auth()->check() && auth()->user()->name === 'admin')
                                <a href="{{ route('frutas.edit', $fruta->id) }}" style="margin-left: 10px; text-decoration: none;">Editar</a>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if (auth()->check() && auth()->user()->name === 'admin')
            <a href="{{ route('frutas.create') }}" class="btn btn-primary" style="margin:20px 0px">Agregar Fruta</a>
        @endif


    </div>

</body>

@include('layouts.footer')
</html>
