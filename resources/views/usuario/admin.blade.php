@extends('layouts.dashboard')
@section('aside')
    <livewire:mostrar-aside></livewire:mostrar-aside>
@endsection
@section('contenido')
    <main class="mt-0 md:flex md:flex-row  md:justify-center md:items-center">
    </main>
    <div class="container mx-auto py-4">
        <div class="grid grid-cols-2">
            <div class="chart-container">
                <h1 class=" font-bold text-1xl ">Cuantos registros pertenecen por expediente</h1>
                <canvas id="grafica-pastel" class="chart-pastel"></canvas>
            </div>
            <div class="chart-container ">
                <canvas class="" id="registros-chart"></canvas>
            </div>
        </div>
    </div>
    <canvas class=" mt-10" id="usuarios-chart"></canvas>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment"></script> <!-- Incluir Moment.js -->

        <script>
            // Codigo de la grafica registros existen
            var fechas = @json($fechas);
            var cantidades = @json($cantidades);
            // Formatear las fechas utilizando Moment.js
            var fechasFormateadas = fechas.map(function(fecha) {
                return moment(fecha).format('D MMM, YYYY');
            });
            var colores = [];
            for (var i = 0; i < cantidades.length; i++) {
                var color = 'rgba(' + Math.floor(Math.random() * 255) + ', ' + Math.floor(Math.random() * 255) + ', ' + Math
                    .floor(Math.random() * 255) + ', 0.2)';
                colores.push(color);
            }
            var ctx = document.getElementById('registros-chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: fechasFormateadas,
                    datasets: [{
                        label: 'Registros creados por fecha',
                        data: cantidades,
                        backgroundColor: colores, // Utilizar los colores generados
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
            //Codigo de registros por usuario

            document.addEventListener('DOMContentLoaded', function() {
                var usuariosRegistros = @json($usuariosRegistros);

                var nombres = usuariosRegistros.map(function(usuario) {
                    return usuario.name;
                });

                var cantidades = usuariosRegistros.map(function(usuario) {
                    return usuario.total;
                });

                var ctx = document.getElementById('usuarios-chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nombres,
                        datasets: [{
                            label: 'Cantidad de Registros por Usuario',
                            data: cantidades,
                            backgroundColor: colores, // Utilizar los colores generados
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }
                    }
                });
            });
            //Pastel
            const labels = @json($labels);
            const values = @json($values);
            new Chart(document.getElementById('grafica-pastel'), {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(182, 205, 92)',
                            "rgb(255, 0, 0)",
                            "rgb(0, 255, 0)",
                            "rgb(0, 0, 255)",
                            "rgb(255, 255, 0)",
                            "rgb(0, 255, 255)",
                            "rgb(255, 0, 255)",
                            "rgb(255, 255, 255)",
                            "rgb(0, 0, 0)",
                            "rgb(128, 128, 128)",

                            // Agrega más colores aquí si tienes más expedientes
                        ]
                    }]
                },
                options: {
                    responsive: true,
                }
            });
        </script>
    @endpush
@endsection
