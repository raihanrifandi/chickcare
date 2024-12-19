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
                <a href="{{ route('aturan.index')}}" class="text-gray-600 hover:text-blue-500 font-semibold ">
                  Basis Pengetahuan
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

            <a href="{{ route('aturan.create') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-200 shadow-lg">
                + Tambah Basis Pengetahuan
            </a>
        </div>
        <br>

        <!-- Table Basis Pengetahuan -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="w-16 py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">No</th>
                        <th class="2-16 py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">Aturan</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">Penyakit</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">Gejala</th>
                        <th class="2-16 py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">Nilai CF</th>
                        <th class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="knowledgeBaseTableBody" class="text-gray-700">
                    @foreach ($rules as $data)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="w-16 py-4 px-4 border">{{ $loop->iteration }}
                            <td class="py-4 px-4 border">{{ $data->id }}</td>
                            <td class="py-4 px-4 border">
                                {{ $data->penyakit->kode_penyakit }} | <span class="font-semibold">{{ $data->penyakit->nama_penyakit }}</span>
                            </td>
                            <td class="py-4 px-4 border">
                              {{ $data->gejala->kode_gejala }} | <span class="font-semibold">{{ $data->gejala->nama_gejala }}</span>
                            </td>                            
                            <td class="py-4 px-4 border">{{ $data->cf}}</td>
                            <td class="py-12 px-2 text-center flex justify-center gap-1">
                                <!-- Tombol Edit -->
                                <a href="{{ route('aturan.edit', $data->id) }}"
                                   class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200 shadow">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('aturan.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200 shadow">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                let value = $(this).val().toLowerCase();
                $("#knowledgeBaseTableBody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection

