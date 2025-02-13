@extends('layouts.app')

@section('content')
    <h1>Agregar Nuevo Conductor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('conductores.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" class="form-control" required maxlength="9">
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="carnet_id">Carnet:</label>
            <select name="carnet_id" id="carnet_id" class="form-control" required>
                <option value="">Seleccione un carnet</option>
                @foreach ($carnets as $carnet)
                    <option value="{{ $carnet->id }}">{{ $carnet->tipo }} (Expira: {{ $carnet->fecha_vencimiento }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar</button>
        <a href="{{ route('conductores.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
@endsection

