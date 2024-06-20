@extends('adminlte::page')

@section('title', 'Centros Hogares')

@section('content_header')
    <h1 class="text-center">Mis Publicaciones</h1>
@stop

@section('content')
    
<section class="card bg-transparent">

</section>

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($publicaciones as $publicacion)
            @php
                $donationDate = \Carbon\Carbon::parse($publicacion['finDate']);
                $isExpired = \Carbon\Carbon::now()->greaterThan($donationDate);
            @endphp
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="{{ $publicacion['imagen'] }}" class="card-img-top" alt="{{ $publicacion['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $publicacion['title'] }}</h5>
                        <p class="card-text text-center">{{ $publicacion['detail'] }}</p>
                        <span class="badge {{ $isExpired ? 'bg-danger' : 'bg-success' }}">
                            {{ $donationDate->format('Y-m-d') }}
                        </span>
                        <a href="{{ route('crear-donacion',$publicacion['id']) }}" class="btn btn-warning mt-3">Donar</a>
                        <a href="{{ route('detalles-donaciones',$publicacion['id']) }}" class="btn btn-primary mt-3">Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">
    <style>
        .card {
            height: 100%;
        }
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-title {
            font-size: 1.25rem;
        }
        .btn-donate {
            align-self: center;
        }

    </style>
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
