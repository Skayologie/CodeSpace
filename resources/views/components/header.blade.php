<header class="bg-white h-12 px-4 flex items-center justify-between border-b border-gray-200 sticky top-0 z-50">
    <!-- Logo Section -->
    <div class="flex items-center">
      <a href="{{route('admin.dashboard')}}" class="flex items-center mr-4">

        <span class="text-[#FF4500] font-bold ml-1 text-xl">Code Space</span>
      </a>
    </div>

    <!-- Search Bar -->
    <div class="flex-1 max-w-xl mx-4">
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
          </svg>
        </div>
        <input type="text" placeholder="Rechercher sur Reddit" class="block w-full bg-gray-100 border border-gray-200 rounded-full pl-10 pr-4 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>
    </div>

    <!-- Right Side Buttons -->
    <div class="flex items-center space-x-2">
      <!-- Login Button -->
      <a href="{{route('login.index')}}" class="bg-[#FF4500] text-white font-bold rounded-full px-4 py-1.5 text-sm hover:bg-[#e03d00]">
        Se connecter
      </a>
      <!-- Login Button -->
      <a href="{{route('register.index')}}" class="bg-[#ffffff] text-black font-bold rounded-full border  border-black px-4 py-1.5 text-sm hover:bg-[#e03d00] hover:text-white hover:border-white">
        register
      </a>
      <!-- More Menu Button -->
      <button class="p-1 rounded-md hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
        </svg>
      </button>
    </div>
  </header>
