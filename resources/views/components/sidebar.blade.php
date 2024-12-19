<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
    
<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-0 w-64 overflow-y-auto transition duration-300 transform bg-[#1d4ed8] lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-left mt-8 px-6">
        <div class="flex items-center">
            {{-- <img src="assets/logo.png" class="w-12 h-12" alt="Logo Ayam"> --}}
            <span class="mx-2 text-[16px] font-bold text-white">CHICKCARE</span>
        </div>
    </div>

    <nav class="mt-10">
      <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::is('admin.dashboard') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('admin.dashboard') }}">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /> 
        </svg>
        <span class="mx-3">Dashboard</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::is('admin.dashboard') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-layer-group w-6 h-6"></i>
        <span class="mx-3">Gejala</span>
     </a>
  
      <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::is('admin.dashboard') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-location-dot w-6 h-6"></i>
          <span class="mx-3">Penyakit</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::is('admin.dashboard') ? 'bg-gray-700 bg-opacity-25' : '' }}" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-location-dot w-6 h-6"></i>
      <span class="mx-3">Basis Pengetahuan</span>
    </a>

        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('logout') }}" onclick="confirmLogout(event)"; 
        document.getElementById('logout-form').submit();"> 
            <i class="fas fa-sign-out-alt w-6 h-6"></i> 
            <span class="mx-3">Logout</span> 
        </a> 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden"> 
            @csrf 
        </form>
       
  </nav>  
</div>
<script>
    function confirmLogout(event) {
        event.preventDefault();
        
        const confirmDialog = document.createElement('div');
        confirmDialog.innerHTML = `
            <div class="fixed inset-0 bg-black bg-opacity-50 z-100 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-xl text-center">
                    <h2 class="text-xl font-bold mb-4">Konfirmasi Logout</h2>
                    <p class="mb-6">Apakah Anda yakin ingin logout?</p>
                    <div class="flex justify-center space-x-4">
                        <button id="cancel-logout" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                            Batal
                        </button>
                        <button id="confirm-logout" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Logout
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        // Append the dialog to the body
        document.body.appendChild(confirmDialog);
        
        // Get the buttons
        const cancelButton = document.getElementById('cancel-logout');
        const confirmButton = document.getElementById('confirm-logout');
        
        // Cancel button functionality
        cancelButton.addEventListener('click', () => {
            document.body.removeChild(confirmDialog);
        });
        
        // Confirm button functionality
        confirmButton.addEventListener('click', () => {
            // Submit the logout form
            document.getElementById('logout-form').submit();
        });
    }
</script>