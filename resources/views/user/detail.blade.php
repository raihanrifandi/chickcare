@extends('layouts.user')
@section('title', 'Hasil Diagnosa Penyakit')

@section('contents')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-4xl mx-auto">
        <!-- Header -->
        <div class="border-b pb-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Hasil Diagnosa Penyakit Ayam</h1>
            <p class="text-gray-600 mt-2">
                Tanggal Pemeriksaan: {{ \Carbon\Carbon::parse($hasil->tanggal_diagnosa)->format('d F Y, H:i') }} WIB
            </p>
        </div>

        <!-- Hasil Diagnosa -->
        <div class="bg-blue-50 rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">Hasil Diagnosa</h2>
            <div class="space-y-3">
                <div class="flex items-center">
                    <span class="text-blue-600 font-semibold w-40">Penyakit:</span>
                    <span class="text-gray-800 font-medium">{{ $hasil->penyakit->nama_penyakit }}</span>
                </div>
                <div class="flex items-center">
                    <span class="text-blue-600 font-semibold w-40">Tingkat Kepastian:</span>
                    <span class="text-gray-800 font-medium">{{ $hasil->persentase }}%</span>
                </div>
            </div>
        </div>

        <!-- Gambar Penyakit -->
        @if($hasil->penyakit->gambar_penyakit)
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Gambaran Penyakit</h2>
            <div class="bg-gray-50 rounded-lg p-6">
                <div class="relative aspect-video w-full overflow-hidden rounded-lg">
                    <img 
                        src="{{ asset('storage/' . $hasil->penyakit->gambar_penyakit) }}" 
                        alt="Gambar {{ $hasil->penyakit->nama_penyakit }}"
                        class="object-contain w-full h-full"
                    >
                </div>
                <p class="text-sm text-gray-500 mt-2 text-center">
                    Visualisasi gejala {{ $hasil->penyakit->nama_penyakit }} pada ayam
                </p>
            </div>
        </div>
        @endif

        <!-- Gejala yang Dialami -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Gejala yang Dialami</h2>
            <div class="bg-gray-50 rounded-lg p-6">
                <ol class="list-decimal list-inside space-y-3">
                    @foreach ($gejalaDanKepercayaan as $gejala)
                        <li class="text-gray-700">
                            {{ $gejala['nama_gejala'] }}
                            <span class="text-gray-600">
                                — Nilai kepercayaan sebesar => {{ $gejala['cf'] }} ({{ number_format($gejala['cf'] * 100, 0) }}%)
                            </span>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <!-- Detail Penyakit -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Penyakit</h2>
            <div class="bg-gray-50 rounded-lg p-6">
                <p class="text-gray-700 leading-relaxed">{{ $hasil->penyakit->detail_penyakit }}</p>
            </div>
        </div>

        <!-- Solusi dan Penanganan -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Solusi dan Penanganan</h2>
            <div class="bg-gray-50 rounded-lg p-6">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $hasil->penyakit->solusi_penyakit }}</p>
            </div>
        </div>

        <!-- Saran Tambahan -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Saran Tambahan</h2>
            <div class="bg-yellow-50 rounded-lg p-6">
                <div class="flex items-start">
                    <i class="fa-solid fa-lightbulb text-yellow-500 mt-1 mr-4"></i>
                    <p class="text-gray-700">
                        Hasil diagnosa ini merupakan analisis awal berdasarkan gejala yang Anda input. 
                        Untuk penanganan lebih lanjut, disarankan untuk berkonsultasi dengan dokter hewan terdekat.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center pt-4 border-t">
            <a href="{{ route('user.riwayat') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition duration-200">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Kembali ke Riwayat
            </a>
            <a href="{{ route('user.diagnosa') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-200">
                <i class="fa-solid fa-stethoscope mr-2"></i>
                Diagnosa Baru
            </a>
        </div>
    </div>
</div>
@endsection



