
@extends('layouts.plantilla')

@section('title', 'Papitas')

@section('content')
    <h1>Bolsas de papitas</h1>
    <div class="products">
        @foreach ($papitas as $bolsa)
            <div class="product">
                <div class="name">
                    <h3>{{ $bolsa->bolsa }}</h3>
                    <h3>${{ $bolsa->precio }}</h3>
                </div>
                <div class="buy">
                    <form action="{{ route('carrito.add', $bolsa->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_type" value="papita">
                        <button type="submit" class="btn">Comprar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
