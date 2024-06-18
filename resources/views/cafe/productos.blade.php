
@extends('layouts.plantilla')

@section('title', 'Productos')

@section('content')
    <h1>Variedad de antojitos</h1>
    <div class="products">
        @foreach ($productos as $producto)
            <div class="product">
                <div class="name">
                    <h3>{{ $producto->producto }}</h3>
                    <h3>${{ $producto->precio }}</h3>
                </div>
                <div class="buy">
                    <form action="{{ route('carrito.add', $producto->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_type" value="producto">
                        <button type="submit" class="btn">Comprar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
