@extends('layouts.user')
@section('title', 'Hasil Diagnosa Penyakit')

@section('contents')
    <div class="bg-white rounded-lg shadow-md container mx-auto px-4 py-8 mb-4">

        <h1 class="text-3xl font-bold text-center mb-6">Hasil Diagnosa</h1>

        @if($hasilTertinggi)
            <div class="border rounded-lg p-6 shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-green-600 mb-4">{{ $hasilTertinggi['nama_penyakit'] }}</h2>
                <p class="mb-4"><strong>Detail Penyakit:</strong> {{ $hasilTertinggi['detail_penyakit'] }}</p>
                <p class="mb-4"><strong>Solusi:</strong> {{ $hasilTertinggi['solusi_penyakit'] }}</p>
                <p class="mb-4"><strong>Persentase Keyakinan:</strong> {{ $hasilTertinggi['cf'] * 100 }}%</p>
    
                @if($hasilTertinggi['gambar_penyakit'])
                    <img src="{{ asset('storage/' . $hasilTertinggi['gambar_penyakit']) }}" alt="Gambar Penyakit" class="w-64 h-64 object-cover rounded-lg mx-auto">
                @endif
            </div>
        @else
            <p class="text-center text-red-600 font-semibold">Tidak ada hasil diagnosa yang ditemukan.</p>
        @endif
    
        <h2 class="text-xl font-semibold mb-4">Gejala yang Dialami</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border border-gray-300 px-4 py-2">Kode Gejala</th>
                    <th class="border border-gray-300 px-4 py-2">Nama Gejala</th>
                    <th class="border border-gray-300 px-4 py-2">CF (Hasil Perhitungan)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gejalaDanKepercayaan as $gejala)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $gejala['kode_gejala'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $gejala['nama_gejala'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $gejala['cf'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-red-500">Tidak ada gejala yang dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    
        {{-- <h2 class="text-xl font-semibold mt-8">Daftar Hasil Diagnosa</h2>
        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border border-gray-300 px-4 py-2">Nama Penyakit</th>
                    <th class="border border-gray-300 px-4 py-2">Persentase</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasilDiagnosa as $diagnosa)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $diagnosa['nama_penyakit'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $diagnosa['cf'] * 100 }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
       
    </div>  
@endsection


