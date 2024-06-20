@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="formulario">
                <h2 class="mb-4 text-center">Crear Categoria</h2>
                <form action="{{ route('store-categoria') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{route('categorias')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
<style>
    /* Estilos para el formulario */
.formulario {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.label-foto {
    display: block;
    margin-bottom: 5px;
}

.preview-img {
    max-width: 100%;
    max-height: 200px;
    margin-top: 10px;
    display: none; /* Ocultar la imagen por defecto */
}

</style>
@stop

@section('js')
@stop
