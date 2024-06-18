
@extends('layouts.plantilla')

@section('title', 'Burritos')

@section('content')
    <h1>Burritos a $22</h1>
    <div class="products">
        @foreach ($burritos as $burrito)
            <div class="product">
                <div class="name">
                    <h3>{{ $burrito->burrito }}</h3>
                    <h3>${{ $burrito->precio }}</h3>
                </div>
                <div class="buy">
                    <form action="{{ route('carrito.add', $burrito->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_type" value="burrito">
                        <button type="submit" class="btn">Comprar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
