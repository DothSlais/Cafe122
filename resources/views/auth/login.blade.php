@extends('layouts.plantilla')

@section('title', 'Iniciar Sesión')

@section('content')
    <h1>Iniciar Sesión</h1>
    <div class="box">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label>
                Número De Control:
                <br>
                <input type="text" name="numcontrol" required>
            </label>
            <br><br>
            <label>
                Contraseña:
                <br>
                <input type="password" name="password" required>
            </label>
            <br><br>
            <button class="btn" type="submit">Iniciar Sesión</button>
        </form>
        <p>¿Aún no tienes una cuenta? <a href="{{ route('cafe.create') }}">Regístrate</a></p>
    </div>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
