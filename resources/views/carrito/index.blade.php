@extends('layouts.plantilla')

@section('title', 'Carrito de Compras')

@section('content')
    <h1>Carrito de Compras</h1>
    @if($carritos->isEmpty())
        <p>No hay productos en el carrito.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carritos as $carrito)
                    <tr>
                        <td>
                            @if($carrito->productable instanceof App\Models\Burrito)
                                {{ $carrito->productable->burrito }}
                            @elseif($carrito->productable instanceof App\Models\Soda)
                                {{ $carrito->productable->soda }}
                            @elseif($carrito->productable instanceof App\Models\Pane)
                                {{ $carrito->productable->pan }}
                            @elseif($carrito->productable instanceof App\Models\Papita)
                                {{ $carrito->productable->bolsa }}
                            @elseif($carrito->productable instanceof App\Models\Producto)
                                {{ $carrito->productable->producto }}
                            @endif
                        </td>
                        <td>{{ $carrito->cantidad }}</td>
                        <td>${{ $carrito->productable->precio }}</td>
                        <td>
                            <form action="{{ route('carrito.remove', $carrito->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn" onclick="calcularTotal()">Mostrar Total</button>
        <p id="total"></p>
    @endif
@endsection

@section('scripts')
<script>
    function calcularTotal() {
        let total = 0;
        @foreach($carritos as $carrito)
            total += {{ $carrito->cantidad }} * {{ $carrito->productable->precio }};
        @endforeach
        document.getElementById('total').innerText = 'Total: $' + total.toFixed(2);
    }
</script>
@endsection
