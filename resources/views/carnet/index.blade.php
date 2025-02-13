@extends('layouts.app')

@section('content')
    <h1>Lista de Carnets</h1>
    
    <a href="{{ route('carnet.create') }}" class="btn btn-primary">Agregar Carnet</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Fecha de Expedición</th>
                <th>Fecha de Vencimiento</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carnets as $carnet)
                <tr>
                    <td>{{ $carnet->tipo }}</td>
                    <td>{{ $carnet->fecha_expedicion }}</td>
                    <td>{{ $carnet->fecha_vencimiento }}</td>
                    <td>
                        <form action="{{ route('carnet.destroy', $carnet->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este carnet?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

