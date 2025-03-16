@props(["auth"])
<header class="bg-white h-16 px-4 flex items-center justify-between border-b border-gray-300 sticky top-0 z-50">
    <!-- Logo Section -->
    <div class="flex items-center">
      <a href="{{route('/')}}" class="flex items-center mr-4">

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
        @if($auth === "false")
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
        @else
            <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-16">


                <!-- Messages Button -->
                <button class="p-2 text-gray-700 hover:bg-gray-50 rounded-full transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </button>

                <!-- Center - Create Button with Dropdown -->
                <div class="relative group">
                    <button class=" hover:bg-gray-300 text-gray-800 font-semibold py-2 px-8 rounded-full flex items-center transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Créer
                    </button>

                </div>

                <!-- Right Side - Notifications and Profile -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications Bell -->
                    <button class="p-2 text-gray-700 hover:bg-gray-50 rounded-full transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile Button with Dropdown -->
                    <div class="relative">
                        <button id="profileButton" class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white border-2 border-white">
                            <div class="absolute bottom-0 right-0 w-2 h-2 bg-green-400 rounded-full border border-white"></div>
                        </button>

                        <!-- Profile Dropdown Menu (Hidden by default) -->
                        <div id="profileDropdown" class="absolute w-[350px] right-0 mt-2 w-64 bg-white rounded-md shadow-lg overflow-hidden z-20 hidden">
                            <!-- Profile Section -->
                            <div class="p-4 border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="relative flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white">
                                            <div class="absolute bottom-0 right-0 w-2 h-2 bg-green-400 rounded-full border border-white"></div>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="font-medium text-gray-900">Voir le profil</div>
                                        <div class="text-sm text-gray-500">u/Double-Yak-203</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-1">
                                <!-- Avatar -->
                                <a href="#" class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Modifier l'avatar</span>
                                </a>

                                <!-- Trophies -->
                                <a href="#" class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <div>
                                        <span>Trophées</span>
                                        <div class="text-xs text-gray-500">3 réalisations débloquées</div>
                                    </div>
                                </a>

                                <!-- Contribution -->
                                <a href="#" class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <div>
                                        <span>Programme de contribution</span>
                                        <div class="text-xs text-gray-500">@ 0 pièces d'or gagnées</div>
                                    </div>
                                </a>

                                <!-- Dark Mode Toggle -->
                                <div class="flex items-center justify-between px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                        </svg>
                                        <span>Mode sombre</span>
                                    </div>
                                    <div class="relative inline-block w-10 mr-2 align-middle">
                                        <input type="checkbox" id="toggleDarkMode" class="sr-only peer" />
                                        <div class="w-10 h-5 bg-gray-200 rounded-full peer-checked:bg-blue-600"></div>
                                        <div class="absolute w-5 h-5 bg-white rounded-full shadow left-0 peer-checked:left-5 transition"></div>
                                    </div>
                                </div>

                                <!-- Log Out -->
                                <a href="{{route("auth.logout")}}" class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Se déconnecter</span>
                                </a>
                            </div>
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
  </header>
