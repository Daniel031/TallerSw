@extends('adminlte::page')

@section('title', 'Centros Hogares')

@section('content_header')
    <h1 class="text-center">Gestion de Centros - Hogares</h1>
@stop

@section('content')
    
<section class="card bg-transparent">
    <div class="card-body p-0 border-0">
        <a href={{route("crear-centro")}} class="btn btn-sm bg-warning float-right">Crear Centro-Hogar</a>
    </div>
   

</section>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
            @foreach($centros as $centro)
            <tr>

           
                <td>{{$centro->name}}</td>
                <td>{{$centro->address}}</td>
                <td>
                    <div class="ml-5"><span class="badge badge-{{$centro->state==true?'success':'danger'}}">{{$centro->state==true?'ACTIVO':'INACTIVO'}}</span></div>
                </td>
                <td>
                    <a href={{route('editar-centro',$centro->id)}} class="btn btn-sm bg-primary">Editar</a>
                    <a href="{{route('cambiarEstadoCentro',$centro->id)}}" class="btn btn-sm bg-{{$centro->state==true?'danger':'success'}}" >{{$centro->state==true?'DESHABILITAR':'HABILITAR'}}</a>
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
