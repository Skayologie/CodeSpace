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
        <a id="explorer" href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
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

