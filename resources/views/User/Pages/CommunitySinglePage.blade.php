<div class="container mx-auto p-0 max-w-6xl">

    <!-- Header Banner -->
    <div class="bg-gray-200 p-5 relative">
        <button class="absolute right-4 top-4 text-gray-500 hover:text-gray-700">
            <i class="fas fa-pencil-alt"></i>
        </button>
    </div>

    <!-- Community Header -->
    <div class="flex items-center px-4 py-2 bg-white border-b border-gray-300">
        <div class="mr-4">
            <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center text-white">
                <span class="text-2xl font-bold">r/</span>
            </div>
        </div>
        <div class="flex-grow">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold mr-2">r/{{$Community->name}}</h1>
                <button class="text-gray-500 hover:text-gray-700 ml-2">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
                <i class="fas fa-plus mr-2"></i>
                Créer une publication
            </button>
            <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
                <i class="fas fa-bell"></i>
            </button>
            <button class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">
                Outils de modération
            </button>
            <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-wrap">
        <!-- Left Column -->
        <div class="w-full lg:w-2/3 p-4">
            <div class="mb-4 flex items-center">
                <button class="flex items-center mr-4 text-gray-600 font-medium">
                    Meilleurs
                    <i class="fas fa-chevron-down ml-1"></i>
                </button>
                <button class="flex items-center text-gray-600">
                    <i class="fas fa-th-list"></i>
                </button>
            </div>

            <!-- Community Setup -->
            <div class="bg-white rounded-md border border-gray-300 overflow-hidden">
                <div class="p-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Finish your community's foundation</h2>
                    <p class="text-gray-600">Styling and content are essential for new communities to grow</p>
                </div>

                <!-- Style Task -->
                <div class="flex items-start p-4 border-b border-gray-200">
                    <div class="mr-4 pt-1">
                        <div class="w-8 h-8 flex items-center justify-center">
                            <img src="/api/placeholder/32/32" alt="Paint palette" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-medium">Style your community</h3>
                        <p class="text-gray-600 text-sm">Add an icon and banner to help people recognize your community</p>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-gray-800 text-white text-xs px-2 py-1 rounded-full">0/2</span>
                        <span class="ml-6 font-medium">Style</span>
                    </div>
                </div>

                <!-- Create Posts Task -->
                <div class="flex items-start p-4">
                    <div class="mr-4 pt-1">
                        <div class="w-8 h-8 flex items-center justify-center">
                            <img src="/api/placeholder/32/32" alt="Pencil" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-medium">Create three posts</h3>
                        <p class="text-gray-600 text-sm">Content drives people to communities</p>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-gray-800 text-white text-xs px-2 py-1 rounded-full">0/3</span>
                        <span class="ml-6 font-medium">Create</span>
                    </div>
                </div>
            </div>
        </div>
        @if($hasReponsable)
            <!-- Right Column -->
            <div class="w-full lg:w-1/3 p-4">
            <!-- Community Info Card -->
            <div class="bg-white rounded-md border border-gray-300 mb-4">
                <div class="p-4 flex justify-between items-center border-b border-gray-200">
                    <h2 class="font-medium">{{$Community->name}}</h2>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>

                <div class="p-4">
                    <p class="text-gray-600 mb-4">{{$Community->description}}</p>

                    <div class="flex items-center mb-2 text-sm text-gray-600">
                        <i class="far fa-calendar-alt mr-2"></i>
                        Créée le 20 avr. 2025
                    </div>

                    <div class="flex items-center mb-2 text-sm text-gray-600">
                        <i class="fas fa-lock mr-2"></i>
                        {{$Community->type}}
                    </div>

                    <button class="w-full py-2 border border-gray-300 rounded-full flex items-center justify-center text-gray-800 hover:bg-gray-100">
                        <i class="fas fa-plus mr-2"></i>
                        Ajouter un guide de la communauté
                    </button>
                </div>
            </div>

            <!-- Community Stats -->
            <div class="flex mb-4">
                <div class="w-1/2 bg-white rounded-md border border-gray-300 p-4">
                    <div class="text-2xl font-bold">{{count($Community->members)}}</div>
                    <div class="text-sm text-gray-600">Membre</div>
                </div>
                <div class="w-1/2 bg-white rounded-md border border-gray-300 p-4 ml-2">
                    <div class="text-2xl font-bold">0<span class="text-sm text-gray-600">/{{count($Community->members)}}</span></div>
                    <div class="text-sm text-gray-600 flex items-center">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                        En ligne
                    </div>
                </div>
            </div>

            <!-- Moderation Team Section -->
            <div class="bg-white rounded-md border border-gray-300 mb-4">
                <div class="p-4 border-b border-gray-200">
                    <h2 class="font-medium text-gray-500">ÉQUIPE DE MODÉRATION</h2>
                </div>

                <div class="p-4">
                    <button class="w-full mb-3 py-2 bg-gray-100 rounded-md flex items-center justify-center text-gray-800 hover:bg-gray-200">
                        <i class="far fa-envelope mr-2"></i>
                        Envoyer un message aux modos
                    </button>

                    <button id="inviteModo" class=" outline-0 flex items-center mb-3">
                        <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center mr-2">
                            <i class="fas fa-plus text-xs"></i>
                        </div>
                        <span class="text-blue-600">Inviter un·e modo</span>
                    </button>
                    @foreach($responsables as $user)
                        <div class="flex items-center mb-3">
                            <div class="w-6 h-6 rounded-full bg-teal-500 mr-2">
                                <img src="{{$user->user->profilePicture}}" alt="User avatar" class="w-full h-full rounded-full">
                            </div>
                            <div class="flex justify-between w-full ">
                                <div>u/{{$user->user->username}}</div><div>{{$user->role}}</div>
                            </div>
                        </div>
                    @endforeach


                    <button class="w-full mt-2 py-2 bg-gray-100 rounded-md flex items-center justify-center text-gray-800 hover:bg-gray-200">
                        Voir toute l'équipe de modération
                    </button>
                </div>
            </div>

            <!-- Community Settings -->
            <div class="bg-white rounded-md border border-gray-300 mb-4">
                <div class="p-4 border-b border-gray-200">
                    <h2 class="font-medium text-gray-500">PARAMÈTRES DE LA COMMUNAUTÉ</h2>
                </div>

                <div class="p-4">
                    <div class="flex justify-between items-center mb-4">
                        <span>Apparence de la communauté</span>
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>

                    <button class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Modifier les widgets
                    </button>
                </div>
            </div>
        </div>
        @elseif(!$hasReponsable)
            <div class="w-full lg:w-1/3 p-4">
                    <!-- Stats Section -->
                    <div class="border rounded p-3 mb-4">
                        <div class="text-sm font-medium mb-2">{{$Community->name}}</div>
                        <p class="text-xs text-gray-600 mb-2">{{$Community->description}}</p>

                        <div class="flex items-center text-xs text-gray-500 mt-3">
                            <span class="mr-4">Edits: <span class="text-green-600">10</span></span>
                            <span class="mr-4">Views: <span class="text-gray-600">12</span></span>
                            <span>Promoters: <span class="text-gray-600">1%</span></span>
                        </div>

                        <div class="flex items-center mt-2">
                            <div class="h-1 flex-grow rounded-full bg-gray-200">
                                <div class="h-1 rounded-full bg-green-500 w-1/4"></div>
                            </div>
                        </div>

                        <div class="text-xs text-gray-500 mt-3">
                            Last update: 14 Jun 2025
                        </div>
                    </div>

                    <!-- Flags Section -->
                    <div class="mb-4">
                        <div class="font-medium text-gray-700 uppercase text-xs tracking-wider mb-2">Flags or Markers</div>

                        <div class="flex items-center mb-2">
                            <div class="w-6 h-6 bg-teal-500 rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs">P</span>
                            </div>
                            <span class="text-sm">Private - Not Public</span>
                        </div>
                    </div>

                    <!-- Rules Section -->
                    <div class="mb-4">
                        <div class="font-medium text-gray-700 uppercase text-xs tracking-wider mb-2">Rules or Requirements</div>

                        <div class="dropdown mb-1">
                            <div class="dropdown-header flex items-center cursor-pointer p-1 hover:bg-gray-100 rounded">
                                <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-sm ml-2">No Repeat Reports</span>
                            </div>
                            <div class="dropdown-content pl-6 text-xs text-gray-600"></div>
                        </div>

                        <div class="dropdown mb-1">
                            <div class="dropdown-header flex items-center cursor-pointer p-1 hover:bg-gray-100 rounded">
                                <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-sm ml-2">No Plagiarism</span>
                            </div>
                            <div class="dropdown-content pl-6 text-xs text-gray-600"></div>
                        </div>

                        <div class="dropdown mb-1">
                            <div class="dropdown-header flex items-center cursor-pointer p-1 hover:bg-gray-100 rounded">
                                <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-sm ml-2">No Modified Animals or Hunting Talk</span>
                            </div>
                            <div class="dropdown-content pl-6 text-xs text-gray-600"></div>
                        </div>

                        <div class="dropdown mb-1">
                            <div class="dropdown-header flex items-center cursor-pointer p-1 hover:bg-gray-100 rounded">
                                <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-sm ml-2">No Bullying/Personal Attack/Hate Speech</span>
                            </div>
                            <div class="dropdown-content pl-6 text-xs text-gray-600"></div>
                        </div>

                        <div class="dropdown mb-1">
                            <div class="dropdown-header flex items-center cursor-pointer p-1 hover:bg-gray-100 rounded">
                                <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-sm ml-2">No Blogs, Articles, Social Media or Website Links</span>
                            </div>
                            <div class="dropdown-content pl-6 text-xs text-gray-600"></div>
                        </div>
                    </div>

                    <!-- Categories Section -->
                    <div>
                        <div class="font-medium text-gray-700 uppercase text-xs tracking-wider mb-2">Categories</div>

                        <div class="flex flex-wrap gap-2">
                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">Quality Post</span>
                            <span class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded">Advanced</span>
                            <span class="bg-purple-500 text-white text-xs px-2 py-1 rounded">Help</span>
                            <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Solved</span>
                            <span class="bg-teal-500 text-white text-xs px-2 py-1 rounded">Contributor</span>
                            <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">Tutorial</span>
                            <span class="bg-pink-500 text-white text-xs px-2 py-1 rounded">Bug</span>
                            <span class="bg-green-400 text-white text-xs px-2 py-1 rounded">Feature</span>
                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">Warning</span>
                            <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded">Caution</span>
                            <span class="bg-indigo-400 text-white text-xs px-2 py-1 rounded">Building</span>
                            <span class="bg-purple-400 text-white text-xs px-2 py-1 rounded">Positive</span>
                            <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded">Learn</span>
                            <span class="bg-gray-400 text-white text-xs px-2 py-1 rounded">New</span>
                        </div>
                    </div>
                </div>
        @endif
    </div>
</div>

