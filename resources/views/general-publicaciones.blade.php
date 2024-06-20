<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publicaciones</title>
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

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Circular progress bar styles */
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border-left-color: #007bff;
            animation: spin 1s linear infinite;
            margin: auto;
            display: none; /* Initially hidden */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <section style="text-align: center" class="card bg-transparent">
        <h1>Listado de publicaciones</h1>
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
                            <div class="column">
                                <a href="{{ route('mostrar.publicacion',$publicacion->id) }}" class="btn btn-primary mt-3">Ver Publicacion</a>
                                <a href="#" class="btn btn-warning mt-3" onclick="openModal('{{ $publicacion->id }}')">Donar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="qrModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Enter Details</h2>
            <form id="qrForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required><br><br>

                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required><br><br>
                
                <button type="button" onclick="generateQR()">Generate QR Code</button>
            </form>
            <div class="spinner" id="spinner"></div>
        </div>
    </div>

    <div id="qrImageContainer">
        <img id="qrImage" src="" alt="QR Code">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>

    <script>
        var currentPublicationId;

        function openModal(publicationId) {
            currentPublicationId = publicationId;
            document.getElementById('qrModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('qrModal').style.display = 'none';
        }

        function generateQR() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var dob = document.getElementById('dob').value;
            var amount = document.getElementById('amount').value;

            // Show spinner
            document.getElementById('spinner').style.display = 'block';

            // Make AJAX request to generate QR code
            var xhr = new XMLHttpRequest();
            var url = 'https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2';
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    // Hide spinner
                    document.getElementById('spinner').style.display = 'none';

                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        var valuesArray = response.values.split(';');
                        var base64Image = valuesArray[1].trim();
                        var qrImage = document.getElementById('qrImage');
                        const transform = JSON.parse(base64Image)
                        console.log(response)
                        qrImage.src = 'data:image/png;base64,' + transform.qrImage;
                        qrImage.style.display = 'block';

                        // Close modal
                        closeModal();
                    } else {
                        console.error('Error en la solicitud: ' + xhr.status);
                        alert('Error en la solicitud: ' + xhr.status);
                    }
                }
            };

            var data = JSON.stringify({
                tcCommerceID: 'd029fa3a95e174a19934857f535eb9427d967218a36ea014b70ad704bc6c8d1c',
                tnMoneda: 2,
                tnTelefono: '67816051',
                tcNombreUsuario: name,
                tnCiNit: '9674845',
                tcNroPago: 'test-' + Math.floor(Math.random() * (999999 - 100000 + 1) + 100000),
                tnMontoClienteEmpresa: parseInt(amount),
                tcCorreo: email,
                tcUrlCallBack: 'http://localhost:8000/',
                tcUrlReturn: 'http://localhost:8000/',
                taPedidoDetalle: []
            });

            xhr.send(data);
        }

        new DataTable('#example');
    </script>
</body>
</html>
