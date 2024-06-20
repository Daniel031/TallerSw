@extends('adminlte::page')

@section('title', 'Donaciones')

@section('content_header')
    
@stop

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Detalles de Donaciones</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Artículo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < count($nombres); $i++)
                                <tr>
                                    <td>{{ $nombres[$i] }}</td>
                                    <td>{{ $cantidades[$i] }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
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
