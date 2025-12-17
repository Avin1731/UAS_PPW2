@extends('base')
@section('title','Beranda')
@section('menuberanda', 'underline decoration-4 underline-offset-7')

@section('content')
    <section class="p-4 bg-white rounded-lg">
        <h1 class="text-3xl font-bold text-[#C0392B] mb-6 text-center">Statistik</h1>
        <div class="mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 border border-gray-100 rounded-lg shadow-sm">
                    <div class="flex justify-center h-[300px]">
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
                
                <div class="p-4 border border-gray-100 rounded-lg shadow-sm">
                    <div class="flex justify-center h-[300px]">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('plugins/chartjs-4/chart-4.5.0.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>

    <script>
        if (typeof ChartDataLabels !== 'undefined') {
            Chart.register(ChartDataLabels);
        }

        // --- AMBIL DATA DARI CONTROLLER ---
        const totalMale = {{ $totalMale ?? 0 }};
        const totalFemale = {{ $totalFemale ?? 0 }};
        const jobLabels = @json($jobLabels ?? []);
        const jobTotals = @json($jobTotals ?? []);

        // --- CHART 1: PIE CHART GENDER ---
        const ctx1 = document.getElementById('chart1');
        if(ctx1) {
            new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ["Laki-laki", "Perempuan"],
                    datasets: [{
                        data: [totalMale, totalFemale],
                        backgroundColor: ['#3b82f6', '#ec4899'],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' },
                        title: {
                            display: true,
                            text: 'Persentase Gender',
                            font: { size: 16 }
                        },
                        datalabels: {
                            color: '#fff',
                            font: { weight: 'bold', size: 14 },
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => { sum += data; });
                                let percentage = (sum > 0) ? (value * 100 / sum).toFixed(1) + "%" : "0%";
                                return value + '\n(' + percentage + ')';
                            },
                            textAlign: 'center'
                        }
                    }
                }
            });
        }

        // --- CHART 2: BAR CHART TOP JOBS ---
        const ctx2 = document.getElementById('chart2');
        if(ctx2) {
            new Chart(ctx2.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: jobLabels,
                    datasets: [{
                        label: 'Jumlah Pegawai',
                        data: jobTotals,
                        backgroundColor: '#C0392B',
                        borderColor: '#922B21',
                        borderWidth: 1,
                        borderRadius: 4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Top 5 Pekerjaan',
                            font: { size: 16 }
                        },
                        legend: { display: false },
                        datalabels: {
                            anchor: 'end',
                            align: 'top',
                            color: '#C0392B',
                            font: { weight: 'bold', size: 12 },
                            formatter: Math.round
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { display: false },
                            ticks: { display: false }
                        },
                        x: {
                            grid: { display: false }
                        }
                    },
                    layout: {
                        padding: { top: 30 }
                    }
                }
            });
        }
    </script>
@endpush