@extends('tema.app')
@section('title', 'Editar persona')
@section('contenido')
    <h3>Editar Persona</h3>
    <form action="{{ route('persona.store')}}" method="POST">
       <x-persona-form-body/>
    </form>
    @if ($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
