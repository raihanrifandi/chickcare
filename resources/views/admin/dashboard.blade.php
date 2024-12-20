@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('contents')
<div class="container mx-auto py-6 px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card: Total Gejala -->
        <div class="bg-blue-500 text-white rounded-lg shadow-lg p-4 flex items-center">
            <div class="mr-4 text-4xl">
                <i class="fas fa-virus"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Total Gejala</h2>
                <p class="text-3xl mt-2">{{ \App\Models\Gejala::count() }}</p>
            </div>
        </div>

        <!-- Card: Total Penyakit -->
        <div class="bg-green-500 text-white rounded-lg shadow-lg p-4 flex items-center">
            <div class="mr-4 text-4xl">
                <i class="fas fa-disease"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Total Penyakit</h2>
                <p class="text-3xl mt-2">{{ \App\Models\Penyakit::count() }}</p>
            </div>
        </div>

        <!-- Card: Active Users -->
        <div class="bg-yellow-500 text-white rounded-lg shadow-lg p-4 flex items-center">
            <div class="mr-4 text-4xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Active Users</h2>
                <p class="text-3xl mt-2">{{ $activeUsers ?? 0 }}</p>
            </div>
        </div>

        <!-- Card: Total Knowledge Base -->
        <div class="bg-purple-500 text-white rounded-lg shadow-lg p-4 flex items-center">
            <div class="mr-4 text-4xl">
                <i class="fas fa-book"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Knowledge Base</h2>
                <p class="text-3xl mt-2">{{ \App\Models\BasisPengetahuan::count()}}</p>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="mt-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Data Visualizations</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Gejala and Penyakit Comparison -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <canvas id="gejalaPenyakitChart"></canvas>
            </div>

            <!-- User Activity -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <canvas id="userActivityChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Charts Script -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    // Gejala vs Penyakit Chart
    const gejalaPenyakitCtx = document.getElementById('gejalaPenyakitChart').getContext('2d');
    new Chart(gejalaPenyakitCtx, {
        type: 'bar',
        data: {
            labels: ['Gejala', 'Penyakit'],
            datasets: [{
                label: 'Jumlah Data',
                data: [{{ \App\Models\Gejala::count() }}, {{ \App\Models\Penyakit::count() }}],
                backgroundColor: ['#1d4ed8', '#16a34a'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            }
        }
    });

    // User Activity Chart
    const userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
    new Chart(userActivityCtx, {
        type: 'line',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Active Users',
                data: [12, 19, 3, 5, 2, 3, 7], // Replace this with dynamic data
                borderColor: '#facc15',
                backgroundColor: 'rgba(250, 204, 21, 0.5)',
                fill: true
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>
@endpush
@endsection
