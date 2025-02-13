@include('layouts.header')
@include('layouts.nav')

<style>
    .tabla {
        display: table;
        border-spacing: 25px;
        text-align: center;
        margin-bottom: 50px;

    }

    .tabla img {
        height: 100px;
    }
</style>


<div class="container" style="width: 50vw; margin-left: 25vw; margin-top: 50px">
    <h1 class="mb-4">Tu Carrito</h1>

    @if ($carrito->isEmpty())
        <p>No tienes frutas en tu carrito.</p>
    @else
        <table class="tabla">
            <thead>
                <tr>
                    <th> </th>
                    <th>Fruta</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrito as $item)
                    <tr>
                        <td><img src="{{ $item->fruta->foto }}" alt=""></td>
                        <td>{{ $item->fruta->nombre }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>${{ number_format($item->fruta->precio, 2) }}</td>
                        <td>${{ number_format($item->fruta->precio * $item->cantidad, 2) }}</td>
                        <td>
                            <form action="{{ route('carrito.agregar') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="fruta_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-success btn-sm">+</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('carrito.quitar') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="fruta_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-success btn-sm">-</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 900">Total:</td>
                    <td style="font-weight: 900">{{ number_format($carrito->sum(fn($item) => $item->fruta->precio * $item->cantidad), 2) }}</td>
                </tr>
            </tbody>
        </table>

    @endif
</div>
