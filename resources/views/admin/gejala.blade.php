@extends('layouts.app')
@section('title', 'Master Data Gejala')

@section('contents')
    <div class="container mx-auto">
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

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Gejala</h1>
            <a href="javascript:void(0)" onclick="openAddModal()"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-200 shadow-lg">
                + Tambah Gejala
            </a>
        </div>

         <!-- Search Bar -->
         <div class="mb-4 flex items-center relative">
            <input
              class="appearance-none border-2 pl-10 border-gray-300 hover:border-gray-400 transition-colors rounded-md w-[256px] py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-purple-600 focus:border-purple-600 focus:shadow-outline"
              id="searchInput"
              type="text"
              placeholder="Search..."
            />
          
            <div class="absolute left-0 inset-y-0 flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 ml-3 text-gray-400 hover:text-gray-500"
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
        <br>

        <!-- Table Gejala -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border ">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            ID</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Gejala</th>
                        <th
                            class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="gejalaTableBody" class="text-gray-700 ">
                    @foreach ($gejala as $data)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="py-4 px-4 border">{{ $data->kode_gejala }}</td>
                            <td class="py-4 px-4 border">{{ $data->nama_gejala }}</td>
                            <td class="py-12 px-8 border flex justify-center items-center text-center">
                                <!-- Tombol Edit -->
                                <button onclick="openEditModal(this)" 
                                    data-id_gejala="{{ $data->kode_gejala }}"
                                    data-nama_gejala="{{ $data->nama_gejala}}"
                                    class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition duration-200 shadow">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <!-- Form Hapus -->
                                <form action="{{ route('gejala.destroy', $data->kode_gejala) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus gejala ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600 transition duration-200 shadow">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $gejala->links('components.pagination') }}
        </div>
    </div>

    <!-- Pop Up -->
    <!-- Modal Edit Gejala -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl" style="overflow-y: auto; max-height: 80vh;">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Gejala</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" id="gejalaId" name="id_gejala">
                <div class="mb-4">
                    <label for="nama_gejala" class="block text-sm font-medium text-gray-700">Gejala</label>
                    <input type="text" id="nama_gejala" name="nama_gejala" class="mt-1 p-2 w-full border rounded" required>
                </div>
         
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Gejala -->
    <div id="addModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center overflow-y-auto z-50">
        <div class="grid grid-cols-12 w-full h-full items-start mt-10">
            <div class="col-span-3"></div>
            <div class="col-span-6 bg-white p-8 rounded-lg shadow-lg max-h-[90vh] overflow-y-auto">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Gejala</h2>
                <form action="{{ route('gejala.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="addGejala" class="block text-sm font-medium text-gray-700">Gejala</label>
                        <input type="text" id="addGejala" name="nama_gejala" class="mt-1 p-2 w-full border rounded"
                            required>
                    </div>

                    <div class="flex justify-end space-x-3 sticky bottom-0 bg-white pt-4">
                        <button type="button" onclick="closeAddModal()"
                            class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
                    </div>
                </form>
            </div>
            <div class="col-span-3"></div>
        </div>
    </div>
@endsection

{{-- Javascript Logic --}}
@push('scripts') 
    <script src="{{ asset('js/gejala.js') }}"></script> 
    <script src="{{ asset('js/search.js') }}"></script> 
@endpush
