@extends('pages.layout.index')

@section('content')
    <div class="mx-auto w-full max-w-6xl mt-10">
        <div class="bg-gray-50 border border-gray-100 sm:rounded-lg overflow-hidden p-4">
            <h1 class="text-3xl font-bold text-black">Dashboard</h1>
            <p class="text-gray-060 text-sm mt-2">
                Track and manage disease records efficiently.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-6">
            @for ($i = 0; $i < 4; $i++)
                <div
                    class="bg-gray-50 border border-gray-100 p-4 rounded-lg flex items-center justify-center w-full h-80 relative">
                    <!-- Skeleton Loader -->
                    <div role="status"
                        class="absolute inset-0 flex flex-col items-center justify-center p-4 border border-gray-200 rounded-sm shadow-sm animate-pulse dark:border-gray-700 bg-white">
                        <div class="flex items-baseline space-x-6">
                            <div class="w-10 bg-gray-200 rounded-t-lg h-50 dark:bg-gray-700"></div>
                            <div class="w-10 bg-gray-200 rounded-t-lg h-50 dark:bg-gray-700"></div>
                            <div class="w-10 h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                            <div class="w-10 bg-gray-200 rounded-t-lg h-40 dark:bg-gray-700"></div>
                            <div class="w-10 bg-gray-200 rounded-t-lg h-30 dark:bg-gray-700"></div>
                            <div class="w-10 bg-gray-200 rounded-t-lg h-20 dark:bg-gray-700"></div>
                        </div>
                    </div>
                    <!-- Chart Components -->
                    <canvas id="chart-{{ $i }}" class="hidden"></canvas>
                </div>
            @endfor
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/dashboard', {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    let chartConfigs = [{
                            type: 'pie',
                            data: {
                                labels: Object.keys(data.pieAge),
                                datasets: [{
                                    label: 'Age Group',
                                    data: Object.values(data.pieAge),
                                    backgroundColor: ['#0088FE', '#00C49F', '#FFBB28', '#FF8042']
                                }]
                            },
                            title: 'User Age Distribution'
                        },
                        {
                            type: 'pie',
                            data: {
                                labels: Object.keys(data.pieDisease),
                                datasets: [{
                                    label: 'Disease',
                                    data: Object.values(data.pieDisease),
                                    backgroundColor: ['#FF5733', '#33FF57', '#5733FF', '#F39C12']
                                }]
                            },
                            title: 'Disease Distribution'
                        },
                        /*{
                            type: 'line',
                            data: {
                                labels: ['Disease'],
                                datasets: [{
                                    label: 'Disease Trend',
                                    data: [data.lineDiseaseTrend],
                                    borderColor: '#FFBB28',
                                    backgroundColor: 'rgba(255, 187, 40, 0.2)',
                                    fill: true
                                }]
                            },
                            title: 'Disease Trends Over Time'
                        },*/
                        {
                            type: 'bar',
                            data: {
                                labels: ['Total Users'],
                                datasets: [{
                                    label: 'User Count',
                                    data: [data.barUserCount],
                                    backgroundColor: '#00C49F'
                                }]
                            },
                            title: 'Total User Count'
                        }
                    ];

                    chartConfigs.forEach((config, i) => {
                        let ctx = document.getElementById(`chart-${i}`);
                        ctx.classList.remove('hidden'); // Show chart
                        ctx.previousElementSibling.remove(); // Remove skeleton loader
                        new Chart(ctx.getContext('2d'), {
                            type: config.type,
                            data: config.data,
                            options: {
                                plugins: {
                                    title: {
                                        display: true,
                                        text: config.title,
                                        font: {
                                            size: 16
                                        }
                                    }
                                }
                            }
                        });
                    });
                })
                .catch(error => console.error('Error fetching chart data:', error));
        });
    </script>
@endsection
