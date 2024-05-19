@extends('adminlte::page')

@section('title', 'Crear Sucursal')

@section('content_header')
    <h1>Crear Sucursal</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="formulario">
                <h2 class="mb-4 text-center">Crear Sucursal</h2>
                <form action="{{ route('store-sucursal') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nombre">Nombre del Sucursal:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="latitude" name="latitude" hidden>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="longitude" name="longitude" hidden>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="centro">Centro:</label>
                        <select class="form-control" id="centro" name="centro" required>
                            <option value="">Selecciona un Centro Administrador</option>
                            @foreach($centros as $centro)
                                <option value="{{ $centro->id }}">{{ $centro->name }}</option>
                            @endforeach
                        </select>
                    </div>
                         {{-- AQUI VA EL MAPA PARA OBTENER LA UBICACION DE LA SUCURSAL --}}
                         <div id="map">
                        
                         </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Imagen de la Sucursal:</label>
                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" required onchange="previewImage(event, 'foto_preview')">
                            <img id="foto_preview" class="preview-img" src="#" alt="Preview Image">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('centros') }}" class="btn btn-danger">Cancelar</a>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <style>
        #map{ height: 400px;
        }
     </style>
@stop

@section('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"  
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
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
<script>

    var latitude , longitude ;
    var marker ;
    var loca = false;
    const inputLatitude = document.querySelector('#latitude');
    const inputLongitude = document.querySelector('#longitude');

        var map = L.map('map').setView([-17.7844316,-63.186772], 14);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        var popup = L.popup();

        function onMapClick(e) {

                if(!loca){
                    
                        let { lat, lng } = e.latlng;
                        latitude = lat;
                        longitude = lng;

                        marker = L.marker([latitude, longitude], {draggable: true}).addTo(map);
                        loca = true;
                        inputLatitude.value=latitude;
                        inputLongitude.value=longitude;
                        marker.on('dragend', function(event) {
                            var position = marker.getLatLng();
                            latitude = position.lat;
                            longitude=position.lng;
                            console.log("LATITUD : ", latitude);
                            console.log("LONGITUD : ", longitude);
                            inputLatitude.value=latitude;
                            inputLongitude.value=longitude;
                            //alert("Latitud: " + latitude + ", Longitud: " + longitude);
                        });
                }


               
            
        }
        map.on('click', onMapClick);
</script>
@stop
