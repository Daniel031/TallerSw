@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
   
@stop

@section('content')
    <p>Crear Usuarios</p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="formulario">
                    <h2 class="mb-4">Crear Usuario</h2>
                    <form action="{{route('almacenar')}}" method="POST">
                        @Method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
    /* Estilos adicionales */
    .formulario {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
</style>
@stop

@section('js')
    
@stop
