@extends('layouts.plantilla')

@section('title', 'Registrarse')

@section('content')
    <h1>Registrarse</h1>
    <div class="box">
        <form action="{{ route('cafe.store') }}" method="POST" onsubmit="return validatePassword()">
            @csrf
            <label>
                Nombre:
                <br>
                <input type="text" name="name" required>
                <span class="error-message" style="color: red;"></span>
            </label>
            <br><br>
            <label>
                Número De Control:
                <br>
                <input type="text" name="numcontrol" required>
                <span class="error-message" style="color: red;"></span>
            </label>
            <br><br>
            <label>
                Contraseña:
                <br>
                <input type="password" name="password" id="password" required>
                <span class="error-message" style="color: red;"></span>
            </label>
            <br><br>
            <label>
                Confirmar contraseña:
                <br>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                <span id="password_error" class="error-message" style="color: red;"></span>
            </label>
            <br><br>
            <label>
                Grado:
                <br>
                <select name="grado" required>
                    <option value="" disabled selected>Seleccione un grado</option>
                    @for ($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <span class="error-message" style="color: red;"></span>
            </label>
            <br><br>
            <label>
                Grupo:
                <br>
                <select name="grupo" required>
                    <option value="" disabled selected>Seleccione un grupo</option>
                    @foreach (range('A', 'T') as $letra)
                        <option value="{{ $letra }}">{{ $letra }}</option>
                    @endforeach
                </select>
                <span class="error-message" style="color: red;"></span>
            </label>
            <br><br>
            <button class="btn" type="submit">Registrarse</button>
        </form>
        <p>¿Ya te registraste? <a href="{{ route('login.form') }}">Inicia sesión</a></p>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
            var errorSpan = document.getElementById("password_error");

            if (password != confirmPassword) {
                errorSpan.textContent = "Las contraseñas no coinciden";
                alert("Error al registrarse: las contraseñas no coinciden");
                return false;
            } else {
                errorSpan.textContent = "";
                return true;
            }
        }
    </script>
@endsection