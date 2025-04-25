@props(["auth","user"])
<header class="bg-white h-16 px-4 flex items-center justify-between border-b border-gray-300 sticky top-0 z-50">
    <!-- Logo Section -->
    <div class="flex items-center">
      <a href="{{route('/')}}" class="flex items-center mr-4">

        <span class="text-[#FF4500] font-bold ml-1 text-xl">Code Space</span>
      </a>
    </div>

    <!-- Universal Search Component -->
    <div class="max-w-3xl mx-auto my-8 px-4">
        <!-- Search Container -->
        <div class="relative">
            <!-- Search Input -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input
                    id="universal-search"
                    type="text"
                    class="w-[500px] pl-12 pr-12 py-4 bg-white border border-gray-200 rounded-xl shadow-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all"
                    placeholder="Rechercher des communautés ou des utilisateurs..."
                    autocomplete="off"
                >
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <span id="search-shortcut" class="hidden sm:flex items-center justify-center px-2 py-1 bg-gray-100 text-gray-500 text-xs rounded-md">
                    <kbd class="px-1.5 py-0.5 bg-white border border-gray-300 rounded-md shadow-sm text-xs">⌘</kbd>
                    <span class="mx-1">+</span>
                    <kbd class="px-1.5 py-0.5 bg-white border border-gray-300 rounded-md shadow-sm text-xs">K</kbd>
                </span>
                    <button id="clear-search" class="hidden ml-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Search Results Dropdown -->
            <div id="search-results" class="absolute left-0 right-0 mt-2 bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden z-50 transform opacity-0 scale-95 pointer-events-none transition-all duration-200 origin-top">
                <!-- Search Status -->
                <div id="search-status" class="p-4 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div id="search-loader" class="hidden">
                                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-orange-500"></div>
                            </div>
                            <span id="search-status-text" class="ml-2 text-sm text-gray-600">Commencez à taper pour rechercher</span>
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <span class="hidden sm:inline">Naviguer</span>
                            <span class="hidden sm:inline mx-1">:</span>
                            <kbd class="mx-1 px-1.5 py-0.5 bg-gray-100 border border-gray-300 rounded text-xs">↑</kbd>
                            <kbd class="mx-1 px-1.5 py-0.5 bg-gray-100 border border-gray-300 rounded text-xs">↓</kbd>
                            <span class="hidden sm:inline mx-1">Sélectionner</span>
                            <span class="hidden sm:inline mx-1">:</span>
                            <kbd class="mx-1 px-1.5 py-0.5 bg-gray-100 border border-gray-300 rounded text-xs">Enter</kbd>
                        </div>
                    </div>
                </div>

                <!-- Communities Section -->
                <div id="communities-results" class="hidden">
                    <div class="px-4 py-2 bg-gray-50">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Communautés</h3>
                    </div>
                    <div id="communities-list" class="max-h-60 overflow-y-auto">
                        <!-- Community results will be populated here -->
                    </div>
                </div>

                <!-- Users Section -->
                <div id="users-results" class="hidden">
                    <div class="px-4 py-2 bg-gray-50">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Utilisateurs</h3>
                    </div>
                    <div id="users-list" class="max-h-60 overflow-y-auto">
                        <!-- User results will be populated here -->
                    </div>
                </div>

                <!-- No Results -->
                <div id="no-results" class="hidden p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">Aucun résultat trouvé</h3>
                    <p class="text-gray-500">Essayez avec d'autres termes de recherche</p>
                </div>

                <!-- Footer -->
                <div class="p-4 border-t border-gray-100 bg-gray-50 text-center">
                    <span class="text-sm text-gray-500">Appuyez sur <kbd class="px-1.5 py-0.5 bg-white border border-gray-300 rounded-md shadow-sm text-xs">ESC</kbd> pour fermer</span>
                </div>
            </div>
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
                <a href="/Chat" class="p-2 text-gray-700 hover:bg-gray-50 rounded-full transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </a>

                <!-- Center - Create Button with Dropdown -->
                <div class="relative group">
                    <a href="{{route("Post.index")}}?Type=content-texte" class=" hover:bg-gray-300 text-gray-800 font-semibold py-2 px-8 rounded-full flex items-center transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Créer
                    </a>
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
                        <button id="profileButton" class="w-10 h-10 overflow-hidden rounded-full bg-teal-500 flex items-center justify-center text-white border-2 border-white">
                            <img src="{{$user->profilePicture}}" />
                            <div class="absolute bottom-0 right-0 w-2 h-2 bg-green-400 rounded-full border border-white"></div>
                        </button>

                        <!-- Profile Dropdown Menu (Hidden by default) -->
                        <div id="profileDropdown" class="absolute w-[350px] right-0 mt-2 w-64 bg-white rounded-md shadow-lg overflow-hidden z-20 hidden">
                            <!-- Profile Section -->
                            <div class="p-4 border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="relative flex-shrink-0">
                                        <div class="w-10 h-10 overflow-hidden rounded-full bg-teal-500 flex items-center justify-center text-white">
                                            <img src="{{$user->profilePicture}}" />
                                            <div class="absolute bottom-0 right-0 w-2 h-2 bg-green-400 rounded-full border border-white"></div>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="font-medium text-gray-900">Voir le profil</div>
                                        <div class="text-sm text-gray-500">u/{{$user->username}}</div>
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
<!-- JavaScript for Search Functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('universal-search');
        const searchResults = document.getElementById('search-results');
        const searchLoader = document.getElementById('search-loader');
        const searchStatusText = document.getElementById('search-status-text');
        const clearSearchBtn = document.getElementById('clear-search');
        const communitiesResults = document.getElementById('communities-results');
        const communitiesList = document.getElementById('communities-list');
        const usersResults = document.getElementById('users-results');
        const usersList = document.getElementById('users-list');
        const noResults = document.getElementById('no-results');

        let searchTimeout;
        let selectedItemIndex = -1;
        let allItems = [];

        // Format numbers with commas
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        // Show search results
        function showSearchResults() {
            searchResults.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            searchResults.classList.add('opacity-100', 'scale-100');
        }

        // Hide search results
        function hideSearchResults() {
            searchResults.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            searchResults.classList.remove('opacity-100', 'scale-100');
            selectedItemIndex = -1;
        }

        // Clear search input
        function clearSearch() {
            searchInput.value = '';
            clearSearchBtn.classList.add('hidden');
            searchStatusText.textContent = 'Commencez à taper pour rechercher';
            communitiesResults.classList.add('hidden');
            usersResults.classList.add('hidden');
            noResults.classList.add('hidden');
            selectedItemIndex = -1;
        }

        // Render user results
        function renderUsers(users) {
            // Clear previous results
            usersList.innerHTML = '';

            if (users.length === 0) {
                usersResults.classList.add('hidden');
                return;
            }

            usersResults.classList.remove('hidden');

            users.forEach(user => {
                const item = document.createElement('div');
                item.className = 'search-item px-4 py-3 hover:bg-gray-50 cursor-pointer flex items-center';
                item.dataset.type = 'user';
                item.dataset.id = user.id;

                // Get first letter of name for avatar fallback
                const firstLetter = user.name ? user.name.charAt(0).toUpperCase() : '@';

                // Check if user has a profile picture
                const hasProfilePic = user.profilePicture && user.profilePicture !== '';

                item.innerHTML = `
                <div class="flex-shrink-0 w-10 h-10 ${hasProfilePic ? '' : 'bg-gradient-to-br from-blue-400 to-green-500'} rounded-full flex items-center justify-center text-white text-lg mr-3 overflow-hidden">
                    ${hasProfilePic
                    ? `<img src="${user.profilePicture}" alt="${user.name}" class="w-full h-full object-cover">`
                    : firstLetter
                }
                </div>
                <div class="flex-grow min-w-0">
                    <div class="font-medium text-gray-900 truncate">${user.username || 'Utilisateur'}</div>
                    <div class="text-sm text-gray-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        @${user.username || user.userName || ''}
                    </div>
                </div>
                <div class="flex-shrink-0 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            `;

                item.addEventListener('click', () => {
                    // Navigate to user profile
                    window.location.href = `/Profile/${user.id}`;
                    hideSearchResults();
                });

                usersList.appendChild(item);
            });

            // Update all items for keyboard navigation
            allItems = document.querySelectorAll('.search-item');
        }

        // Render community results
        function renderCommunities(communities) {
            // Clear previous results
            communitiesList.innerHTML = '';

            if (communities.length === 0) {
                communitiesResults.classList.add('hidden');
                return;
            }

            communitiesResults.classList.remove('hidden');

            communities.forEach(community => {
                const item = document.createElement('div');
                item.className = 'search-item px-4 py-3 hover:bg-gray-50 cursor-pointer flex items-center';
                item.dataset.type = 'community';
                item.dataset.id = community.id;

                // Get first letter of name for icon fallback
                const firstLetter = community.name ? community.name.charAt(0).toUpperCase() : 'C';

                item.innerHTML = `
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-orange-400 to-purple-500 rounded-full flex items-center justify-center text-white text-lg mr-3">
                    ${firstLetter}
                </div>
                <div class="flex-grow min-w-0">
                    <div class="font-medium text-gray-900 truncate">${community.name}</div>
                    <div class="text-sm text-gray-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                        ${formatNumber(community.members || community.memberCount || 0)} membres
                    </div>
                </div>
                <div class="flex-shrink-0 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            `;

                item.addEventListener('click', () => {
                    // Navigate to community page
                    window.location.href = `/community/${community.id}`;
                    hideSearchResults();
                });

                communitiesList.appendChild(item);
            });

            // Update all items for keyboard navigation
            allItems = document.querySelectorAll('.search-item');
        }

        // Perform search with AJAX
        function performSearch(query) {
            // Show loader
            searchLoader.classList.remove('hidden');
            searchStatusText.textContent = 'Recherche en cours...';

            // Clear previous results
            communitiesList.innerHTML = '';
            usersList.innerHTML = '';

            // Don't search if query is empty
            if (!query || query.trim() === '') {
                searchLoader.classList.add('hidden');
                searchStatusText.textContent = 'Commencez à taper pour rechercher';
                communitiesResults.classList.add('hidden');
                usersResults.classList.add('hidden');
                noResults.classList.add('hidden');
                return;
            }

            // Cancel previous AJAX requests if any
            if (window.currentSearchRequest) {
                window.currentSearchRequest.abort();
            }

            // Make AJAX request for users
            window.currentSearchRequest = $.ajax({
                url: `../../../../../Users/Search/${encodeURIComponent(query)}`,
                method: 'GET',
                success: (response) => {
                    // Hide loader
                    searchLoader.classList.add('hidden');

                    // Process user results
                    let users = [];
                    try {
                        // Check if response is already parsed
                        if (typeof response === 'string') {
                            users = JSON.parse(response);
                        } else {
                            users = response;
                        }

                        // Filter users if needed (server might already filter)
                        const filteredUsers = Array.isArray(users) ? users : [];

                        // Render users
                        renderUsers(filteredUsers);

                        // Update status text
                        const totalResults = filteredUsers.length;
                        searchStatusText.textContent = totalResults > 0
                            ? `${totalResults} résultat${totalResults > 1 ? 's' : ''} trouvé${totalResults > 1 ? 's' : ''}`
                            : 'Aucun résultat trouvé';

                        // Show/hide no results message
                        noResults.classList.toggle('hidden', totalResults > 0);

                    } catch (error) {
                        console.error('Error processing user results:', error);
                        searchStatusText.textContent = 'Erreur lors de la recherche';
                        noResults.classList.remove('hidden');
                    }
                },
                error: (error) => {
                    // Hide loader
                    searchLoader.classList.add('hidden');

                    console.error('Search error:', error);
                    searchStatusText.textContent = 'Erreur lors de la recherche';
                    noResults.classList.remove('hidden');
                }
            });

            // If you also have a communities API endpoint, you can make a second request here
            // For example:
            /*
            $.ajax({
                url: `../../../../../Communities/Search/${encodeURIComponent(query)}`,
                method: 'GET',
                success: (response) => {
                    try {
                        let communities = [];
                        if (typeof response === 'string') {
                            communities = JSON.parse(response);
                        } else {
                            communities = response;
                        }

                        renderCommunities(communities);

                        // Update total results count
                        const userCount = usersList.querySelectorAll('.search-item').length;
                        const communityCount = communitiesList.querySelectorAll('.search-item').length;
                        const totalResults = userCount + communityCount;

                        searchStatusText.textContent = totalResults > 0
                            ? `${totalResults} résultat${totalResults > 1 ? 's' : ''} trouvé${totalResults > 1 ? 's' : ''}`
                            : 'Aucun résultat trouvé';

                        noResults.classList.toggle('hidden', totalResults > 0);

                    } catch (error) {
                        console.error('Error processing community results:', error);
                    }
                },
                error: (error) => {
                    console.error('Community search error:', error);
                }
            });
            */
        }

        // Debounce search input to prevent too many API calls
        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                const context = this;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        }

        // Handle input changes with debounce
        const debouncedSearch = debounce(function(query) {
            performSearch(query);
        }, 300);

        searchInput.addEventListener('input', function() {
            const query = this.value.trim();

            // Show/hide clear button
            clearSearchBtn.classList.toggle('hidden', query === '');

            if (query === '') {
                clearSearch();
            } else {
                showSearchResults();
                debouncedSearch(query);
            }
        });

        // Handle clear button click
        clearSearchBtn.addEventListener('click', function() {
            clearSearch();
            searchInput.focus();
        });

        // Handle focus on search input
        searchInput.addEventListener('focus', function() {
            if (this.value.trim() !== '') {
                showSearchResults();
            }
        });

        // Handle click outside to close
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                hideSearchResults();
            }
        });

        // Handle keyboard navigation
        document.addEventListener('keydown', function(e) {
            // If search results are not visible, don't handle keyboard navigation
            if (searchResults.classList.contains('opacity-0')) return;

            // Update all items
            allItems = document.querySelectorAll('.search-item');

            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    if (selectedItemIndex < allItems.length - 1) {
                        selectedItemIndex++;
                        updateSelectedItem();
                    }
                    break;

                case 'ArrowUp':
                    e.preventDefault();
                    if (selectedItemIndex > 0) {
                        selectedItemIndex--;
                        updateSelectedItem();
                    }
                    break;

                case 'Enter':
                    e.preventDefault();
                    if (selectedItemIndex >= 0 && selectedItemIndex < allItems.length) {
                        allItems[selectedItemIndex].click();
                    }
                    break;

                case 'Escape':
                    e.preventDefault();
                    hideSearchResults();
                    break;
            }
        });

        // Update selected item
        function updateSelectedItem() {
            allItems.forEach((item, index) => {
                if (index === selectedItemIndex) {
                    item.classList.add('bg-gray-50');
                    item.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                } else {
                    item.classList.remove('bg-gray-50');
                }
            });
        }

        // Keyboard shortcut to focus search (Cmd+K or Ctrl+K)
        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                searchInput.focus();
            }
        });
    });
</script>
