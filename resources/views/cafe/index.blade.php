@extends('layouts.plantilla')

@section('title', 'Cafe Virtual')

@section('content')
    <h1>Cafetería Virtual CBTIS</h1>
    <table>
        <tr>
            <td>
                <img src="{{ asset('images/image.png') }}" alt="Producto 1" class="img">
                <p>Burritos</p>
                <a href="{{ route('cafe.burritos') }}" class="btn">Comprar</a>
            </td>
            <td>
                <img src="{{ asset('images/pan.jpg') }}" alt="Producto 2" class="img">
                <p>Pan</p>
                <a href="{{ route('cafe.pan') }}" class="btn">Comprar</a>
            </td>
            <td>
                <img src="{{ asset('images/papitas.jpeg') }}" alt="Producto 3" class="img">
                <p>Papitas</p>
                <a href="{{ route('cafe.papitas') }}" class="btn">Comprar</a>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <img src="{{ asset('images/bebidas.jpg') }}" alt="Producto 4" class="img2">
                <p>Bebidas</p>
                <a href="{{ route('cafe.bebidas') }}" class="btn">Comprar</a>
            </td>
            <td>
                <img src="{{ asset('images/fruta.jpg') }}" alt="Producto 5" class="img2">
                <p>Productos Varios</p>
                <a href="{{ route('cafe.productos') }}" class="btn">Comprar</a>
            </td>
        </tr>
    </table>
@endsection