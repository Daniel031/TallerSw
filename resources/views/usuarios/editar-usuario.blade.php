@extends('adminlte::page')

@section('title', 'Editar User')

@section('content_header')
    <h1>Editar User</h1>
    
@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="formulario">
                <h2 class="mb-4">Crear Usuario</h2>
                <form action="{{route('updat',$user->id)}}" method="POST">
                    @Method('PUT')
                    @csrf
                    <input type="text" class="form-control" id="id" name="id" required value="{{$user->id}}" hidden>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                    <a href="{{route('usuarios')}}" class="btn btn-sm bg-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
    

@stop

@section('css')

@stop

@section('js')
    
@stop
