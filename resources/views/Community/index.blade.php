<x-UserHompage>
    <!-- Invite Moderator Modal -->
    <div id="inviteModoForm" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[120]">
        <div class="rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden bg-white border border-gray-100 transform transition-all">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-5 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                    </svg>
                    Inviter un·e modo
                </h2>
                <button id="closeBtn" class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-full hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div id="1" class="p-5">
                <!-- Search Bar -->
                <div class="relative mb-5">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input id="SearchUserInput" type="text" class="pl-10 w-full bg-gray-50 border border-gray-200 rounded-lg py-3 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Rechercher des utilisateurs à inviter">
                </div>

                <!-- Users List -->
                <div id="UsersInvite" class="space-y-3 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                    <!-- User items will be populated here -->
                </div>

                <!-- Confirmation Modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true" class="flex hidden justify-self-center overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-lg border border-gray-100">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Accept or Decline
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p id="messageSentInvite" class="text-base leading-relaxed text-gray-500">
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                <button id="AcceptBtn" data-modal-hide="default-modal" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">J'accepte</button>
                                <button id="DeclineBtn" data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 transition-colors">Refuser</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-5 py-4 flex justify-between">
                <div>
                    <button data-progress="0" id="cancelBtn" class="px-5 py-2 bg-gray-100 text-gray-900 font-medium rounded-full hover:bg-gray-200 transition-colors">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-0 max-w-6xl">
        <div class="sticky top-[-100px] ">
            <!-- Header Banner with Gradient Overlay -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-48 md:h-64 relative overflow-hidden rounded-b-lg">
                <div class="h-full bg-gradient-to-r from-blue-50 to-indigo-50 group-hover:from-blue-100 group-hover:to-indigo-100 transition-all duration-300">
                    <img
                        src="{{ $Community->banner }}"
                        alt="{{ $Community->name }}"
                        class="w-full h-full object-cover"
                        onerror="this.onerror=null; this.src='https://i.pinimg.com/1200x/17/3b/de/173bde843c99eb1fdef8a32e209dfa23.jpg';"
                    >
                </div>
                <button class="absolute right-4 top-4 bg-white/20 backdrop-blur-sm p-2 rounded-full text-white hover:bg-white/30 transition-all">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </div>

            <!-- Community Header -->
            <div class="flex flex-col md:flex-row md:items-center px-4 py-3 bg-white border-b border-gray-200 shadow-sm z-10">
                <div class="flex items-center">
                    <div class="mr-4 -mt-10 md:-mt-12 relative z-20">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white border-4 border-white shadow-md">
                            <div class="w-full h-full rounded-full bg-blue-500 overflow-hidden">
                                @if($Community->icon === "hello")
                                    <div class="w-full h-full rounded-full bg-red-500 overflow-hidden flex items-center justify-center">
                                        <strong>{{Str::substr($Community->name, 0, 1)}}</strong>
                                    </div>
                                @else
                                    <img src="{{$Community->icon}}" alt="{{$Community->name}}" class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <div class="flex items-center flex-wrap">
                            <h1 class="text-xl md:text-2xl font-bold mr-2">r/{{$Community->name}}</h1>
                            <button class="text-gray-500 hover:text-gray-700 ml-2">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex gap-2 mt-3 md:mt-0 md:ml-auto overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                    <a href="{{route('Post.index')}}?Type=" class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full hover:bg-gray-100 transition-colors whitespace-nowrap">
                        <i class="fas fa-plus mr-2 text-blue-500"></i>
                        <span>Créer une publication</span>
                    </a>
                    <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-bell text-gray-600"></i>
                    </button>
                    <button class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors whitespace-nowrap">
                        <i class="fas fa-shield-alt mr-2"></i>
                        <span>Outils de modération</span>
                    </button>
                    <button class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-ellipsis-h text-gray-600"></i>
                    </button>
                </div>
            </div>

        </div>
        <!-- Main Content -->
        <div class="flex flex-wrap">
            <!-- Left Column -->
            <div class="w-full lg:w-2/3 p-4">
                <div class="mb-4 flex items-center bg-white p-3 rounded-lg shadow-sm">
                    <button class="flex items-center mr-4 text-gray-700 font-medium hover:text-blue-600 transition-colors">
                        <span>Meilleurs</span>
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div class="ml-auto flex space-x-2">
                        <button class="flex items-center text-gray-600 hover:text-blue-600 transition-colors p-2 rounded-md hover:bg-gray-100">
                            <i class="fas fa-th-list"></i>
                        </button>
                        <button class="flex items-center text-gray-600 hover:text-blue-600 transition-colors p-2 rounded-md hover:bg-gray-100">
                            <i class="fas fa-th-large"></i>
                        </button>
                    </div>
                </div>

                <!-- Community Setup -->
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-5 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">Finalisez les fondations de votre communauté</h2>
                        <p class="text-gray-600 mt-1">Le style et le contenu sont essentiels pour la croissance des nouvelles communautés</p>
                    </div>

                    <!-- Style Task -->
                    <div class="flex items-start p-5 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <div class="mr-4 pt-1">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-500">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-medium text-gray-900">Stylisez votre communauté</h3>
                            <p class="text-gray-600 text-sm mt-1">Ajoutez une icône et une bannière pour aider les gens à reconnaître votre communauté</p>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="bg-gray-800 text-white text-xs px-3 py-1 rounded-full font-medium">0/2</span>
                            <span class="mt-2 font-medium text-blue-600 text-sm">Style</span>
                        </div>
                    </div>

                    <!-- Create Posts Task -->
                    <div class="flex items-start p-5 hover:bg-gray-50 transition-colors">
                        <div class="mr-4 pt-1">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-500">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-medium text-gray-900">Créez trois publications</h3>
                            <p class="text-gray-600 text-sm mt-1">Le contenu attire les gens vers les communautés</p>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="bg-gray-800 text-white text-xs px-3 py-1 rounded-full font-medium">0/3</span>
                            <span class="mt-2 font-medium text-purple-600 text-sm">Créer</span>
                        </div>
                    </div>
                </div>

                <!-- Empty State for Posts -->
                <div class="mt-6 bg-white rounded-xl border border-gray-200 p-8 text-center">
                    <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-file-alt text-gray-400 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune publication pour le moment</h3>
                    <p class="text-gray-600 mb-4">Soyez le premier à partager quelque chose d'intéressant</p>
                    <a href="{{route('Post.index')}}?Type=" class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Créer une publication
                    </a>
                </div>
            </div>

            @if($hasReponsable)
                <!-- Right Column for Responsables -->
                <div class="w-full lg:w-1/3 p-4">
                    <!-- Community Info Card -->
                    <div class="bg-white rounded-xl border border-gray-200 mb-4 shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <div class="p-4 flex justify-between items-center border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                            <h2 class="font-medium text-gray-900">{{$Community->name}}</h2>
                            <button class="text-gray-500 hover:text-blue-600 transition-colors p-1 rounded-full hover:bg-white/50">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>

                        <div class="p-5">
                            <p class="text-gray-700 mb-5 leading-relaxed">{{$Community->description}}</p>

                            <div class="flex items-center mb-3 text-sm text-gray-600">
                                <i class="far fa-calendar-alt mr-3 text-blue-500"></i>
                                <span>Créée le 20 avr. 2025</span>
                            </div>

                            <div class="flex items-center mb-4 text-sm text-gray-600">
                                <i class="fas fa-lock mr-3 text-blue-500"></i>
                                <span>{{$Community->type}}</span>
                            </div>

                            <button class="w-full py-2.5 border border-gray-300 rounded-lg flex items-center justify-center text-gray-800 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-plus mr-2 text-blue-500"></i>
                                <span>Ajouter un guide de la communauté</span>
                            </button>
                        </div>
                    </div>

                    <!-- Community Stats -->
                    <div class="flex mb-4 space-x-3">
                        <div class="w-1/2 bg-white rounded-xl border border-gray-200 p-4 shadow-sm hover:shadow-md transition-shadow">
                            <div class="text-2xl font-bold text-gray-900">{{count($Community->members)}}</div>
                            <div class="text-sm text-gray-600 flex items-center">
                                <i class="fas fa-users text-blue-500 mr-1.5"></i>
                                <span>Membres</span>
                            </div>
                        </div>
                        <div class="w-1/2 bg-white rounded-xl border border-gray-200 p-4 shadow-sm hover:shadow-md transition-shadow">
                            <div class="text-2xl font-bold text-gray-900">0<span class="text-sm text-gray-500">/{{count($Community->members)}}</span></div>
                            <div class="text-sm text-gray-600 flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                <span>En ligne</span>
                            </div>
                        </div>
                    </div>

                    <!-- Moderation Team Section -->
                    <div class="bg-white rounded-xl border border-gray-200 mb-4 shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <div class="p-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                            <h2 class="font-medium text-gray-700 uppercase text-sm tracking-wide">Équipe de modération</h2>
                        </div>

                        <div class="p-5">
                            <button class="w-full mb-4 py-2.5 bg-gray-100 rounded-lg flex items-center justify-center text-gray-800 hover:bg-gray-200 transition-colors">
                                <i class="far fa-envelope mr-2 text-blue-500"></i>
                                <span>Envoyer un message aux modos</span>
                            </button>

                            <button id="inviteModo" class="outline-0 flex items-center mb-4 w-full text-left hover:bg-gray-50 p-2 rounded-lg transition-colors">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3 text-blue-500">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <span class="text-blue-600 font-medium">Inviter un·e modo</span>
                            </button>

                            <div class="space-y-3 max-h-60 overflow-y-auto custom-scrollbar pr-1">
                                @foreach($responsables as $user)
                                    @if($user->role === "owner" || $user->role === "admin" || $user->role === "moderator")
                                        <div class="flex items-center p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                            <div class="w-8 h-8 rounded-full bg-teal-500 mr-3 overflow-hidden">
                                                <img src="{{$user->user->profilePicture}}" alt="{{$user->user->username}}" class="w-full h-full object-cover">
                                            </div>
                                            <div class="flex justify-between w-full items-center">
                                                <div class="font-medium text-gray-900">u/{{$user->user->username}}</div>
                                                <div class="text-sm px-2 py-1 rounded-full
                                                    @if($user->role === 'owner') bg-purple-100 text-purple-700
                                                    @elseif($user->role === 'admin') bg-red-100 text-red-700
                                                    @else bg-blue-100 text-blue-700 @endif">
                                                    {{$user->role}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <button class="w-full mt-4 py-2.5 bg-gray-100 rounded-lg flex items-center justify-center text-gray-800 hover:bg-gray-200 transition-colors">
                                <span>Voir toute l'équipe de modération</span>
                                <i class="fas fa-chevron-right ml-2 text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Community Settings -->
                    <div class="bg-white rounded-xl border border-gray-200 mb-4 shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <div class="p-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                            <h2 class="font-medium text-gray-700 uppercase text-sm tracking-wide">Paramètres de la communauté</h2>
                        </div>

                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-800">Apparence de la communauté</span>
                                <button class="text-gray-500 hover:text-blue-600 transition-colors p-1 rounded-full hover:bg-gray-100">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </div>

                            <button class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                                <i class="fas fa-puzzle-piece mr-2"></i>
                                <span>Modifier les widgets</span>
                            </button>
                        </div>
                    </div>
                </div>
            @elseif(!$hasReponsable)
                <!-- Right Column for Non-Responsables -->
                <div class="w-full lg:w-1/3 p-4">
                    <!-- Stats Section -->
                    <div class="bg-white rounded-xl border border-gray-200 mb-4 p-5 shadow-sm hover:shadow-md transition-shadow">
                        <div class="text-lg font-medium mb-3 text-gray-900">{{$Community->name}}</div>
                        <p class="text-sm text-gray-700 mb-4 leading-relaxed">{{$Community->description}}</p>

                        <div class="flex flex-wrap items-center text-xs text-gray-600 mt-4 gap-4">
                            <span class="flex items-center">
                                <i class="fas fa-edit text-green-500 mr-1.5"></i>
                                Edits: <span class="text-green-600 font-medium ml-1">10</span>
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-eye text-blue-500 mr-1.5"></i>
                                Views: <span class="text-gray-900 font-medium ml-1">12</span>
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-chart-line text-purple-500 mr-1.5"></i>
                                Promoters: <span class="text-gray-900 font-medium ml-1">1%</span>
                            </span>
                        </div>

                        <div class="flex items-center mt-3">
                            <div class="h-2 flex-grow rounded-full bg-gray-200 overflow-hidden">
                                <div class="h-2 rounded-full bg-green-500 w-1/4"></div>
                            </div>
                        </div>

                        <div class="text-xs text-gray-500 mt-3 flex items-center">
                            <i class="far fa-clock mr-1.5"></i>
                            Dernière mise à jour: 14 Jun 2025
                        </div>
                    </div>

                    <!-- Flags Section -->
                    <div class="bg-white rounded-xl border border-gray-200 mb-4 p-5 shadow-sm hover:shadow-md transition-shadow">
                        <div class="font-medium text-gray-700 uppercase text-xs tracking-wider mb-3">Flags ou Marqueurs</div>

                        <div class="flex items-center p-2 bg-gray-50 rounded-lg">
                            <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center mr-3 text-white">
                                <i class="fas fa-lock"></i>
                            </div>
                            <span class="text-sm text-gray-800">Private - Not Public</span>
                        </div>
                    </div>

                    <!-- Rules Section -->
                    <div class="bg-white rounded-xl border border-gray-200 mb-4 p-5 shadow-sm hover:shadow-md transition-shadow">
                        <div class="font-medium text-gray-700 uppercase text-xs tracking-wider mb-3">Règles ou Exigences</div>

                        <div class="space-y-2">
                            <div class="dropdown">
                                <div class="dropdown-header flex items-center cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="text-sm ml-2 text-gray-800">No Repeat Reports</span>
                                </div>
                                <div class="dropdown-content pl-6 text-xs text-gray-600 hidden"></div>
                            </div>

                            <div class="dropdown">
                                <div class="dropdown-header flex items-center cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="text-sm ml-2 text-gray-800">No Plagiarism</span>
                                </div>
                                <div class="dropdown-content pl-6 text-xs text-gray-600 hidden"></div>
                            </div>

                            <div class="dropdown">
                                <div class="dropdown-header flex items-center cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="text-sm ml-2 text-gray-800">No Modified Animals or Hunting Talk</span>
                                </div>
                                <div class="dropdown-content pl-6 text-xs text-gray-600 hidden"></div>
                            </div>

                            <div class="dropdown">
                                <div class="dropdown-header flex items-center cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="text-sm ml-2 text-gray-800">No Bullying/Personal Attack/Hate Speech</span>
                                </div>
                                <div class="dropdown-content pl-6 text-xs text-gray-600 hidden"></div>
                            </div>

                            <div class="dropdown">
                                <div class="dropdown-header flex items-center cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <svg class="dropdown-arrow w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="  viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="text-sm ml-2 text-gray-800">No Blogs, Articles, Social Media or Website Links</span>
                                </div>
                                <div class="dropdown-content pl-6 text-xs text-gray-600 hidden"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Section -->
                    <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-md transition-shadow">
                        <div class="font-medium text-gray-700 uppercase text-xs tracking-wider mb-3">Categories</div>

                        <div class="flex flex-wrap gap-2">
                            <span class="bg-purple-100 text-purple-800 text-xs px-2.5 py-1.5 rounded-full">Quality Post</span>
                            <span class="bg-amber-100 text-amber-800 text-xs px-2.5 py-1.5 rounded-full">Advanced</span>
                            <span class="bg-purple-500 text-white text-xs px-2.5 py-1.5 rounded-full">Help</span>
                            <span class="bg-green-500 text-white text-xs px-2.5 py-1.5 rounded-full">Solved</span>
                            <span class="bg-teal-500 text-white text-xs px-2.5 py-1.5 rounded-full">Contributor</span>
                            <span class="bg-blue-500 text-white text-xs px-2.5 py-1.5 rounded-full">Tutorial</span>
                            <span class="bg-pink-500 text-white text-xs px-2.5 py-1.5 rounded-full">Bug</span>
                            <span class="bg-green-400 text-white text-xs px-2.5 py-1.5 rounded-full">Feature</span>
                            <span class="bg-red-500 text-white text-xs px-2.5 py-1.5 rounded-full">Warning</span>
                            <span class="bg-orange-500 text-white text-xs px-2.5 py-1.5 rounded-full">Caution</span>
                            <span class="bg-indigo-400 text-white text-xs px-2.5 py-1.5 rounded-full">Building</span>
                            <span class="bg-purple-400 text-white text-xs px-2.5 py-1.5 rounded-full">Positive</span>
                            <span class="bg-yellow-500 text-white text-xs px-2.5 py-1.5 rounded-full">Learn</span>
                            <span class="bg-gray-400 text-white text-xs px-2.5 py-1.5 rounded-full">New</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Custom Scrollbar and Dropdown JavaScript -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        // Dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown-header');

            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const arrow = this.querySelector('.dropdown-arrow');

                    content.classList.toggle('hidden');
                    arrow.classList.toggle('rotate-90');
                });
            });
        });
    </script>
</x-UserHompage>
