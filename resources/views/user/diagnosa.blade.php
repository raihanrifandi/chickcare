@extends('layouts.user')
@section('title', 'Diagnosa Penyakit')

@section('contents')
    <!-- Breadcrumbs -->
    <div class="flex justify-between items-center mb-8">
        <div class="p-2 flex items-center flex-wrap">
            <ul class="flex items-center">
              <li class="inline-flex items-center">
                <a href="{{ route('user.dashboard') }}" class="text-gray-600 hover:text-blue-500">
                  <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                </a>
                <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
              </li>
          
              <li class="inline-flex items-center">
                <a href="{{ route('user.diagnosa') }}" class="text-gray-600 hover:text-blue-500 font-semibold ">
                  Diagnosa Penyakit
                </a>
              </li>
          
            </ul>
          </div>
    </div>

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

      <!-- Card: Caution -->
        <div class="bg-green-500 text-white rounded-lg shadow-lg p-4 flex items-center mb-5">
            <div class="flex flex-col items-start">
                <h4 class="mb-2 text-lg font-bold flex items-center">
                    <i class="fas fa-triangle-exclamation mr-2"></i> Perhatian!
                </h4>
                <p>
                    Silahkan memilih gejala sesuai dengan kondisi ayam anda. Anda dapat memilih jawaban kondisi ayam dengan opsi <span class="font-semibold"> tidak yakin, kurang yakin, sedikit yakin, cukup yakin,</span> dan <span class="font-semibold">yakin.</span>
                    <span class="font-semibold"> Anda tidak perlu menjawab semua pertanyaan, jawablah sesuai kondisi yang dialami.</span>
                    Setelah selesai, silahkan klik tombol <span class="font-semibold">konsultasi</span>.
                </p>
            </div>
        </div>

        <!-- Table Gejala -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <form method="POST" action="{{ route('diagnosa.inference') }}" class="inline"
                  onsubmit="return confirm('Apakah Anda yakin dengan gejala ini?');">
                @csrf
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="w-16 py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                                No</th>
                            <th class="w-8 py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                                Kode</th>
                            <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                                Gejala</th>
                            <th
                                class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                                Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejala as $index => $item)
                        <tr>
                            <td class="text-center border">{{ $index + 1 }}</td>
                            <td class="text-center border">{{ $item->kode_gejala }}</td>
                            <td class="py-4 px-4 border">
                                <span>Apakah</span>
                                {{ strtolower($item->nama_gejala) }}<span>?</span>
                            </td>                            
                            <td class="py-4 px-4 border">
                                <select name="gejala[{{ $item->kode_gejala }}]" id="gejala-{{ $item->id }}" class="w-full border rounded px-3 py-2 text-center" onchange="updateBackgroundColor(this)">
                                    <option value="">-- Pilih Kondisi --</option>
                                    <option value="1.0" data-color="#4caf50">Sangat Yakin</option>
                                    <option value="0.8" data-color="#2196f3">Yakin</option>
                                    <option value="0.6" data-color="#ffeb3b">Cukup Yakin</option>
                                    <option value="0.4" data-color="#ff9800">Sedikit Yakin</option>
                                    <option value="0.2" data-color="#f44336">Kurang Yakin</option>
                                    <option value="0.0" data-color="#9e9e9e">Tidak Yakin</option>
                                </select>
                            </td>                                
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-4 px-4 text-right">
                <button type="submit" class="text-white bg-green-500 hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 ">Konsultasi</button>
                </div>
            </form>
        </div>
    </div>  
@endsection

{{-- Javascript Logic --}}
@push('scripts') 
       
    <script>
        function updateBackgroundColor(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const color = selectedOption.getAttribute('data-color');
            selectElement.style.backgroundColor = color;
        }
    </script>
    <script src="{{ asset('js/gejala.js') }}"></script> 
@endpush
