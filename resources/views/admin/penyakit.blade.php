@extends('layouts.app')
@section('title', 'Master Data Penyakit')

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
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Penyakit</h1>
            <a href="javascript:void(0)" onclick="openAddModal()"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-200 shadow-lg">
                + Tambah Penyakit
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
                            Gambar</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Penyakit</th>
                        <th
                            class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="penyakitTableBody" class="text-gray-700 ">
                    @foreach ($penyakit as $data)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="py-4 px-4 border">{{ $data->kode_penyakit }}</td>
                            <td class="py-4 px-4 border ">
                                @if ($data->gambar_penyakit)
                                    <img src="{{ asset('storage/' . $data->gambar_penyakit) }}" alt="Gambar Penyakit Ayam"
                                        class="w-24 h-24 object-cover rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 border">{{ $data->nama_penyakit }}</td>
                            <td class="py-12 px-8 border flex justify-center items-center text-center">
                                <!-- Tombol Edit -->
                                <button onclick="openEditModal(this)" 
                                    data-kode_penyakit="{{ $data->kode_penyakit }}"
                                    data-nama_penyakit="{{ $data->nama_penyakit}}"
                                    data-detail_penyakit="{{ $data->detail_penyakit}}"
                                    data-solusi_penyakit="{{ $data->solusi_penyakit}}"
                                    data-gambar_penyakit="{{ $data->gambar_penyakit}}"
                                    class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition duration-200 shadow">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <!-- Form Hapus -->
                                <form action="{{ route('penyakit.destroy', $data->kode_penyakit) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus penyakit ini?');">
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
            {{ $penyakit->links('components.pagination') }}
        </div>
    </div>

    <!-- Pop Up -->
    <!-- Modal Edit Penyakit -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl" style="overflow-y: auto; max-height: 80vh;">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Penyakit</h2>
            <form id="editFormPenyakit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <input type="hidden" id="penyakitId" name="kode_penyakit">
    
                <div class="mb-4">
                    <label for="editNamaPenyakit" class="block text-sm font-medium text-gray-700">Nama Penyakit</label>
                    <input type="text" id="editNamaPenyakit" name="nama_penyakit" class="mt-1 p-2 w-full border rounded" required>
                </div>
    
                <div class="mb-4">
                    <label for="editDetailPenyakit" class="block text-sm font-medium text-gray-700">Detail Penyakit</label>
                    <textarea id="editDetailPenyakit" name="detail_penyakit" class="mt-1 p-2 w-full border rounded" rows="4"></textarea>
                </div>
    
                <div class="mb-4">
                    <label for="editSolusiPenyakit" class="block text-sm font-medium text-gray-700">Solusi Penyakit</label>
                    <textarea id="editSolusiPenyakit" name="solusi_penyakit" class="mt-1 p-2 w-full border rounded" rows="4"></textarea>
                </div>
    
                <div class="mb-4">
                    <label for="editGambarPenyakit" class="block text-sm font-medium text-gray-700">Gambar Penyakit</label>
                    <input type="file" id="editGambarPenyakit" name="gambar_penyakit" class="mt-1 p-2 w-full border rounded">
                    <img id="previewGambarPenyakit" alt="Gambar Penyakit" class="mt-2 w-24 h-24 object-cover">
                </div>
    
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Penyakit -->
    <div id="addModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center overflow-y-auto z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-xl w-full" style="overflow-y: auto; max-height: 80vh;">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Penyakit</h2>
            <form action="{{ route('penyakit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-4">
                    <label for="addNamaPenyakit" class="block text-sm font-medium text-gray-700">Nama Penyakit</label>
                    <input type="text" id="addNamaPenyakit" name="nama_penyakit" class="mt-1 p-2 w-full border rounded" required>
                </div>
    
                <div class="mb-4">
                    <label for="addDetailPenyakit" class="block text-sm font-medium text-gray-700">Detail Penyakit</label>
                    <textarea id="addDetailPenyakit" name="detail_penyakit" class="mt-1 p-2 w-full border rounded" rows="4"></textarea>
                </div>
    
                <div class="mb-4">
                    <label for="addSolusiPenyakit" class="block text-sm font-medium text-gray-700">Solusi Penyakit</label>
                    <textarea id="addSolusiPenyakit" name="solusi_penyakit" class="mt-1 p-2 w-full border rounded" rows="4"></textarea>
                </div>
    
                <div class="mb-4">
                    <label for="addGambarPenyakit" class="block text-sm font-medium text-gray-700">Gambar Penyakit</label>
                    <input type="file" id="addGambarPenyakit" name="gambar_penyakit" class="mt-1 p-2 w-full border rounded">
                </div>
    
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- Javascript Logic --}}
@push('scripts') 
    <script src="{{ asset('js/penyakit.js') }}"></script> 
    <script src="{{ asset('js/search.js') }}"></script> 
@endpush
