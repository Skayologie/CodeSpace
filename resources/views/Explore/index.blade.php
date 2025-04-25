<x-UserHompage>
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Main Header with subtle gradient underline -->
        <div class="mb-8 border-b border-gray-100 pb-4">
            <h1 class="text-3xl font-bold text-gray-900 inline-block relative">
                Explorer les communautés
            </h1>
        </div>

        <!-- Category Filters with improved scrolling and active state -->
        <div class="relative mb-8">
            <div class="flex flex-wrap gap-2 mb-2 overflow-x-auto pb-2 scrollbar-hide">
                @foreach($Themes as $theme)
                    <button class="px-4 py-2 bg-gray-100 rounded-full text-gray-800 hover:bg-blue-100 hover:text-blue-700 transition-all duration-200 border border-transparent hover:border-blue-200 font-medium shadow-sm">{{$theme->name}}</button>
                @endforeach

                <button class="px-3 py-2 bg-gray-100 rounded-full text-gray-800 hover:bg-gray-200 transition ml-1 flex items-center justify-center shadow-sm">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <!-- Subtle gradient fade on scroll -->
            <div class="absolute right-0 top-0 h-full w-12 bg-gradient-to-l from-white to-transparent pointer-events-none"></div>
        </div>

        <!-- Recommended For You Section with improved cards -->
        <section class="mb-12">
            <h2 class="text-xl font-bold mb-6 text-gray-900 flex items-center">
            <span class="mr-2 text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </span>
                Recommandées pour toi
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($Communities as $community)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 group">
                        <!-- Card header with hover effect -->
                        <div class="h-16 bg-gradient-to-r from-blue-50 to-indigo-50 group-hover:from-blue-100 group-hover:to-indigo-100 transition-all duration-300">
                            <img
                                src="{{ $community->banner }}"
                                alt="{{ $community->name }}"
                                class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.src='https://i.pinimg.com/1200x/17/3b/de/173bde843c99eb1fdef8a32e209dfa23.jpg';"
                            >
                        </div>
                        <div class="p-5 relative">
                            <!-- Community avatar with improved positioning -->
                            <div class="absolute -top-8 left-5 w-14 h-14 rounded-full bg-white p-1 shadow-md">
                                <div class="w-full h-full rounded-full bg-blue-500 overflow-hidden">
                                    @if($community->icon === "hello")
                                        <div class="w-full h-full rounded-full bg-red-500 overflow-hidden flex items-center justify-center">
                                            <strong>{{Str::substr($community->name, 0, 1)}}</strong>
                                        </div>
                                    @else
                                        <img src="{{$community->icon}}" alt="{{$community->name}}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                            </div>

                            <div class="flex justify-between items-start mt-6 mb-4">
                                <div>
                                    <a href="{{route('Explore.community',$community->id)}}" class="group-hover:text-blue-600 transition-colors">
                                        <h3 id="community{{$community->id}}" class="communities font-semibold text-lg  " data-value="{{$community->id}}">
                                            {{$community->name}}
                                            @if($community->type === "private")
                                                <i class="text-gray-500 fa-solid fa-lock ml-2 text-sm"></i>
                                            @else
                                                <i class="text-gray-500 fa-solid fa-earth-americas ml-2 text-sm"></i>
                                            @endif
                                        </h3>
                                    </a>
                                    <p class="text-sm text-gray-500 flex items-center mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                        </svg>
                                        {{count($community->members)}} membres
                                    </p>
                                </div>

                                @foreach($community->members as $memberCheck)
                                    @php $isNotInCommunity = false; @endphp
                                    @if($memberCheck->id != session()->get("user")->id )
                                        @php
                                            $isNotInCommunity = true;
                                        @endphp
                                    @endif
                                @endforeach

                                @if($isNotInCommunity)
                                    <button id="{{$community->id}}" class="rejoindreButton px-5 py-1.5 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all duration-200 text-sm font-medium shadow-sm hover:shadow flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                        </svg>
                                        Rejoindre
                                    </button>
                                @else
                                    <button class="px-5 py-1.5 bg-white text-gray-700 rounded-full border border-gray-300 transition-all duration-200 text-sm font-medium flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Member
                                    </button>
                                @endif
                            </div>

                            <!-- Description with better typography -->
                            <div class="bg-gray-50 p-3 rounded-lg mt-2">
                                <p class="text-sm text-gray-700 line-clamp-3">{{$community->description}}</p>
                            </div>

                            <!-- Activity indicator -->
                            <div class="flex items-center mt-4 text-xs text-gray-500">
                            <span class="flex items-center">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-1"></span>
                                Active
                            </span>
                                <span class="mx-2">•</span>
                                <span>Créé récemment</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Improved "Show more" button -->
            <div class="flex justify-center mt-8">
                <button class="px-8 py-2.5 bg-gray-100 rounded-full text-gray-700 hover:bg-gray-200 transition-all duration-200 font-medium flex items-center shadow-sm hover:shadow">
                    Afficher plus
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </section>
    </div>

    <!-- Add a subtle scrollbar style -->
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            height: 4px;
        }

        .scrollbar-hide::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .scrollbar-hide::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }

        .scrollbar-hide::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-UserHompage>
