@extends('layouts.app')

@section('content')
    <h1>Agregar Nuevo Carnet</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('carnet.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tipo">Tipo de Carnet:</label>
            <input type="text" name="tipo" id="tipo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_expedicion">Fecha de Expedición:</label>
            <input type="date" name="fecha_expedicion" id="fecha_expedicion" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar</button>
        <a href="{{ route('carnet.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
@endsection

