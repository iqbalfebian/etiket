<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem Absensi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
</head>
<body class="admin-body">
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('admin.dashboard') }}" class="navbar-brand">Admin Dashboard</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('admin.departemen') }}">Departemen</a></li>
                <li><a href="{{ route('admin.plant') }}">Plant</a></li>
                <li><a href="{{ route('admin.karyawan') }}">Karyawan</a></li>
                <li><a href="{{ route('admin.pengguna') }}">Pengguna</a></li>
                <li><a href="{{ route('admin.absen') }}">Absen</a></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-admin">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="stats-grid">
            <div class="stat-card">
                <h3>{{ $stats['departemen'] }}</h3>
                <p>Departemen</p>
            </div>
            <div class="stat-card">
                <h3>{{ $stats['plant'] }}</h3>
                <p>Plant</p>
            </div>
            <div class="stat-card">
                <h3>{{ $stats['karyawan'] }}</h3>
                <p>Karyawan</p>
            </div>
            <div class="stat-card">
                <h3>{{ $stats['absen_hari_ini'] }}</h3>
                <p>Absen Hari Ini</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:space-between; align-items:center; gap:12px;">
                <h2 style="margin:0;">Absen Hari Ini</h2>
                <div class="chart-controls">
                    <label for="chartType" style="font-size:13px; color:#000000;">Berdasarkan</label>
                    <select id="chartType" class="select-green">
                        <option value="departemen" selected>Departemen</option>
                        <option value="plant">Plant</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartMain" height="120"></canvas>
            </div>
        </div>
    </div>
    
    {{-- Chart data di-inject melalui script tag --}}
    <script id="chart-data" type="application/json">
        {!! $chartDataJson !!}
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart data from Blade - Data dari PHP/Laravel
        var chartDataElement = document.getElementById('chart-data');
        var chartData = JSON.parse(chartDataElement.textContent);
        var depLabels = chartData.departemenLabels || [];
        var depValues = chartData.departemenValues || [];
        var plantLabels = chartData.plantLabels || [];
        var plantValues = chartData.plantValues || [];

        const palettes = {
            departemen: { bg: 'rgba(22, 163, 74, 0.25)', border: 'rgba(22, 163, 74, 1)' },
            plant: { bg: 'rgba(13, 148, 136, 0.25)', border: 'rgba(13, 148, 136, 1)' }
        };

        const datasetsByType = {
            departemen: { labels: depLabels, values: depValues },
            plant: { labels: plantLabels, values: plantValues }
        };

        const ctx = document.getElementById('chartMain');
        let chart;

        function render(type) {
            const ds = datasetsByType[type] ?? { labels: [], values: [] };
            const colors = palettes[type];
            const config = {
                type: 'bar',
                data: {
                    labels: ds.labels,
                    datasets: [{
                        label: 'Jumlah',
                        data: ds.values,
                        backgroundColor: colors.bg,
                        borderColor: colors.border,
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            };
            if (chart) { chart.destroy(); }
            chart = new Chart(ctx, config);
        }

        const select = document.getElementById('chartType');
        select.addEventListener('change', (e) => render(e.target.value));
        render(select.value);
    </script>
</body>
</html>

