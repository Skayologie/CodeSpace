<x-UserHompage>
    <div id="UserArea">
        <div class="z-[-10] min-h-screen bg-gradient-to-b from-gray-50 to-white">
            <!-- Header with background pattern -->
            <div class="relative bg-gradient-to-r from-indigo-600 to-purple-600 h-48 md:h-64">
                <div class="absolute inset-0 opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <defs>
                            <pattern id="pattern" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="rotate(45)">
                                <rect width="100%" height="100%" fill="none"/>
                                <circle cx="20" cy="20" r="1.5" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#pattern)" />
                    </svg>
                </div>
            </div>

            <!-- Profile Container -->
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-10">
                <!-- Profile Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <!-- Profile Header -->
                    <div class="p-6 flex flex-col md:flex-row items-start md:items-center gap-6">
                        <!-- Avatar with Status -->
                        <div class="relative">
                            <div class="w-28 h-28 rounded-full border-4 border-white shadow-md overflow-hidden bg-gradient-to-br from-amber-400 to-orange-500">
                                <img src="{{$User->profilePicture}}" alt="Profile Picture" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute bottom-1 right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white"></div>
                        </div>

                        <!-- User Info -->
                        <div class="flex-grow">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 flex items-center gap-2">
                                        {{$User->username}}
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            Verified
                                        </span>
                                    </h1>
                                    <p class="text-gray-600 flex items-center gap-1.5">
                                        <span>u/{{$User->username}}</span>
                                        <span class="inline-block w-1 h-1 rounded-full bg-gray-400"></span>
                                        <span class="text-gray-500 text-sm">Redditor for {{\Carbon\Carbon::parse($User->email_verified_at)->diffForHumans()}}</span>
                                    </p>
                                </div>

                                <div class="flex gap-3">
{{--                                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-colors flex items-center gap-1.5 shadow-sm">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />--}}
{{--                                        </svg>--}}
{{--                                        Suivre--}}
{{--                                    </button>--}}
                                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                                        </svg>
                                        Message
                                    </button>
                                    <button class="p-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- About Section -->
                    <div class="px-6 pb-6">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="font-medium text-gray-900 mb-2">À propos</h3>
                            <p class="text-gray-600">{{$User->bio}}</p>


                        </div>
                    </div>
                </div>

{{--                <!-- Navigation Tabs -->--}}
{{--                <div class="bg-white rounded-xl shadow-md mb-6">--}}
{{--                    <div class="border-b border-gray-200">--}}
{{--                        <nav class="flex overflow-x-auto scrollbar-hide">--}}
{{--                            <button class="tab-active px-6 py-4 text-sm font-medium text-indigo-600 border-b-2 border-indigo-600 whitespace-nowrap">--}}
{{--                                Vue d'ensemble--}}
{{--                            </button>--}}
{{--                            <button class="tab-inactive px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">--}}
{{--                                Publications--}}
{{--                            </button>--}}
{{--                            <button class="tab-inactive px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">--}}
{{--                                Commentaires--}}
{{--                            </button>--}}
{{--                            <button class="tab-inactive px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">--}}
{{--                                Sauvegardés--}}
{{--                            </button>--}}
{{--                            <button class="tab-inactive px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">--}}
{{--                                Upvotés--}}
{{--                            </button>--}}
{{--                            <button class="tab-inactive px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">--}}
{{--                                Downvotés--}}
{{--                            </button>--}}
{{--                        </nav>--}}
{{--                    </div>--}}

{{--                    <!-- Filter Bar -->--}}
{{--                    <div class="px-4 py-3 flex items-center justify-between">--}}
{{--                        <div class="flex items-center space-x-4">--}}
{{--                            <div class="relative">--}}
{{--                                <button id="filter-dropdown" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">--}}
{{--                                    <span>Nouvelles</span>--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                                <div id="filter-menu" class="hidden absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 z-10">--}}
{{--                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nouvelles</a>--}}
{{--                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Top</a>--}}
{{--                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Controversées</a>--}}
{{--                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Anciennes</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="relative">--}}
{{--                                <button id="view-dropdown" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                        <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                                <div id="view-menu" class="hidden absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 z-10">--}}
{{--                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Carte</a>--}}
{{--                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Classique</a>--}}
{{--                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Compact</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <button class="text-sm text-gray-500 hover:text-gray-700">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Content - Posts -->
                <div class="space-y-4">
                    @foreach($Posts as $post)
                        <div class="max-w-3xl mx-auto bg-white">
                            <!-- Header with back button and post info -->
                            <div class="sticky top-0 bg-white z-10 border-gray-200 px-3 py-2 flex items-center">
                                <div class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-orange-500 flex items-center justify-center mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm4.47 13.53a.75.75 0 01-1.06 0L10 10.12 6.59 13.53a.75.75 0 11-1.06-1.06L9.44 8.06a.75.75 0 011.06 0l3.97 3.97a.75.75 0 010 1.06z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center">
                                            <span class="font-medium text-sm text-gray-900">r/mildlyinfuriating</span>
                                            <span class="mx-1 text-gray-500 text-xs">•</span>
                                            <span class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>

                                        </div>
                                        <div class="text-xs text-gray-500">Nightshadepastry</div>
                                    </div>
                                </div>

                                <button class="ml-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Post content -->
                            <div class="px-3 py-4">
                                <h1 class="text-xl font-bold text-gray-900 mb-3">{{$post->title}}</h1>

                                <p class="text-gray-800 mb-4">
                                    {!! $post->content !!}
                                </p>
                                x
                                @if($post->multimedia != null)
                                    <div class="rounded-md overflow-hidden mb-4 max-h-[400px]">
                                        <img src="{{$post->multimedia}}" alt="Front door with No Solicitors sign and bucket" class=" object-cover" />
                                    </div>
                                @endif

                                <!-- Post actions -->
                                <div class="flex items-center space-x-2 pt-2">
                                    <!-- Vote buttons -->
                                    <div class="flex items-center bg-gray-100 rounded-full px-3 py-1.5">
                                        <button class="flex items-center justify-center text-gray-500 hover:text-orange-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                            </svg>
                                        </button>
                                        <span class="mx-2 text-sm font-medium">{{ App\Helpers\HelpersNative::formatNumberShort($post->up_votes) }}</span>
                                        <button class="flex items-center justify-center text-gray-500 hover:text-blue-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Comments button -->
                                    <a href="../r/$%7Busername%7D/Post/$%7BpostId%7D" class="flex items-center bg-gray-100 rounded-full px-3 py-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        <span class="text-sm font-medium">11k</span>
                                    </a>

                                    <!-- Award button -->
                                    <button class="flex items-center justify-center bg-gray-100 rounded-full w-9 h-9 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                        </svg>
                                    </button>

                                    <!-- Share button -->
                                    <button class="flex items-center bg-gray-100 rounded-full px-4 py-1.5 text-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                        </svg>
                                        <span class="text-sm font-medium">Partager</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Comment section divider -->
                            <div class="border-t border-gray-200 my-2"></div>





                        </div>


                    @endforeach
                </div>
            </div>
        </div>

        <!-- JavaScript for Dropdowns -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Filter dropdown
                const filterDropdown = document.getElementById('filter-dropdown');
                const filterMenu = document.getElementById('filter-menu');

                filterDropdown.addEventListener('click', function() {
                    filterMenu.classList.toggle('hidden');
                });

                // View dropdown
                const viewDropdown = document.getElementById('view-dropdown');
                const viewMenu = document.getElementById('view-menu');

                viewDropdown.addEventListener('click', function() {
                    viewMenu.classList.toggle('hidden');
                });

                // Close dropdowns when clicking outside
                document.addEventListener('click', function(event) {
                    if (!filterDropdown.contains(event.target)) {
                        filterMenu.classList.add('hidden');
                    }

                    if (!viewDropdown.contains(event.target)) {
                        viewMenu.classList.add('hidden');
                    }
                });

                // Tab switching animation
                const tabs = document.querySelectorAll('.tab-inactive');
                const activeTab = document.querySelector('.tab-active');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        // Remove active class from current active tab
                        activeTab.classList.remove('tab-active', 'text-indigo-600', 'border-b-2', 'border-indigo-600');
                        activeTab.classList.add('tab-inactive', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');

                        // Add active class to clicked tab
                        this.classList.remove('tab-inactive', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                        this.classList.add('tab-active', 'text-indigo-600', 'border-b-2', 'border-indigo-600');
                    });
                });

                // Add scrollbar hiding utility
                const style = document.createElement('style');
                style.textContent = `
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        `;
                document.head.appendChild(style);
            });
        </script>
    </div>
</x-UserHompage>
