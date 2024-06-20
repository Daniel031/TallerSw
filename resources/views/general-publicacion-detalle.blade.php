<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publicacion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">
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
</head>
<body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="formulario">
                <h2 class="mb-4 text-center">Publicacion {{ $publicacion->title }}</h2>
                    
                    <div class="form-group">
                        <label for="title">Titulo:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $publicacion->title }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Detalles:</label>
                        <input type="text" class="form-control" id="detail" name="detail" value ="{{ $publicacion->detail }}" readonly>
                    </div>
                   
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contribucion">Contribucion Economica</label>
                                <input type="number" class="form-control" id="contribucion" name="contribucion" value="{{ $publicacion->economic_contribution }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="initDate">Fecha de Inicio:</label>
                                <input type="date" class="form-control" id="initDate" name="initDate" value="{{ \Carbon\Carbon::parse($publicacion->initDate)->format('Y-m-d')}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="finDate">Fecha de Fin:</label>
                                <input type="date" class="form-control" id="finDate" name="finDate"  value="{{ \Carbon\Carbon::parse($publicacion->finDate)->format('Y-m-d')}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="articulos">Artículos:</label>
                        <select class="form-control" id="articulos" name="articulos[]" multiple >
                            @foreach($articulos as $articulo)
                                <option value="{{ $articulo->id }}" class="form-control">{{ $articulo->nombre }}</option>
                               
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <img id="foto2_preview" class="preview-img" src="#" alt="Preview Image" src="{{ $publicacion->imagen }}" @required(true)>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{url('vista-publicaciones')}}" class="btn btn-danger">Volver</a>
                    </div>
            </div>
        </div>
    </div>
</div>
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
</body>
</html>
