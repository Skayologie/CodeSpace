@php use Carbon\Carbon; @endphp
<x-UserHompage>
    <div id="UserArea" class="flex justify-center">
        <div class="bg-transparent top-[80px] absolute rounded-xl  overflow-hidden w-full max-w-6xl h-[90vh] flex">
    <!-- Sidebar -->
    <div class="w-80 border-r border-gray-200 hidden md:flex flex-col">
        <!-- Sidebar Header -->
        <div class="p-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800">Chats</h2>
                <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
            <div class="mt-4 relative">
                <input type="text" placeholder="Search conversations..." class="w-full bg-gray-100 rounded-lg py-2 px-4 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:bg-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Conversation List -->
        <div class="flex-1 overflow-y-auto scrollbar-hide">
            <!-- Active Conversation -->
{{--            <div class="p-3 bg-violet-50 border-l-4 border-violet-500 cursor-pointer">--}}
{{--                <div class="flex items-center">--}}
{{--                    <div class="relative">--}}
{{--                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson" class="w-12 h-12 rounded-full object-cover">--}}
{{--                        <div class="absolute bottom-0 right-0 bg-green-500 w-3 h-3 rounded-full border-2 border-white"></div>--}}
{{--                    </div>--}}
{{--                    <div class="ml-3 flex-1">--}}
{{--                        <div class="flex justify-between items-center">--}}
{{--                            <h3 class="text-sm font-semibold text-gray-900">Sarah Johnson</h3>--}}
{{--                            <span class="text-xs text-violet-600 font-medium">2m ago</span>--}}
{{--                        </div>--}}
{{--                        <p class="text-xs text-gray-600 mt-1 line-clamp-1">I just sent you the design files for the new project!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            @foreach($conversations as $conversation)
                <a href="{{route('Chat.show',$conversation->friend_id)}}" class="p-3 hover:bg-gray-100 cursor-pointer transition-colors">
                    <div id="{{$conversation->friend_id}}" class="Conversation ">
                        <div class="flex items-center">
                            <div class="relative">
                                <img src="{{$conversation->profile_picture}}" alt="Alex Chen" class="w-12 h-12 rounded-full object-cover">
                                <div class="absolute bottom-0 right-0 bg-gray-300 w-3 h-3 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-3 flex-1">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-sm font-semibold text-gray-900">{{$conversation->friend_username}}</h3>
                                    <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($conversation->last_message_at)->diffForHumans() }}</span>
                                </div>
                                <p class="text-xs text-gray-600 mt-1 line-clamp-1">{{$conversation->last_message_content}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div id="IndexChatAlert" class=" w-full bg-white rounded-lg shadow-lg p-8 text-center flex flex-col justify-center">
                <!-- Reddit-inspired alien logo -->
                <div class="flex justify-center mb-6">
                    <div class="w-24 h-24 bg-orange-500 rounded-full flex items-center justify-center floating">
                        <svg class="w-16 h-16 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"></path>
                            <path d="M6 10a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1z"></path>
                            <path d="M7 13a1 1 0 100 2h6a1 1 0 100-2H7z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Code&Chat</h1>
                <h2 class="text-lg text-gray-600 mb-6">Your conversations start here</h2>

                <!-- Description text -->
                <p class="text-gray-600 mb-2">
                    Select a conversation from the sidebar or start a new one.
                </p>
                <p class="text-gray-600 mb-8">
                    Connect with friends .
                </p>
            </div>
</div>
    </div>
</x-UserHompage>

