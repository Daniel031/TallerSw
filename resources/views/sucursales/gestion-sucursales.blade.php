@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <h1>Sucursales De Centros</h1>
@stop

@section('content')
   <p class="text-center">Sucursales</p>
     
<section class="card bg-transparent">
    <div class="card-body p-0">
        <a href={{route("crear-sucursal")}} class="btn btn-sm bg-warning float-right">Crear Sucursal</a>
    </div>
   

</section>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Sucursal</th>
            <th>Centro</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sucursales as $sucursal)
        <tr>
            <td>{{$sucursal->name}}</td>
            <td>{{$sucursal->name_center}}</td>
            <td>
                <div class="ml-5"><span class="badge badge-{{$sucursal->state==true?'success':'danger'}}">{{$sucursal->state==true?'ACTIVO':'INACTIVO'}}</span></div>
            </td>
            
            <td>
                <a href={{route('edit-sucursal',$sucursal->id)}} class="btn btn-sm bg-primary">Editar</a>
                <a href="{{route('cambiarEstadoSucursal',$sucursal->id)}}" class="btn btn-sm bg-{{$sucursal->state==true?'danger':'success'}}" >{{$sucursal->state==true?'DESHABILITAR':'HABILITAR'}}</a>
            </td>
        </tr>
        @endforeach
       
    </tbody>
    <tfoot>
    </tfoot>
</table>
@stop

@section('css')

@stop

@section('js')
    
@stop
