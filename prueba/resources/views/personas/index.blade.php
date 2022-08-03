@extends('tema.app')
@section('title', 'Listado de Personas')
@section('contenido')
    <h3>Listado de Personas</h3>
    <table class="table table-stripped table-hover">
        <thead>
            <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Apellidos
                </th>
                <th>
                    DNI
                </th>
                <th>
                    Dirección
                </th>
                <th>
                    Opciónes
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <td>
                        {{ $persona->nombres }}
                    </td>
                    <td>
                        {{ $persona->apellidos }}
                    </td>
                    <td>
                        {{ $persona->dni }}
                    </td>
                    <td>
                        {{ $persona->address }}
                    </td>
                    <td>
                        <a href="{{ route('persona.edit', $persona) }}" class="btn btn-danger">EDITAR</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
