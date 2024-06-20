@extends('adminlte::page')

@section('title', 'Centros Hogares')

@section('content_header')
    <h1 class="text-center">Mis Publicaciones</h1>
@stop

@section('content')
    
<section class="card bg-transparent">
    <div class="card-body p-0 border-0">
        <a href={{route("crear-publicacion")}} class="btn btn-sm bg-warning float-right">Crear Publicacion</a>
    </div>
   

</section>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Titulo</th>
           
            <th>Detalles</th>
            <th>Estado</th>
            <th>Fecha Finalizacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
            @foreach($publicaciones as $publicacion)
            <tr>

           
                <td>{{$publicacion->title}}</td>

                
                <td>{{$publicacion->detail}}</td>
                <td>
                    <div class="ml-5"><span class="badge badge-{{$publicacion->state==true?'success':'danger'}}">{{$publicacion->state==true?'ACTIVO':'INACTIVO'}}</span></div>
                </td>
                <td>
                    @php
                        $now = Carbon\Carbon::now();
                    @endphp
                    @if(Carbon\Carbon::parse($publicacion->finDate)->greaterThan($now))
                        <span class="badge badge-success">En Proceso</span>
                    @else
                        <span class="badge badge-danger">Finalizada</span>
                    @endif
                </td>
                <td>
                    <a href={{route('show-publicacion',$publicacion->id)}} class="btn btn-sm bg-secondary">Ver</a>
                    <a href={{route('edit-publicacion',$publicacion->id)}} class="btn btn-sm bg-primary">Editar</a>
                    <a href="{{route('cambiarEstadoPublicacion',$publicacion->id)}}" class="btn btn-sm bg-{{$publicacion->state==true?'danger':'success'}}" >{{$publicacion->state==true?'DESHABILITAR':'HABILITAR'}}</a>
                </td>
            </tr>
            @endforeach
    </tbody>
    <tfoot>
    </tfoot>
</table>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>

<script>
        new DataTable('#example');
</script>
@stop
