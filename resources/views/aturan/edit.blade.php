@extends('layouts.app')

@section('title', 'Master Data Basis Pengetahuan')

@section('contents')
    <!-- Breadcrumbs -->
    <div class="flex justify-between items-center mb-8">
        <div class="p-2 flex items-center flex-wrap">
            <ul class="flex items-center">
              <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-blue-500">
                  <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                </a>
                <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
              </li>
          
              <li class="inline-flex items-center">
                <a href="{{ route('aturan.index') }}" class="text-gray-600 hover:text-blue-500">
                  Basis Pengetahuan
                </a>
                <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
              </li>

              <li class="inline-flex items-center">
                <a href="{{ route('aturan.edit', $rule->id)  }}" class="text-gray-600 hover:text-blue-500 font-semibold ">
                  Edit Data
                </a>
              </li>
          
            </ul>
          </div>
    </div>

    <div class="bg-white rounded-lg shadow-md container mx-auto px-4 py-8 mb-4">
        <div id="toastContainer" class="fixed top-5 right-5 space-y-4 z-50"></div>

        @if (session('error'))
            <div class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('aturan.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>

        <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Petunjuk pengisian nilai MB dan MD:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    <li><strong>1.0</strong>: Pasti Ya (Sangat yakin 100%)</li>
                    <li><strong>0.8</strong>: Hampir Pasti (Yakin sekitar 80%)</li>
                    <li><strong>0.6</strong>: Kemungkinan Besar (Yakin sekitar 60%)</li>
                    <li><strong>0.4</strong>: Mungkin (Yakin sekitar 40%)</li>
                    <li><strong>0.2</strong>: Tidak Yakin (Yakin sekitar 20%)</li>
                    <li><strong>0.0</strong>: Tidak Tahu (Tidak yakin sama sekali)</li>
                </ul>
            </div>
        </div>
        

        <form action="{{ route('aturan.update', $rule->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Pilihan Dropdown Gejala --}}
            <div>
                <label for="kode_gejala" class="block text-gray-700 font-semibold mb-2">Pilih Gejala</label>
                <select name="kode_gejala" id="kode_gejala" class="block w-full p-3 border rounded focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($gejala as $g)
                        <option value="{{ $g->kode_gejala }}" {{ $g->kode_gejala == $rule->kode_gejala ? 'selected' : '' }}>
                            {{ $g->kode_gejala }} - {{ $g->nama_gejala }}
                        </option>
                    @endforeach
                </select>
                @error('kode_gejala')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Pilihan Dropdown Penyakit --}}
            <div>
                <label for="kode_penyakit" class="block text-gray-700 font-semibold mb-2">Pilih Penyakit</label>
                <select name="kode_penyakit" id="kode_penyakit" class="block w-full p-3 border rounded focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($penyakit as $p)
                        <option value="{{ $p->kode_penyakit }}" {{ $p->kode_penyakit == $rule->kode_penyakit ? 'selected' : '' }}>
                            {{ $p->kode_penyakit }} - {{ $p->nama_penyakit }}
                        </option>
                    @endforeach
                </select>
                @error('kode_penyakit')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Input Nilai MB --}}
            <div>
                <label for="mb" class="block text-gray-700 font-semibold mb-2">Nilai MB</label>
                <input type="number" name="mb" id="mb" step="0.1" min="0" max="1" value="{{ old('mb', $rule->cf > 0 ? $rule->cf : 0) }}" class="block w-full p-3 border rounded focus:outline-none focus:ring focus:border-blue-300">
                @error('mb')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Input Nilai MD --}}
            <div>
                <label for="md" class="block text-gray-700 font-semibold mb-2">Nilai MD</label>
                <input type="number" name="md" id="md" step="0.1" min="0" max="1" value="{{ old('md', $rule->cf < 0 ? abs($rule->cf) : 0) }}" class="block w-full p-3 border rounded focus:outline-none focus:ring focus:border-blue-300">
                @error('md')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Data
                </button>
            </div>
        </form>
    </div>

@endsection

{{-- Javascript Logic --}}
@push('scripts') 
    <script src="{{ asset('js/knowledgeBase.js') }}"></script> 
@endpush
