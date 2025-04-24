<x-UserHompage>

<style>
    .ql-container {
        border: none !important; /* Removes border */
        box-shadow: none !important; /* Removes shadow if any */
    }
    .ql-toolbar {
        border: none !important; /* Removes toolbar border */
        box-shadow: none !important;
        padding: 20px  !important;
    }
</style>
    <body class="w-100 bg-white text-gray-800">
        <div class="flex justify-center">
            <div class="w-[600px]  ">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Créer une publication</h1>
                    <a href="#" class="text-gray-800 hover:underline">Brouillons</a>
                </div>
                <form id="PostForm" method="post" action="{{route("Post.store")}}?Type={{$_GET["Type"]}}">
                    @csrf
                    <div class="w-72 bg-white rounded-lg  relative over">
                        <!-- Search Box -->
                        <div id="SearchAreaMall" class="p-3 ">
                            <div class="relative">
                                <input id="InputSearchCommunity" type="text" placeholder="Search communities" class="w-full pl-8 pr-3 py-2 bg-gray-100 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-2.5 top-2.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Communities List -->
                        <div class="max-h-96 overflow-y-auto absolute z-[121] bg-white w-full" id="searchCommunityResults">
                            <!-- User Profile -->



                        </div>
                    </div>
                    <div>

                        <div class="flex border-b border-gray-200 mb-6">
                            <div id="tab-texte" class="px-4 py-2 font-medium cursor-pointer" data-tab="texte">Texte</div>
                            <div id="tab-images" class="px-4 py-2 font-medium cursor-pointer" data-tab="images">Images et vidéo</div>
                            <div id="tab-lien" class="px-4 py-2 font-medium cursor-pointer" data-tab="lien">Lien</div>
                        </div>
                        <input value="{{old('title')}}" name="title" type="text" style="border: 1px solid #b3b3b36b !important;" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Titre*">
                        <div class="relative text-right text-gray-500 text-sm flex justify-between  mb-4">
                            @error("title")
                            <p class="text-red-800">*{{$message}}</p>
                            @enderror
                            <p id="titleError" class="hidden text-red-800">* Check title input</p>

                        </div>

                        <select name="category" id="categories" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option disabled selected>Choose a category</option>
                            @foreach($Categories as $Category)
                                <option value="{{$Category->id}}">{{$Category->name}}</option>
                            @endforeach
                        </select>
                        <div id="content-lien" class="tab-content mb-6 hidden">
                            <input style="border: 1px solid #b3b3b36b !important;"  type="text" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="URL du lien *">
                        </div>
                        <div class="relative text-right text-gray-500 text-sm flex justify-between  ">
                            @error("category")
                            <p class="text-red-800">*{{$message}}</p>
                            @enderror
                            <p id="categoryError"  class="hidden text-red-800">* Check category input</p>

                        </div>
                        <div id="content-images" class="tab-content mb-6 hidden">
                            <div class="border border-dashed border-gray-300 rounded-lg p-12 flex flex-col items-center justify-center text-center">
                                <p class="text-gray-600 mb-2">Glisse puis dépose ou charge des médias</p>
                                <div class="flex items-center justify-center bg-gray-100 rounded-full p-2 w-8 h-8">
                                    <svg class="w-4 h-4 text-gray-600" viewBox="0 0 16 16" fill="none">
                                        <path d="M8 12V4M4 8H12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 relative">
                            <div id="tag-container" class="mb-2 flex flex-wrap gap-2"></div>

                            <input id="tag-input"
                                   class="px-4 py-2 text-sm bg-gray-100  text-gray-500 rounded-full hover:bg-gray-200 focus:outline-none"
                                   placeholder="Ajouter des étiquettes">
                            <div class="relative text-right text-gray-500 text-sm flex justify-between  mb-4">
                                @error("allTags")
                                <p class="text-red-800">*{{$message}}</p>
                                @enderror
                                <p id="tagsError"  class="hidden text-red-800">* Check tags input</p>
                            </div>
                            <div id="tag-search-box" class="mb-2 flex flex-wrap gap-2 bg-white  w-[100%] p-2 z-20">
                            </div>

                            <input name="allTags" id="allTags" type="hidden" value="">
                        </div>

                        <div id="content-texte" class="tab-content mb-6">
                            <div class="rounded-lg mb-6 border border-gray-200">
                                <div id="editor" style="height: 250px;"></div>
                            </div>
                        </div>
                        <div class="relative text-right text-gray-500 text-sm flex justify-between  mb-8">
                            @error("content")
                                <p class="text-red-800">*{{$message}}</p>
                            @enderror
                            <p id="contentError"  class="hidden text-red-800">* Check content input</p>
                        </div>
                        <input type="hidden" name="content" id="quill-content">






                        <div class="flex justify-end gap-2">
                            <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200">Enregistrer le brouillon</button>
                            <button type="button" id="btnSubmit" class=" px-4 py-2 bg-orange-500 text-white rounded-full text-sm font-medium hover:bg-orange-600">Publier</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </body>
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
{{--    <script src="{{asset('storage/js/validation.js')}}"></script>--}}
{{--    <script src="{{asset('storage/js/Post/CreatePost.js')}}"></script>--}}

</x-UserHompage>


