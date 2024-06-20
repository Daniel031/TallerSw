@extends('adminlte::page')

@section('title', 'Informacion de donaciones')

@section('content_header')
   
@stop

@section('content')
<h1>Gráfica de Donaciones Anuales</h1>
<canvas id="donacionesChart" width="1000" height="400"></canvas>

<h1>Gráfica de Donaciones Mensuales Ultimo año</h1>
<canvas id="donacionesMesChart" width="1000" height="400"></canvas>

<h1>Gráfica de Donaciones sobre modelo de prediccion semetral</h1>
<canvas id="donacionesPrediccion" width="1000" height="400"></canvas>

<div style="height: 50px;">

</div>

@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Función para obtener datos de la API
    async function fetchDonaciones() {
        const response = await fetch('{{ env('BUSSINESS_INTELLIGENCE')}}/api/donaciones');
        const data = await response.json();
        return data;
    }

    async function fetchAnios() {
        const response = await fetch('{{ env('BUSSINESS_INTELLIGENCE')}}/api/anos_disponibles');
        const data = await response.json();
        return data;
    }

    async function fetchDonacionesAnio(anio) {
        const response = await fetch(`{{ env('BUSSINESS_INTELLIGENCE')}}/api/donaciones/${anio}`)
        const data = await response.json();
        return data;
    }

    async function fetchDonacionesAnioPrediccion(anio) {
        const response = await fetch(`{{ env('BUSSINESS_INTELLIGENCE')}}/api/prediccion/${anio}`)
        const data = await response.json();
        return data;
    }

    // Función para procesar los datos y agruparlos por año
    function procesarDatos(datos) {
        const donacionesPorAno = {};
        var i = 0;
        datos.forEach(donacion => {
            const fecha = new Date(donacion.fecha);
            const ano = fecha.getFullYear();
            if (!donacionesPorAno[ano]) {
                donacionesPorAno[ano] = 0;
            }
            donacionesPorAno[ano] += donacion.cant_articulo;
        });

        const etiquetas = Object.keys(donacionesPorAno);
        const valores = Object.values(donacionesPorAno);

        return { etiquetas, valores };
    }

    function procesarDatosMes(datos) {
        const donacionesPorAno = {};
        var i = 0;
        const nombresMeses = [
          "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
          "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
         ];
        datos.forEach(donacion => {
            const fecha = new Date(donacion.fecha);
            const mes = fecha.getMonth();
            donacionesPorAno[nombresMeses[mes]] = donacion.cant_articulo;
        });

        const etiquetas = Object.keys(donacionesPorAno);
        const valores = Object.values(donacionesPorAno);

        return { etiquetas, valores };
    }

    // Función para crear la gráfica
    async function crearGrafica() {
        const datos = await fetchDonaciones();
        const { etiquetas, valores } = procesarDatos(datos);

        const ctx = document.getElementById('donacionesChart').getContext('2d');
        const myChart = new Chart(ctx, {
          type: 'line',
          data: { 
             labels: etiquetas,
             datasets: [{
             label: 'Donaciones por año',
             data: valores,
           }, ],
          },
          options: {
          plugins: {
            title: {
              display: true,
              text: 'Calculo de tiempo',
              font: {
                size: 16
              }
            },
          },
        backgroundColor: [
            'rgba(226,234,60, 0.3)',  // Bar 1
            'rgba(194,172,57, 0.3)',  // Bar 2
            'rgba(16,44,139, 0.3)',  // Bar 3
            'rgba(179,138,114, 0.3)',  // Bar 4
            'rgba(77,212,123, 0.3)', // Bar 5
            'rgba(156,167,20, 0.3)',  // Bar 6
            'rgba(166,2,136, 0.3)',  // Bar 7
            'rgba(70,123,116, 0.3)',  // Bar 8
            'rgba(54,185,183, 0.3)',  // Bar 9
            'rgba(154,251,39, 0.3)',  // Bar 10
            'rgba(155,12,8, 0.3)', // Bar 11
            'rgba(171,212,68, 0.3)'   // Bar 12
        ],
        borderWidth: 0.5,
        borderColor: 'black',
        mantainAspectRatio: false,
        responsive: false
        }
        });
    }

        // Función para crear la gráfica
    async function crearGraficaMes() {
        const datos = await fetchDonacionesAnio(2023);
        console.log(datos)
        const { etiquetas, valores } = procesarDatosMes(datos);

        const ctx = document.getElementById('donacionesMesChart').getContext('2d');
        const myChart = new Chart(ctx, {
          type: 'line',
          data: { 
             labels: etiquetas,
             datasets: [{
             label: 'Donaciones por mes',
             data: valores,
           }, ],
          },
          options: {
          plugins: {
            title: {
              display: true,
              text: 'Calculo de tiempo',
              font: {
                size: 16
              }
            },
          },
        backgroundColor: [
            'rgba(226,234,60, 0.3)',  // Bar 1
            'rgba(194,172,57, 0.3)',  // Bar 2
            'rgba(16,44,139, 0.3)',  // Bar 3
            'rgba(179,138,114, 0.3)',  // Bar 4
            'rgba(77,212,123, 0.3)', // Bar 5
            'rgba(156,167,20, 0.3)',  // Bar 6
            'rgba(166,2,136, 0.3)',  // Bar 7
            'rgba(70,123,116, 0.3)',  // Bar 8
            'rgba(54,185,183, 0.3)',  // Bar 9
            'rgba(154,251,39, 0.3)',  // Bar 10
            'rgba(155,12,8, 0.3)', // Bar 11
            'rgba(171,212,68, 0.3)'   // Bar 12
        ],
        borderWidth: 0.5,
        borderColor: 'black',
        mantainAspectRatio: false,
        responsive: false
        }
        });
    }

        // Función para crear la gráfica
        async function crearGraficaMesPrediccion() {
        const datos = await fetchDonacionesAnioPrediccion(2023);
        console.log(datos)
        const { etiquetas, valores } = procesarDatosMes(datos);

        const ctx = document.getElementById('donacionesPrediccion').getContext('2d');
        const myChart = new Chart(ctx, {
          type: 'line',
          data: { 
             labels: etiquetas,
             datasets: [{
             label: 'Donaciones por mes',
             data: valores,
           }, ],
          },
          options: {
          plugins: {
            title: {
              display: true,
              text: 'Calculo de tiempo',
              font: {
                size: 16
              }
            },
          },
        backgroundColor: [
            'rgba(226,234,60, 0.3)',  // Bar 1
            'rgba(194,172,57, 0.3)',  // Bar 2
            'rgba(16,44,139, 0.3)',  // Bar 3
            'rgba(179,138,114, 0.3)',  // Bar 4
            'rgba(77,212,123, 0.3)', // Bar 5
            'rgba(156,167,20, 0.3)',  // Bar 6
            'rgba(166,2,136, 0.3)',  // Bar 7
            'rgba(70,123,116, 0.3)',  // Bar 8
            'rgba(54,185,183, 0.3)',  // Bar 9
            'rgba(154,251,39, 0.3)',  // Bar 10
            'rgba(155,12,8, 0.3)', // Bar 11
            'rgba(171,212,68, 0.3)'   // Bar 12
        ],
        borderWidth: 0.5,
        borderColor: 'black',
        mantainAspectRatio: false,
        responsive: false
        }
        });
    }

    async function cargarSelector() {
        const datos = await fetchAnios();

    }
    

    function lanzarGraficas() {

        try {
            crearGrafica();
        } catch (error) {

        }

        try {
                crearGraficaMes();
            } catch (error) {

            }
            try {
                    crearGraficaMesPrediccion();
                } catch (error) {
                    
                }
    }

    // Llamar a la función para crear la gráfica al cargar la página
    window.onload = lanzarGraficas;
</script>
@stop

