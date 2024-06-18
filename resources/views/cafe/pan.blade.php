
@extends('layouts.plantilla')

@section('title', 'Pan')

@section('content')
    <h1>Delicioso Pan De Dulce</h1>
    <div class="products">
        @foreach ($panes as $pan)
            <div class="product">
                <div class="name">
                    <h3>{{ $pan->pan }}</h3>
                    <h3>${{ $pan->precio }}</h3>
                </div>
                <div class="buy">
                    <form action="{{ route('carrito.add', $pan->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_type" value="pan">
                        <button type="submit" class="btn">Comprar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
