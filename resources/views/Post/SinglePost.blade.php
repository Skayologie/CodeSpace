<x-UserHompage>
    <div id="UserArea">
        <div class="max-w-3xl mx-auto bg-white">
            <!-- Header with back button and post info -->
            <div class="sticky top-0 bg-white z-10 border-b border-gray-200 px-3 py-2 flex items-center">
                <a href="{{ url()->previous() }}" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-3 hover:bg-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>

                <div class="flex items-center">
                    <div class="w-6 h-6 rounded-full bg-orange-500 flex items-center justify-center mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm4.47 13.53a.75.75 0 01-1.06 0L10 10.12 6.59 13.53a.75.75 0 11-1.06-1.06L9.44 8.06a.75.75 0 011.06 0l3.97 3.97a.75.75 0 010 1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <span class="font-medium text-sm text-gray-900">
                                <a href="{{route('Profile.show',$posts->user->id)}}">
                                    r/{{$posts->user->username}}
                                </a>
                            </span>
                            <span class="mx-1 text-gray-500 text-xs">•</span>
                            <span class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</span>
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
                <h1 class="text-xl font-bold text-gray-900 mb-3">{{$posts->title}}</h1>

                <p class="text-gray-800 mb-4">
                    {!! $posts->content !!}
                </p>
                @if($posts->multimedia != null)
                    <div class="rounded-md overflow-hidden mb-4 max-h-[400px]">
                        <img src="{{$posts->multimedia}}" alt="Front door with No Solicitors sign and bucket" class=" object-cover" />
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
                        <span class="mx-2 text-sm font-medium">0</span>
                        <button class="flex items-center justify-center text-gray-500 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Comments button -->
                    <div class="flex items-center bg-gray-100 rounded-full px-3 py-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span class="text-sm font-medium">{{count($posts->comments)}}</span>
                    </div>

                </div>
            </div>
            <input id="post_id" type="hidden" value="{{$posts->id}}">
            <!-- Comment section divider -->
            <div class="border-t border-gray-200 my-2"></div>

            <!-- Comment input -->
            <div class="px-3 py-3 flex items-start space-x-2 border-b border-gray-200">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex-shrink-0">
                    <img src="{{session("user")->profilePicture}}"  />
                </div>
                <textarea id="commentContent" placeholder="Ajouter un commentaire..." class="flex-1 bg-gray-100 rounded-md px-3 py-2 text-gray-500"></textarea>
                <button id="sentThisComment">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>

            <!-- Comments -->
            <div id="comments_area" class="py-2">
                @if(count($posts->comments) === 0)
                    <!-- Load more comments -->
                    <div class="px-3 py-4 text-center">
                            No comments yet !
                    </div>
                @endif
                @foreach($posts->comments as $comment)
                    @if($comment->user->id === session("user")->id)
                        <div id="{{$comment->id}}" class="flex space-x-2 px-3 py-3 hover:bg-gray-100 transition-colors">
                            <div class="flex flex-col items-center space-y-2">
                                <div class="w-8 h-8 rounded-full overflow-hidden bg-red-100 flex-shrink-0">
                                    <div class="w-full h-full flex items-center justify-center text-red-500 font-bold text-xs">C</div>
                                </div>

                            </div>
                            <div class="flex-1 flex justify-between">
                                <div>
                                    <div class="flex items-center flex-wrap gap-1.5 mb-1">
                                        <span class="font-medium text-gray-900">{{$comment->user->username}}</span>
                                        <span class="text-xs text-gray-500"> • {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-800 mb-2">{{$comment->comment}}</p>
                                </div>
                                <button class="deleteMyComment" id="{{$comment->id}}">
                                    <i class="text-red-500 fa-solid fa-trash cursor-pointer"></i>
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="flex space-x-2 px-3 py-3 hover:bg-gray-50 transition-colors">
                            <div class="flex flex-col items-center space-y-2">
                                <div class="w-8 h-8 rounded-full overflow-hidden bg-red-100 flex-shrink-0">
                                    <div class="w-full h-full flex items-center justify-center text-red-500 font-bold text-xs">C</div>
                                </div>

                            </div>
                            <div class="flex-1">
                                <div class="flex items-center flex-wrap gap-1.5 mb-1">
                                    <span class="font-medium text-gray-900">{{$comment->user->username}}</span>
                                    <span class="text-xs text-gray-500"> • {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-800 mb-2">{{$comment->comment}}</p>

                            </div>
                        </div>
                    @endif
                @endforeach




            </div>
        </div>
    </div>
</x-UserHompage>
