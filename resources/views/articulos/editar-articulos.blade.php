@extends('adminlte::page')

@section('title', 'Centros - Hogares')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="formulario">
                <h2 class="mb-4 text-center">Crear Articulo</h2>
                <form action="{{ route('update-articulo',$articulo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nombre">Nombre del Articulo :</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $articulo->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $articulo->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Categoría:</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Seleccionar categoría</option>
                            @foreach($categorias as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tipo_articulo">Tipo Articulo:</label>
                        <select class="form-control" id="tipo_articulo" name="tipo_articulo" required>
                            <option value="">--- Seleccionar Tipo Articulo ---</option>
                            <option value="1">Producto</option>
                            <option value="2">Servicio</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Imagen del Articulo:</label>
                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" onchange="previewImage(event, 'foto_preview')">
                            <img id="foto_preview" class="preview-img" src="#" alt="Preview Image">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{route('articulos')}}" class="btn btn-danger">Cancelar</a>
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
<script>
    function previewImage(event, previewId) {
    var reader = new FileReader();
    reader.onload = function(){
        var preview = document.getElementById(previewId);
        preview.src = reader.result;
        preview.style.display = 'block'; // Mostrar la imagen después de cargarla
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@stop
