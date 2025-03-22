<x-UserHompage>


    <body class="w-100 bg-white text-gray-800 font-sans">
        <div class="flex justify-center">
            <div class="w-[600px]  ">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Créer une publication</h1>
                    <a href="#" class="text-gray-800 hover:underline">Brouillons</a>
                </div>
                <form method="post" action="{{route("Post.store")}}?Type={{$_GET["Type"]}}">
                    @csrf
                    <div id="communitySelector" class="inline-flex items-center bg-gray-100 rounded-full px-4 py-2 mb-6 cursor-pointer">
                        <div id="communityIcon" class="w-6 h-6 rounded-full mr-2 flex items-center justify-center">
                            <span id="communityIconText" class="text-white">/</span>
                        </div>
                        <span id="communityText" class="font-medium">Sélectionner une communauté</span>
                        <svg class="ml-2 w-4 h-4" viewBox="0 0 16 16" fill="none">
                            <path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

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

                    <select name="category" id="categories" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option disabled selected>Choose a category</option>
                        @foreach($Categories as $Category)
                            <option value="{{$Category->id}}">{{$Category->name}}</option>
                        @endforeach
                    </select>
                    <div class="relative text-right text-gray-500 text-sm flex justify-between  mb-8">
                        @error("category")
                        <p class="text-red-800">*{{$message}}</p>
                        @enderror
                        <p id="categoryError"  class="hidden text-red-800">* Check category input</p>

                    </div>
                    <div class="mb-2 relative">
                        <div id="tag-container" class="mb-2 flex flex-wrap gap-2"></div>

                        <input id="tag-input"
                               class="px-4 py-2 text-sm bg-gray-100  text-gray-500 rounded-full hover:bg-gray-200 focus:outline-none"
                               placeholder="Ajouter des étiquettes">
                        <div class="relative text-right text-gray-500 text-sm flex justify-between  mb-8">
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

                    <div id="content-lien" class="tab-content mb-6 hidden">
                        <input type="text" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="URL du lien *">
                    </div>


                    <div class="flex justify-end gap-2">
                        <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200">Enregistrer le brouillon</button>
                        <button type="button" id="btnSubmit" class=" px-4 py-2 bg-orange-500 text-white rounded-full text-sm font-medium hover:bg-orange-600">Publier</button>
                    </div>
                </form>
            </div>

        </div>
    </body>
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="{{asset('storage/js/validation.js')}}"></script>
    <script src="{{asset('storage/js/Post/CreatePost.js')}}"></script>


</x-UserHompage>


