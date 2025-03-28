<style>
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.5);
    }
    .community-icon {
        background-color: #FF4500;
        color: white;
        width: 72px;
        height: 72px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        font-weight: bold;
    }
</style>
@if($auth === "true")
<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-black/50 bg-opacity-50 flex items-center justify-center hidden z-[120]">
    <!-- Modal Container -->
    <div class="rounded-lg shadow-xl w-[700px] overflow-hidden bg-white ">
        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4 ">
            <h2 class="text-xl font-medium text-gray-800">Parle-nous de ta communauté</h2>
            <button id="closeBtn" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body Name And description -->
        <div id="1" class="p-4">
            <p class="text-gray-600 mb-4">Un nom et une description aident les réditors à comprendre en quoi consiste ta communauté.</p>

            <div class="flex flex-row-reverse justify-between gap-5">
                <!-- Community Preview -->
                <div style="min-width: 300px;" class="bg-gray-50 rounded-lg p-4 mb- h-fit">
                    <strong class="text-gray-700 text-2xl">r/<span id="previewName">Community</span></strong>
                    <div class="text-sm text-gray-500">1 membre · 1 en ligne</div>
                    <div class="text-gray-700" id="previewDescription">The Description</div>
                </div>

                <!-- Form -->
                <form id="communityForm" class="w-full">
                    <!-- Community Name Input -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nom de la communauté <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="text" id="communityName" placeholder="Community Name"
                                   class="mt-1 block w-full border-none  rounded-md  py-2 px-3 focus:outline-none  bg-gray-200"
                                   maxlength="50">
                            <div class="absolute right-2 bottom-2 text-xs text-gray-400" id="nameCounter">11</div>
                        </div>
                    </div>

                    <!-- Description Input -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Description<span class="text-red-500">*</span></label>
                        <div class="relative">
                    <textarea id="description" rows="5"
                              class="mt-1 block w-full border-none  rounded-md  py-2 px-3 focus:outline-none  bg-gray-200"
                              maxlength="500" placeholder="Description About Your Community"></textarea>
                            <div class="absolute right-2 bottom-2 text-xs text-gray-400" id="descCounter">31</div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <!-- Modal Body For Banner And Community Icon -->
        <div id="2" class="hidden">
            <!-- Modal Description -->
            <div class="px-4 pb-2">
                <p class="text-gray-600">Avec un flair visuel, tu attires l'attention de nouveaux membres tout en définissant la culture de ta communauté ! Tu peux mettre à jour ta description à tout moment.</p>
            </div>

            <!-- Form Content -->
            <div class="p-4 flex">
                <!-- Left Side - Upload Buttons -->
                <div class="w-1/2 pr-4">
                    <!-- Banner Upload -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bannière</label>
                        <button id="uploadBannerBtn" class="flex items-center justify-center w-full border border-gray-300 rounded-md bg-gray-100 px-4 py-2 hover:bg-gray-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Ajouter
                        </button>
                    </div>

                    <!-- Icon Upload -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icône</label>
                        <button id="uploadIconBtn" class="flex items-center justify-center w-full border border-gray-300 rounded-md bg-gray-100 px-4 py-2 hover:bg-gray-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Ajouter
                        </button>
                    </div>
                </div>

                <!-- Right Side - Preview -->
                <div class="w-1/2">
                    <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                        <!-- Community Preview Card -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-sm">
                            <!-- Banner Preview -->
                            <div id="bannerPreview" class="bg-gray-200 h-24 w-full"></div>

                            <!-- Content with Icon -->
                            <div class="p-3 relative">
                                <!-- Icon -->
                                <div class="absolute -top-8 left-3">
                                    <div id="iconPreview" class="community-icon rounded-full">
                                        r/
                                    </div>
                                </div>

                                <!-- Community Info -->
                                <div class="pt-10">
                                    <p class="font-medium text-gray-900">r/<span id="previewName1"></span></p>
                                    <p class="text-sm text-gray-500">1 membre · 1 en ligne</p>
                                    <p class="text-gray-600 mt-2"><span id="previewDescription1"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Body For Banner And Community Icon -->
        <div id="3" class="hidden p-4">
            Other step
        </div>
        <div id="4" class="hidden p-4">
            Another step
        </div>
        <!-- Modal Footer -->
        <div class="bg-gray-50 px-4 py-3 flex justify-between space-x-2">
            <!-- Progress Indicator -->
            <div class="flex justify-center my-4">
                <span id="step1" class="h-2 w-2 rounded-full bg-blue-600 mx-1"></span>
                <span id="step2" class="h-2 w-2 rounded-full bg-gray-300 mx-1"></span>
                <span id="step3" class="h-2 w-2 rounded-full bg-gray-300 mx-1"></span>
                <span id="step4" class="h-2 w-2 rounded-full bg-gray-300 mx-1"></span>
            </div>
            <div>
                <button data-progress="0" id="backBtn" class="bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    retour
                </button>
                <input id="Currentplace" value="1" type="hidden" >
                <button data-progress="2" id="nextBtn" class="bg-blue-600 border border-transparent rounded-md shadow-sm px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                    Suivant
                </button>
            </div>
        </div>
        <!-- Hidden file inputs -->
        <input type="file" id="bannerFileInput" accept="image/*" class="hidden">
        <input type="file" id="iconFileInput" accept="image/*" class="hidden">

    </div>
</div>
@endif

<!-- Sidebar -->
<div class="fixed pb-[100px] w-64 h-screen bg-white border-r border-gray-200 overflow-y-auto">
    <!-- Navigation Section -->
    <nav class="px-3 py-2">
        <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md bg-gray-100 text-black">
            <i class="fas fa-home mr-3 w-5 text-center"></i>
            <span>Accueil</span>
        </a>
        <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
            <i class="fas fa-fire mr-3 w-5 text-center"></i>
            <span>Populaires</span>
        </a>
        <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
            <i class="fas fa-compass mr-3 w-5 text-center"></i>
            <span>Explorer</span>
        </a>
        <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
            <i class="fas fa-list mr-3 w-5 text-center"></i>
            <span>Tous</span>
        </a>
    </nav>


    @if($auth === "true")
        <!-- Divider -->
        <div class="border-t border-gray-200 my-2"></div>

        <!-- Flux Personnalisés Section -->
        <div class="px-3 py-2 ">
            <div class="flex justify-between items-center px-3 py-1 text-xs font-semibold text-gray-500 cursor-pointer section-header" data-section="flux">
                <span>FLUX PERSONNALISÉS</span>
                <i class="fas fa-chevron-up section-icon"></i>
            </div>
            <div class="section-content" id="flux-content">
                <a href="#" class="flex items-center px-3 py-2.5 mt-1 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-plus mr-3 w-5 text-center"></i>
                    <span>Créer un flux personnalisé</span>
                </a>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-200 my-2"></div>

        <!-- Communautés Section -->
        <div class="px-3 py-2">
            <div class="flex justify-between items-center px-3 py-1 text-xs font-semibold text-gray-500 cursor-pointer section-header" data-section="communities">
                <span>COMMUNAUTÉS</span>
                <i class="fas fa-chevron-up section-icon"></i>
            </div>
            <div class="section-content" id="communities-content">
                <button id="openModalBtn" class="flex items-center px-3 py-2.5 mt-1 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-plus mr-3 w-5 text-center"></i>
                    <span>Créer une communauté</span>
                </button>

                <!-- Community Links -->
                <div class="mt-1">
                    <a href="#" class="flex items-center justify-between px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                        <div class="flex items-center">
                            <div class="w-5 h-5 rounded-full bg-red-500 flex items-center justify-center mr-3">
                                <img src="https://www.redditstatic.com/desktop2x/img/favicon/apple-icon-57x57.png" class="w-4 h-4" alt="Canada">
                            </div>
                            <span>r/canada</span>
                        </div>
                        <i class="far fa-star favorite-icon"></i>
                    </a>
                    <a href="#" class="flex items-center justify-between px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                        <div class="flex items-center">
                            <div class="w-5 h-5 rounded-full bg-green-800 flex items-center justify-center mr-3">
                                <img src="https://www.redditstatic.com/desktop2x/img/favicon/apple-icon-57x57.png" class="w-4 h-4" alt="Morocco">
                            </div>
                            <span>r/Morocco</span>
                        </div>
                        <i class="far fa-star favorite-icon"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif


    <!-- Divider -->
    <div class="border-t border-gray-200 my-2"></div>

    <!-- Resources Section -->
    <div class="px-3 py-2">
        <div class="flex justify-between items-center px-3 py-1 text-xs font-semibold text-gray-500 cursor-pointer section-header" data-section="resources">
            <span>RESSOURCES</span>
            <i class="fas fa-chevron-up section-icon"></i>
        </div>
        <div class="section-content" id="resources-content">
            <a href="#" class="flex items-center px-3 py-2.5 mt-1 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-info-circle mr-3 w-5 text-center"></i>
                <span>À propos de CodeSpace</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-ad mr-3 w-5 text-center"></i>
                <span>Publicités</span>
            </a>

            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-question-circle mr-3 w-5 text-center"></i>
                <span>Aide</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-book mr-3 w-5 text-center"></i>
                <span>Blog</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-briefcase mr-3 w-5 text-center"></i>
                <span>Carrières</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-newspaper mr-3 w-5 text-center"></i>
                <span>Presse</span>
            </a>
        </div>
    </div>
</div>
@if($auth === "true")
<script src="{{asset('storage/js/Community/CreateCommunity.js')}}"></script>
@endif
