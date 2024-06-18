
@extends('layouts.plantilla')

@section('title', 'Bebidas')

@section('content')
    <h1>Bebidas refrescantes</h1>
    <div class="products">
        @foreach ($bebidas as $bebida)
            <div class="product">
                <div class="name">
                    <h3>{{ $bebida->soda }}</h3>
                    <h3>${{ $bebida->precio }}</h3>
                </div>
                <div class="buy">
                    <form action="{{ route('carrito.add', $bebida->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_type" value="bebida">
                        <button type="submit" class="btn">Comprar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
