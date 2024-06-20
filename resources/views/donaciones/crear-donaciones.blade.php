@extends('adminlte::page')

@section('title', 'Donaciones')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="formulario">
                <h2 class="mb-4 text-center">Donaciones</h2>
                <form action="{{ route('store-donacion') }}" method="POST">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="donante">Donador:</label>
                        <select class="form-control" id="donante_id" name="donante_id">
                            <option value="" class="form-control">---Seleccione Donante---</option>
                            @foreach($donantes as $donante)
                                <option value="{{ $donante->id }}" class="form-control">{{ $donante->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label for="articulos">Artículos Requeridos:</label>
                        <select class="form-control" id="articulos" name="articulos">
                            <option value="" class="form-control">--Seleccione Articulos---</option>
                            @foreach($articulos as $articulo)
                                <option value="{{ $articulo->id }}" class="form-control">{{ $articulo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <table class="table mt-4" id="tabla-articulos">
                        <thead>
                            <tr>
                                <th>Artículo</th>
                                <th>Cantidad</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Las filas se agregarán aquí dinámicamente -->
                        </tbody>
                    </table>
            
                    <!-- Campo oculto para enviar los artículos seleccionados -->
                    <input type="hidden" name="articulos_seleccionados" id="articulos_seleccionados" value="">
                    <input type="text" value="{{ $id }}"  name="publicacion_id" id="publicacion__id" hidden>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Realizar Donación</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('donaciones') }}" class="btn btn-danger">Cancelar</a>
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
    $(document).ready(function() {
        $('#articulos').change(function() {
            var articuloId = $(this).val();
            var articuloTexto = $(this).find('option:selected').text();
            
            if (articuloId) {
                // Añadir fila a la tabla con campo de cantidad
                $('#tabla-articulos tbody').append(`
                    <tr data-id="${articuloId}">
                        <td>${articuloTexto}</td>
                        <td>
                            <input type="number" class="form-control cantidad-articulo" min="1" value="1" data-id="${articuloId}">
                        </td>
                        <td><button type="button" class="btn btn-danger btn-sm borrar-articulo">Eliminar</button></td>
                    </tr>
                `);
                // Actualizar el campo oculto
                actualizarCampoOculto();
            }
        });

        // Delegar evento click para eliminar un artículo de la tabla
        $('#tabla-articulos').on('click', '.borrar-articulo', function() {
            $(this).closest('tr').remove();
            actualizarCampoOculto();
        });

        // Delegar evento change para actualizar las cantidades
        $('#tabla-articulos').on('change', '.cantidad-articulo', function() {
            actualizarCampoOculto();
        });

        function actualizarCampoOculto() {
            var articulos = [];
            $('#tabla-articulos tbody tr').each(function() {
                var articuloId = $(this).data('id');
                var cantidad = $(this).find('.cantidad-articulo').val();
                articulos.push({ id: articuloId, cantidad: cantidad });
            });
            $('#articulos_seleccionados').val(JSON.stringify(articulos));
        }
    });
</script>
@stop
