@extends('tema.app')
@section('title', 'Listado de Personas')
@section('contenido')
    <h3>Listado de Personas</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Dirección</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody id="personas-list">

        </tbody>
    </table>
    </table>
@endsection
