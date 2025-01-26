@extends('adminlte::page')

@section('title', 'Estadísticas')

@section('content')
    <h1>Estadísticas de Ventas</h1>
    <canvas id="ventasChart" width="400" height="200"></canvas>
@endsection

@section('js')
    <script>
        var ctx = document.getElementById('ventasChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
                datasets: [{
                    label: 'Ventas',
                    data: [12, 19, 3, 5],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
