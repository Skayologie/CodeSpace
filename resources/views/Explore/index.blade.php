<x-UserHompage>
<div class="container mx-auto px-4 py-8 max-w-6xl">
    <!-- Main Header -->
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Explorer les communautés</h1>

    <!-- Category Filters -->
    <div class="flex flex-wrap gap-2 mb-8 overflow-x-auto">
        @foreach($Themes as $theme)
            <button class="px-4 py-2 bg-gray-200 rounded-full text-gray-800 hover:bg-gray-300 transition">{{$theme->name}}</button>
        @endforeach

        <button class="px-4 py-2 bg-gray-200 rounded-full text-gray-800 hover:bg-gray-300 transition">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <!-- Recommended For You Section -->
    <section class="mb-8">
        <h2 class="text-xl font-bold mb-4 text-gray-900">Recommandées pour toi</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($Communities as $community)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-500 overflow-hidden mr-3">
                                    <img src="/api/placeholder/40/40" alt="Vancouver" class="w-full h-full object-cover">
                                </div>

                                <div >
                                    <a href="{{route('Explore.community',$community->id)}}"><h3 id="community{{$community->id}}" class="communities" data-value="{{$community->id}}" class="font-medium">{{$community->name}} @if($community->type === "private") <i class="text-gray-600/90 fa-solid fa-lock"></i> @else <i class="text-gray-600/90 fa-solid fa-earth-americas"></i> @endif </h3></a>
                                    <p class="text-sm text-gray-500">{{count($community->members)}} membres</p>
                                </div>
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
                                    <button id="{{$community->id}}" class="rejoindreButton px-4 py-1 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">Rejoindre</button>
                                @else
                                    <button class="px-4 py-1 bg-white text-black rounded-full border border-black transition">Member</button>
                                @endif
                        </div>
                        <p class="text-sm text-gray-700">{{$community->description}}</p>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="flex justify-center mt-6">
            <button class="px-6 py-2 bg-gray-200 rounded-full text-gray-700 hover:bg-gray-300 transition">Afficher plus</button>
        </div>
    </section>

</div>
</x-UserHompage>
