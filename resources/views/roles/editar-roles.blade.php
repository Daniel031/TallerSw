@extends('adminlte::page')

@section('title', 'Pagina Principal')

@section('content_header')
    <h1 class="text-center">Editar Rol</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="formulario">
                <h2 class="mb-4 text-center">Editar Rol</h2>
                <form action="{{route('actualizar-rol',$rol->id)}}" method="POST">
                    @Method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre Del Rol:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$rol->name}}" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    <div class="col-md-6">
                        @foreach($permisos as $permiso)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permisos[]" id="permiso_{{ $permiso->id }}" value="{{ $permiso->id }}" {{ $permiso->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="permiso_{{ $permiso->id }}">
                                {{ $permiso->name }}
                            </label>
                        </div>
                        @endforeach
        
                </div>

                    
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')

<style>
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
