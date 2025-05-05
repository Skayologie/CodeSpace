<x-UserHompage>
    <div id="UserArea">
        @foreach($posts as $post)
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
                                <span class="font-medium text-sm text-gray-900">
                                    <a href="{{route('Profile.show',$post->user->id)}}">
                                        r/{{$post->user->username}}
                                    </a>
                                </span>
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
                    @if($post->multimedia != null)
                        <div class="rounded-md overflow-hidden mb-4 max-h-[400px]">
                            <img src="{{$post->multimedia}}" alt="Front door with No Solicitors sign and bucket" class=" object-cover" />
                        </div>
                    @else
                        <p class="text-gray-800 mb-4">
                            {!! $post->content !!}
                        </p>
                    @endif

                    <!-- Post actions -->
                    <div class="flex items-center space-x-2 pt-2">
                        <!-- Vote buttons -->
                        <div class="flex items-center bg-gray-100 rounded-full px-3 py-1.5">
                            <button id="{{$post->id}}" class="UpVoteButton flex items-center justify-center text-gray-500 hover:text-orange-500 transition-colors">
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
                        <a href="{{route("Post.show",[$post->user->username,$post->id])}}" class="flex items-center bg-gray-100 rounded-full px-3 py-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-sm font-medium">{{count($post->comments)}}</span>
                        </a>


                    </div>
                </div>

                <!-- Comment section divider -->
                <div class="border-t border-gray-200 my-2"></div>





            </div>
        @endforeach
    </div>
</x-UserHompage>

