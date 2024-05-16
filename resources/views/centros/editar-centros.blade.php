@extends('adminlte::page')

@section('title', 'Editar Centros y Hogares')

@section('content_header')
    <h1>Editar Centros - Hogares</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="formulario">
                <h2 class="mb-4 text-center">Editar Centro</h2>
                <form action="{{ route('actualizar-centro',$centro->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del Centro:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$centro->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{$centro->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$centro->address}}" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="foto1" class="foto-label">Foto 1:</label>
                            <input type="file" class="form-control-file" id="foto1" name="foto1" accept="image/*" required onchange="previewImage(event, 'foto1_preview')">
                            <img id="foto1_preview" class="preview-img" src="{{$resources[0]->url}}" alt="Preview Image" @required(true)>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="foto2" class="foto-label">Foto 2:</label>
                            <input type="file" class="form-control-file" id="foto2" name="foto2" accept="image/*" required onchange="previewImage(event, 'foto2_preview')">
                            <img id="foto2_preview" class="preview-img" src="{{$resources[1]->url}}"  alt="Preview Image" @required(true)>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('centros')}}" class="btn btn-danger mt-3">Cancelar</a>
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
