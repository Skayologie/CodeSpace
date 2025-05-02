@php use Carbon\Carbon; @endphp
<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7c34dba79edd6dd7a56d', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function (data) {
        alert(JSON.stringify(data));
    });
</script>
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
            <!-- Main Chat Area -->
            <div id="ChatArea" class="w-full">
                <div class="flex-1 flex flex-col w-full overflow-hidden" >
                    <!-- Chat Header -->
                    <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                        <div class="flex items-center">
                            <button class="md:hidden mr-2 p-1 rounded-full hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            <div class="flex items-center">
                                <div class="relative">
                                    <img src="{{$friend->profilePicture}}" alt="{{$friend->username}}" class="w-10 h-10 rounded-full object-cover">
                                    <div class="absolute bottom-0 right-0 bg-green-500 w-2.5 h-2.5 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-semibold text-gray-900">{{$friend->username}}</h3>
                                    <input id="friendID" type="hidden" value="{{$friend->id}}" class="text-sm font-semibold text-gray-900"/>
                                    <input id="MyId" type="hidden" value="{{session("user")->id}}" class="text-sm font-semibold text-gray-900"/>
                                    <p class="text-xs text-green-600">Online</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="p-2 rounded-full hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </button>
                            <button class="p-2 rounded-full hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </button>
                            <button class="p-2 rounded-full hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-hidden ">
                        <!-- Messages Area -->
                        <div id="messageArea" class="flex-1 p-4 overflow-y-auto scrollbar-hide bg-white h-[500px]">
                            <!-- Date Separator -->
                            <div class="flex justify-center mb-4">
                                <span class="text-xs font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Today</span>
                            </div>



                            @foreach ($messages as $message)
                                @if ($message->sender_id == session("user")->id)
                                    <!-- Message from me -->
                                    <!-- Sent Message -->
                                    <div class="flex mb-4 justify-end">
                                        <div class="max-w-[75%] text-right">
                                            <div class="bg-violet-500 p-3 rounded-lg rounded-tr-none">
                                                <p class="text-sm text-white">{{$message->content}}</p>
                                            </div>
                                            @php
                                                $createdAt = Carbon::parse($message->created_at);
                                            @endphp

                                            @if ($createdAt->isToday())
                                                <p class="text-xs text-gray-500">{{ $createdAt->format('h:i A') }}</p>
                                            @elseif ($createdAt->isYesterday())
                                                <p class="text-xs text-gray-500">Yesterday at {{ $createdAt->format('h:i A') }}</p>
                                            @elseif ($createdAt->isCurrentYear())
                                                <p class="text-xs text-gray-500">{{ $createdAt->format('M d') }}</p>
                                            @else
                                                <p class="text-xs text-gray-500">{{ $createdAt->format('M d, Y') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <!-- Message from friend -->
                                    <!-- Received Message -->
                                    <div class="flex mb-4">
                                        <img src="{{$friend->profilePicture}}" alt="{{$friend->username}}" class="w-8 h-8 rounded-full object-cover mr-3 mt-1">
                                        <div class="max-w-[75%]">
                                            <div class="bg-gray-100 p-3 rounded-lg rounded-tl-none">
                                                <p class="text-sm text-gray-800">{{$message->content}}</p>
                                            </div>
                                            @php
                                                $createdAt = Carbon::parse($message->created_at);
                                            @endphp

                                            @if ($createdAt->isToday())
                                                <p class="text-xs text-gray-500">{{ $createdAt->format('h:i A') }}</p>
                                            @elseif ($createdAt->isYesterday())
                                                <p class="text-xs text-gray-500">Yesterday at {{ $createdAt->format('h:i A') }}</p>
                                            @elseif ($createdAt->isCurrentYear())
                                                <p class="text-xs text-gray-500">{{ $createdAt->format('M d') }}</p>
                                            @else
                                                <p class="text-xs text-gray-500">{{ $createdAt->format('M d, Y') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>

                        <!-- Message Input Area -->
                        <div class="p-4 border-t border-gray-200 align-items-center justify-center bottom-0 h-[100px] w-full">
                            <div class="flex items-end">
                                <div class="flex-1 relative">
                                    <textarea id="MessageInput" placeholder="Type a message..." class="w-full border border-gray-300 rounded-lg py-2 px-4 pr-12 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent resize-none h-12 max-h-32 transition-all duration-200 text-sm"></textarea>
                                    <div class="absolute right-2 bottom-2 flex space-x-1">
                                        <button class="p-1 text-gray-500 hover:text-violet-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                            </svg>
                                        </button>
                                        <button class="p-1 text-gray-500 hover:text-violet-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <button id="SentThisMessage" class="ml-3 p-2 bg-violet-500 rounded-full text-white hover:bg-violet-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-UserHompage>

