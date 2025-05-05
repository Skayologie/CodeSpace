<x-UserHompage>
    <div class="max-w-3xl w-[900px] mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex  gap-3">
            <a href="{{ url()->previous() }}" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-3 hover:bg-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Paramètres</h1>
        </div>
        <!-- General Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Général</h2>

            <!-- username -->
            <div class="flex items-center justify-between py-4 border-b border-gray-200">
                <div class="text-gray-700">Username</div>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">{{$user->username}}</span>
                </div>
            </div>
            <!-- Email Address -->
            <div id="emailBTN" class="flex cursor-pointer items-center justify-between py-4 border-b border-gray-200">
                <div class="text-gray-700">Adresse email</div>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">{{$user->email}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <!-- Location Personalization -->
            <div  id="profileBTN"  class="cursor-pointer flex items-center justify-between py-4 border-b border-gray-200">
                <div class="text-gray-700">Profile image</div>
                <div class="flex items-center">
                    <span class="text-gray-500 text-sm mr-2"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <!-- Location Personalization -->
            <div id="profileBio"  class="flex cursor-pointer items-center justify-between py-4 border-b border-gray-200">
                <div class="text-gray-700">Bio</div>
                <div class="flex items-center">
                    <span class="text-gray-500 text-sm mr-2"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>




        <!-- Advanced Section -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Avancé</h2>
            <!-- Password -->
            <div  id="passwordBTN"  class="flex cursor-pointer items-center justify-between py-4 border-b border-gray-200">
                <div class="text-gray-700">Change le mot de passe</div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </div>
            <!-- Delete Account -->
            <div class="flex cursor-pointer items-center justify-between py-4 border-b border-gray-200  ">
                <div class="text-gray-700">Supprimer le compte</div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </div>

        </div>
    </div>
    <!-- Modal Backdrop with Blur -->
    <div id="modalSettingEmail" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-[121]">
        <!-- Modal Dialog -->
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Modifie ton adresse email</h3>
                <button id="closeBTNModal" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <p class="text-gray-700 mb-4">
                    Pour modifier ton adresse email, tu dois d'abord créer un mot de passe Reddit. Mais ne t'inquiète pas, on va tout t'expliquer.
                </p>

                <!-- You could add a form here if needed -->
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-4 py-3 flex justify-end space-x-3">
                <button id="CancelBTN" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition-colors">
                    Annuler
                </button>
                <button id="SendTheChangeEmailToEmail" class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                    Continuer
                </button>
            </div>
        </div>
    </div>

    <div id="modalSettingProfileImage" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-[121]">
        <!-- Modal Dialog -->
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Modifie ton adresse email</h3>
                <button id="closeBTNModal" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <p class="text-gray-700 mb-4">
                    Pour modifier ton adresse email, tu dois d'abord créer un mot de passe Reddit. Mais ne t'inquiète pas, on va tout t'expliquer.
                </p>

                <!-- You could add a form here if needed -->
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-4 py-3 flex justify-end space-x-3">
                <button id="CancelBTN" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition-colors">
                    Annuler
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                    Continuer
                </button>
            </div>
        </div>
    </div>

    <div id="modalSettingBio" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-[121]">
        <!-- Modal Dialog -->
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Modifie ton adresse email</h3>
                <button id="closeBTNModal" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <p class="text-gray-700 mb-4">
                    Pour modifier ton adresse email, tu dois d'abord créer un mot de passe Reddit. Mais ne t'inquiète pas, on va tout t'expliquer.
                </p>

                <!-- You could add a form here if needed -->
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-4 py-3 flex justify-end space-x-3">
                <button id="CancelBTN" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition-colors">
                    Annuler
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                    Continuer
                </button>
            </div>
        </div>
    </div>

    <div id="modalSettingPassword" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-[121]">
        <!-- Modal Dialog -->
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Modifie ton adresse email</h3>
                <button id="closeBTNModal" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <p class="text-gray-700 mb-4">
                    Pour modifier ton adresse email, tu dois d'abord créer un mot de passe Reddit. Mais ne t'inquiète pas, on va tout t'expliquer.
                </p>

                <!-- You could add a form here if needed -->
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-4 py-3 flex justify-end space-x-3">
                <button id="CancelBTN" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition-colors">
                    Annuler
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                    Continuer
                </button>
            </div>
        </div>
    </div>


</x-UserHompage>

