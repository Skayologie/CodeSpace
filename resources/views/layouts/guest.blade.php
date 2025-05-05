<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Dashboard | Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('storage/css/style.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="bg-white font-[poppins]">

<div id="toast" class="fixed z-[121] right-0 top-[80px] p-[80px]">

</div>
<div class="fixed z-[120]" id="ContainForm">

</div>
<div id="LoadingOne" class="hidden fixed w-full h-full z-[122] items-center block p-6 bg-white border border-gray-100 rounded-lg shadow-md dark:bg-gray-800/50 dark:border-gray-800 ">
    <div role="status" class=" flex justify-center items-center h-full">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div id="CommunityOverlay" class=" hidden fixed inset-0 bg-black/50 bg-opacity-50 flex items-center justify-center z-[120]"  >
    <!-- Modal Container -->
    <div class=" rounded-lg shadow-xl w-[700px] overflow-hidden bg-white ">
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
                            <input type="text" name="name" id="communityName" placeholder="Community Name"
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
                            <div id="bannerPreview" class="bg-gray-200 h-24 w-full">dd</div>

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
            <p class="text-gray-600 mb-4">Ajoute jusqu'à 3 thèmes pour permettre aux rédactors intéressé·es de trouver ta communauté.</p>

            <!-- Search Bar -->
            <div class="relative mb-4">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" class="pl-10 w-full bg-gray-100 border-none rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Filtrer les thèmes">
            </div>

            <!-- Theme Selection Counter -->
            <div class="mb-4">
                <h3 class="font-medium text-gray-700">Thèmes <span id="counterHowThemeThere">0</span>/3</h3>
                <div id="choosedThemes" class="flex gap-2 p-3"></div>
            </div>

            <!-- Theme Categories -->
            <div id="ThemesCommunity" class="space-y-6 max-h-96 overflow-y-auto pr-2">
                <!-- News & Politics Category -->
                <div class="theme-category">
                    <div class="flex items-center mb-2">
                        <div class="w-5 h-5 bg-blue-200 rounded mr-2"></div>
                        <h4 class="font-medium">Actualités et politique</h4>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button class="bg-gray-100 hover:bg-gray-200 py-1 px-3 rounded-full text-sm">Actualités</button>
                    </div>
                </div>
            </div>

        </div>
        <div id="4" class="hidden p-4">
            <div class="bg-white rounded-lg shadow-md w-full max-w-2xl">
                <!-- Privacy Options -->
                <div class="p-4">
                    <!-- Public Option -->
                    <div class="flex items-center justify-between p-4 border-b border-gray-200">
                        <div class="flex items-start gap-3">
                            <div class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Public</h3>
                                <p class="text-sm text-gray-500">Tout le monde peut voir cette communauté et y publier ou commenter du contenu</p>
                            </div>
                        </div>
                        <div>
                            <input type="radio" value="public" name="privacy" id="public" checked class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded-full">
                        </div>
                    </div>


                    <!-- Private Option -->
                    <div class="flex items-center justify-between p-4 border-b border-gray-200">
                        <div class="flex items-start gap-3">
                            <div class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Privée</h3>
                                <p class="text-sm text-gray-500">Seuls les membres approuvés peuvent voir et contribuer</p>
                            </div>
                        </div>
                        <div>
                            <input type="radio" value="private" name="privacy" id="private" class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded-full">
                        </div>
                    </div>
                </div>

                <!-- Footer with Terms and Buttons -->
                <div class="border-t border-gray-200 p-4">
                    <p class="text-sm text-gray-600 mb-4">
                        et reconnais avoir compris notre
                        <a href="#" class="text-blue-600 font-medium">Règles de CodeSpace</a>
                    </p>


                </div>
            </div>
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
                <button data-progress="0" id="backBtn" class="px-4 py-2 bg-gray-100 text-gray-900 font-medium rounded-full hover:bg-gray-200">
                    retour
                </button>
                <input id="Currentplace" value="1" type="hidden" >
                <button data-progress="2" id="nextBtn" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700">
                    Suivant
                </button>
                <button id="FinishedBtn" class="hidden px-4 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700">
                    Finish !
                </button>





            </div>
        </div>
        <!-- Hidden file inputs -->
        <input type="file" id="bannerFileInput" accept="image/*" class="hidden">
        <input type="file" id="iconFileInput" accept="image/*" class="hidden">

    </div>
</div>

{{$slot}}

<!-- Chart library -->
<script src="{{asset('storage/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('storage/plugins/feather.min.js')}}"></script>
<!-- Main App Js Script -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://js.pusher.com/beams/2.1.0/push-notifications-cdn.js"></script>

</body>

</html>
