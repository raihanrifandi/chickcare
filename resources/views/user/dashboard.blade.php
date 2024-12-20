@extends('layouts.user')

@section('title', 'Dashboard User')

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
                <p class="text-3xl mt-2">{{ $totalGejala }}</p>
            </div>
        </div>

        <!-- Card: Total Penyakit -->
        <div class="bg-green-500 text-white rounded-lg shadow-lg p-4 flex items-center">
            <div class="mr-4 text-4xl">
                <i class="fas fa-disease"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Total Penyakit</h2>
                <p class="text-3xl mt-2">{{ $totalPenyakit }}</p>
            </div>
        </div>

        <!-- Card: Total Knowledge Base -->
        <div class="bg-purple-500 text-white rounded-lg shadow-lg p-4 flex items-center">
            <div class="mr-4 text-4xl">
                <i class="fas fa-book"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Knowledge Base</h2>
                <p class="text-3xl mt-2">{{ $totalPengetahuan }}</p>
            </div>
        </div>

        <!-- Card: Active Users -->
        <div class="bg-yellow-500 text-white rounded-lg shadow-lg p-4 flex items-center">
            <div class="mr-4 text-4xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold">Total Admin Pakar</h2>
                <p class="text-3xl mt-2">{{ $totalAdmin }}</p>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div id="default-carousel" class="relative w-full z-0" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('assets/banner/ayam.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="First slide">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('assets/banner/telur.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Second slide">
            </div>
        </div>
    </div>

    <!-- Post -->
     

</div>
@endsection
