<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$center->name}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/images/background.jpg')
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">{{$center->name}}</h1>
                <p class="lead text-center">Descripción del lugar:</p>
                <p class="text-center">{{$center->description}}</p>
                <p class="text-center">{{$center->address}}</p>
            </div>
        </div>
        <h2>Imagenes del centro</h2>
        <div class="row mt-5">

            @foreach ($center->resources as $resource)
            <div class="col-md-6">
                <img height="360" width="360" src="{{$resource->url}}" class="img-fluid rounded" alt="Imagen 1">
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
