@extends('adminlte::page')

@section('title', 'Gestion Usuarios')

@section('content_header')
    <h1>Gestion de Usuarios</h1>
@stop

@section('content')
   
<section class="card bg-transparent">
    <div class="card-body p-0">
        <a href={{route("crear")}} class="btn btn-sm bg-warning float-right">Crear Usuario</a>
    </div>
   

</section>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <div class="ml-5"><span class="badge badge-{{$user->state==true?'success':'danger'}}">{{$user->state==true?'ACTIVO':'INACTIVO'}}</span></div>
            </td>
            
            <td>
                <a href={{route('editar',$user->id)}} class="btn btn-sm bg-primary">Editar</a>
                <a href="{{route('actualizar',$user->id)}}" class="btn btn-sm bg-{{$user->state==true?'danger':'success'}}" >{{$user->state==true?'DESHABILITAR':'HABILITAR'}}</a>
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
