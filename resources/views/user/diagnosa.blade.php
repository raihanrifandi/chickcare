@extends('layouts.app')
@section('title', 'Diagnosa Penyakit')

@section('contents')
    <div class="bg-white rounded-lg shadow-md container mx-auto px-4 py-8 mb-4">
        <div id="toastContainer" class="fixed top-5 right-5 space-y-4 z-50"></div>

        @if (session('error'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                <span class="font-medium">Operasi Gagal!</span> {{ session('error') }}
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                <span class="font-medium">Operasi Sukses!</span> {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Header -->
        <div class="flex items-start mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Diagnosa Penyakit</h1>
        </div>

        <!-- Card: Coution -->
        <div class="bg-green-500 text-white rounded-lg shadow-lg p-4 flex items-center mb-5">
            <div class="flex flex-col items-start">
                <h4 class="mb-2 text-lg font-bold flex items-center">
                    <i class="fas fa-triangle-exclamation mr-2"></i> Perhatian!
                </h4>
                <p>Silahkan memilih gejala sesuai kondisi dengan ayam anda, jika sudah tekan tombol dibawah untuk melihat hasil.</p>
            </div>
        </div>


        <!-- Table Gejala -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <form method="POST" action="{{ route('diagnosa.process') }}" class="inline"
                  onsubmit="return confirm('Apakah Anda yakin dengan gejala ini?');">
                @csrf
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="w-16 py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                                No</th>
                            <th class="w-16 py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                                Kode</th>
                            <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                                Gejala</th>
                            <th
                                class="w-16 py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                                Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejala as $index => $item)
                        <tr>
                            <td class="text-center border">{{ $index + 1 }}</td>
                            <td class="text-center border">{{ $item->kode_gejala }}</td>
                            <td class="py-4 px-4 border">{{ $item->nama_gejala }}</td>
                            <td class="py-4 px-4 border">
                                <select name="kondisi[]" class="rounded-lg border border-gray-300 p-2 focus:ring-1 focus:ring-green-500 focus:border-green-500">
                                    <option value="0_0">Pilih jika sesuai</option>
                                    @foreach ($kondisi as $kondisiItem)
                                    <option value="{{ $item->kode_gejala }}_{{ $kondisiItem->id }}">{{ $kondisiItem->kondisi }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-4 px-4 text-right">
                <button type="submit" class="text-white bg-green-500 hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 ">Proses Diagnosa</button>
                </div>
            </form>
        </div>
    </div>  
@endsection

{{-- Javascript Logic --}}
@push('scripts') 
    <script src="{{ asset('js/gejala.js') }}"></script> 
@endpush
