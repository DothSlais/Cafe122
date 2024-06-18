@extends('layouts.plantilla')

@section('title', 'Editar Nombramiento')

@section('content')
    <div class="edit-container">
        <h1 class="edit-title">Editar Nombramiento {{$nombramiento->quincena->quincena}}</h1>
        <form action="{{ route('nombramientos.update', $nombramiento) }}" method="post" class="nombramiento-form">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="estatus">Estatus:</label>
                <select id="estatus" name="estatus_id" required>
                    @foreach($estatuses as $estatus)
                        <option value="{{ $estatus->id }}" {{ $nombramiento->estatus->id == $estatus->id ? 'selected' : '' }}>
                            {{ $estatus->departamento }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection