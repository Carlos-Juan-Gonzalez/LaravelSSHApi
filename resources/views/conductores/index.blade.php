@extends('layouts.app')

@section('content')
    <h1>Lista de Conductores</h1>
    
    <a href="{{ route('conductores.create') }}" class="btn btn-primary">Agregar Conductor</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>ID Carnet</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conductores as $conductor)
                <tr>
                    <td>{{ $conductor->nombre }}</td>
                    <td>{{ $conductor->apellido }}</td>
                    <td>{{ $conductor->dni }}</td>
                    <td>{{ $conductor->telefono }}</td>
                    <td>{{ $conductor->carnet_id }}</td>
                    <td>{{ $conductor->created_at ? $conductor->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                    <td>{{ $conductor->updated_at ? $conductor->updated_at->format('d/m/Y H:i') : 'N/A' }}</td>
                    <td>
                        <form action="{{ route('conductores.destroy', $conductor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este conductor?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

