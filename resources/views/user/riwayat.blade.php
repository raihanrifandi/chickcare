@extends('layouts.user')
@section('title', 'Riwayat Diagnosa Penyakit')

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
                <a href="{{ route('user.riwayat') }}" class="text-gray-600 hover:text-blue-500 font-semibold ">
                  Riwayat Konsultasi
                </a>
              </li>
          
            </ul>
          </div>
    </div>

    <div class="bg-white rounded-lg shadow-md container mx-auto px-4 py-8 mb-4">
        <div id="toastContainer" class="fixed top-5 right-5 space-y-4 z-50"></div>

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div class="relative">
                <input
                    class="appearance-none border-2 pl-10 border-gray-300 hover:border-gray-400 transition-colors rounded-md w-[256px] py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-blue-600 focus:border-blue-600 focus:shadow-outline"
                    id="searchInput"
                    type="text"
                    placeholder="Search..."
                />
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </div>
            </div>
        </div>
        <br>

        <!-- Table Gejala -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border ">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                            No</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                            Tanggal</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                            Penyakit</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                            Persentase</th>    
                        <th
                            class="w-16 py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="riwayatTableBody" class="text-gray-700 ">
                    @foreach ($riwayat as $data)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="w-16 py-4 px-4 border">{{ $loop->iteration }}
                            <td class="py-4 px-4 border">{{ $data->tanggal_diagnosa }}</td>
                            <td class="py-4 px-4 border">{{ $data->nama_penyakit }}</td>
                            <td class="py-4 px-4 border">{{ $data->persentase }} <span>%</span></td>
                            <td class="py-12 px-8 border flex justify-center items-center text-center">
                                <a href="{{ route('user.detail', $data->id_hasil) }}" 
                                   class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-3 py-2 transition duration-200 flex items-center gap-2">
                                    <i class="fa-solid fa-eye"></i>
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- Javascript Logic --}}
@push('scripts') 
    <script src="{{ asset('js/search.js') }}"></script> 
@endpush

