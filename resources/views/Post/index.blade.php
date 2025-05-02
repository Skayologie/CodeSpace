<x-UserHompage>
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8 px-4">
        <div class="max-w-3xl mx-auto">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Créer une publication
                </h1>
            </div>

            <!-- Main Form -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                <form id="PostForm">


                    <!-- Community Selection -->
                    <div class="mb-6 relative">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sélectionner une communauté</label>
                        <div class="w-full sm:w-72 bg-white rounded-lg relative">
                            <div id="SearchAreaMall" class="mb-1">
                                <div class="relative">
                                    <input id="InputSearchCommunity" type="text" placeholder="Rechercher des communautés"
                                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Communities Dropdown -->
                            <div class="max-h-60 overflow-y-auto absolute z-[121] bg-white w-full rounded-lg shadow-lg border border-gray-200 hidden" id="searchCommunityResults">
                                <!-- Results will be populated here -->
                                <div class="p-4 text-center text-gray-500 text-sm">
                                    Commencez à taper pour rechercher des communautés
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Post Type Tabs -->
                    <div class="mb-6">
                        <div class="flex border-b border-gray-200 overflow-x-auto scrollbar-hide">
                            <div id="tab-texte" class="px-6 py-3 font-medium cursor-pointer border-b-2 border-orange-500 text-orange-500 whitespace-nowrap" data-tab="texte">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                    Texte
                                </div>
                            </div>
                            <div id="tab-images" class="px-6 py-3 font-medium cursor-pointer text-gray-600 hover:text-gray-900 whitespace-nowrap" data-tab="images">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                    </svg>
                                    Images et vidéo
                                </div>
                            </div>
                            <div id="tab-lien" class="px-6 py-3 font-medium cursor-pointer text-gray-600 hover:text-gray-900 whitespace-nowrap" data-tab="lien">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                    </svg>
                                    Lien
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Title Input -->
                    <div class="mb-6">
                        <label for="post-title" class="block text-sm font-medium text-gray-700 mb-2">Titre*</label>
                        <input
                            id="post-title"
                            value="{{old('title')}}"
                            name="title"
                            type="text"
                            class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all"
                            placeholder="Un titre accrocheur pour votre publication">
                        <div class="flex justify-between mt-2">
                            @error("title")
                            <p class="text-red-600 text-sm">*{{$message}}</p>
                            @enderror
                            <p id="titleError" class="hidden text-red-600 text-sm">* Veuillez vérifier le titre</p>
                            <p class="text-sm text-gray-500"><span id="titleCount">0</span>/300</p>
                        </div>
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-6">
                        <label for="categories" class="block text-sm font-medium text-gray-700 mb-2">Catégorie*</label>
                        <div class="relative">
                            <select
                                name="category"
                                id="categories"
                                class="appearance-none w-full px-4 py-3 text-base border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all bg-white">
                                <option disabled selected>Choisir une catégorie</option>
                                @foreach($Categories as $Category)
                                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-between mt-2">
                            @error("category")
                            <p class="text-red-600 text-sm">*{{$message}}</p>
                            @enderror
                            <p id="categoryError" class="hidden text-red-600 text-sm">* Veuillez sélectionner une catégorie</p>
                        </div>
                    </div>

                    <!-- Link Content (Hidden by Default) -->
                    <div id="content-lien" class="tab-content mb-6 hidden">
                        <label for="link-url" class="block text-sm font-medium text-gray-700 mb-2">URL*</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input
                                id="link-url"
                                type="text"
                                class="w-full pl-10 pr-4 py-3 text-base border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all"
                                placeholder="https://example.com">
                        </div>
                    </div>

                        <!-- Image Upload (Hidden by Default) -->
                        <div id="content-images" class="tab-content mb-6 hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Images et vidéos</label>

                            <!-- File Input (Hidden) -->
                            <input type="file" id="file-upload" class="hidden" accept="image/*,video/*" multiple>

                            <!-- Upload Area -->
                            <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-8 flex flex-col items-center justify-center text-center hover:bg-gray-50 transition-colors cursor-pointer group">
                                <div class="mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400 group-hover:text-orange-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-gray-600 mb-2 font-medium">Glissez et déposez ou cliquez pour télécharger</p>
                                <p class="text-gray-500 text-sm mb-4">JPG, PNG, GIF, MP4 (max 20MB)</p>
                                <button type="button" id="select-files-btn" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                                    Sélectionner des fichiers
                                </button>
                            </div>

                            <!-- Upload Progress (Initially Hidden) -->
                            <div id="upload-progress" class="mt-4 hidden">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Téléchargement en cours...</span>
                                    <span id="progress-percentage" class="text-sm font-medium text-gray-700">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div id="progress-bar" class="bg-orange-500 h-2.5 rounded-full" style="width: 0%"></div>
                                </div>
                            </div>

                            <!-- Error Message (Initially Hidden) -->
                            <div id="upload-error" class="mt-4 hidden">
                                <p class="text-red-600 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span id="error-message">Une erreur s'est produite lors du téléchargement.</span>
                                </p>
                            </div>

                            <!-- Preview Area -->
                            <div id="preview-container" class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4"></div>

                            <!-- Hidden Input for File Data -->
                            <input type="hidden" id="uploaded-files" name="uploaded_files" value="">
                        </div>

                    <!-- Tags Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Étiquettes</label>
                        <div class="relative">
                            <div id="tag-container" class="mb-2 flex flex-wrap gap-2"></div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input
                                    id="tag-input"
                                    class="w-full pl-10 pr-4 py-3 text-base border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all"
                                    placeholder="Ajouter des étiquettes (appuyez sur Entrée pour ajouter)">
                            </div>
                            <div class="relative text-right text-gray-500 text-sm flex justify-between mt-2">
                                @error("allTags")
                                <p class="text-red-600 text-sm">*{{$message}}</p>
                                @enderror
                                <p id="tagsError" class="hidden text-red-600 text-sm">* Veuillez vérifier les étiquettes</p>
                            </div>
                            <div id="tag-search-box" class="mb-2 flex flex-wrap gap-2 bg-white rounded-lg shadow-lg border border-gray-200 absolute z-10 w-full p-3 hidden">
                                <!-- Tag suggestions will appear here -->
                            </div>
                            <input name="allTags" id="allTags" type="hidden" value="">
                        </div>
                    </div>

                    <!-- Text Editor (Default Tab) -->
                    <div id="content-texte" class="tab-content mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contenu*</label>
                        <div class="rounded-lg border border-gray-200 overflow-hidden">
                            <div id="toolbar" class="border-b border-gray-200 bg-gray-50 p-2">
                                <!-- Toolbar buttons will be inserted by Quill -->
                            </div>
                            <div id="editor" class="min-h-[250px] max-h-[500px] overflow-y-auto"></div>
                        </div>
                        <div class="flex justify-between mt-2">
                            @error("content")
                            <p class="text-red-600 text-sm">*{{$message}}</p>
                            @enderror
                            <p id="contentError" class="hidden text-red-600 text-sm">* Veuillez ajouter du contenu</p>
                        </div>
                        <input type="hidden" name="content" id="quill-content">
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-wrap justify-end gap-3 mt-8">

                        <button
                            type="button"
                            id="btnSubmit"
                            class="px-6 py-2.5 bg-orange-500 text-white rounded-full text-sm font-medium hover:bg-orange-600 transition-colors flex items-center shadow-sm hover:shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        /* Custom Quill Styles */
        .ql-container {
            border: none !important;
            box-shadow: none !important;
            font-family: inherit !important;
            font-size: 1rem !important;
        }

        .ql-toolbar {
            border: none !important;
            box-shadow: none !important;
            padding: 12px !important;
            border-bottom: 1px solid #e5e7eb !important;
        }

        .ql-editor {
            padding: 16px !important;
            min-height: 200px;
        }

        /* Custom Tag Styles */
        .tag-item {
            display: inline-flex;
            align-items: center;
            background-color: #f3f4f6;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            color: #4b5563;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.2s;
        }

        .tag-item:hover {
            background-color: #e5e7eb;
        }

        .tag-item .tag-remove {
            margin-left: 0.5rem;
            cursor: pointer;
            color: #9ca3af;
        }

        .tag-item .tag-remove:hover {
            color: #ef4444;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

</x-UserHompage>
