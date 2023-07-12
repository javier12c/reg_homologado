@extends('layouts.dashboard')
@section('aside')
    <livewire:mostrar-aside></livewire:mostrar-aside>
@endsection
@section('contenido')
    <main class="mt-0 md:flex md:flex-row  md:justify-center md:items-center">
        <h1 class=" font-bold text-3xl ">Registros creados por fecha</h1>
    </main>
    <canvas id="registros-chart"></canvas>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment"></script> <!-- Incluir Moment.js -->

        <script>
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
        </script>
    @endpush
@endsection
