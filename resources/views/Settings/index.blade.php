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
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-xl shadow-lg">
            <h1 class="text-2xl font-bold text-center text-gray-800">Profile Settings</h1>

            <div class="flex flex-col items-center space-y-4 w-full">
                <h2 class="text-lg font-medium text-gray-700">Profile Photo</h2>

                <!-- Profile Image Container -->
                <div id="profile-container" class="relative group cursor-pointer">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-200 bg-gray-100 flex items-center justify-center">
                        <img
                            id="profile-image"
                            src="{{$user->profilePicture}}"
                            alt="Profile"
                            class="w-full h-full object-cover"
                        />
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-white text-sm font-medium">Change Photo</span>
                    </div>
                    <input type="file" id="profile-upload" accept="image/*" class="hidden" />
                </div>

                <!-- Preview Container (Hidden by default) -->
                <div id="preview-container" class="hidden flex flex-col items-center space-y-4 w-full">
                    <div class="relative w-full">
                        <div class="w-full h-0.5 bg-gray-200 absolute top-1/2 transform -translate-y-1/2"></div>
                        <div class="relative flex justify-center">
                            <span class="px-2 bg-white text-sm text-gray-500">Preview</span>
                        </div>
                    </div>

                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-blue-200 bg-gray-100">
                        <img
                            id="preview-image"
                            src="https://via.placeholder.com/128"
                            alt="Preview"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <div class="flex space-x-3">
                        <button
                            id="cancel-button"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Cancel
                        </button>
                        <button
                            id="save-button"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalSettingBio" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-[121]">
        <!-- Modal Dialog -->
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden">
            <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-xl shadow-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800">Change Bio</h1>

                <!-- Bio Section -->
                <div class="flex flex-col space-y-4 w-full pt-2">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-700">Bio</h2>
                        <button
                            id="edit-bio-button"
                            class="text-sm font-medium text-blue-600 hover:text-blue-800 focus:outline-none"
                        >
                            Edit
                        </button>
                    </div>

                    <!-- Bio Display (Visible by default) -->
                    <div id="bio-display" class="bg-gray-50 p-4 rounded-lg">
                        <p id="bio-text" class="text-gray-700">
                            {{session("user")->bio}}
                        </p>
                    </div>

                    <!-- Bio Edit Form (Hidden by default) -->
                    <div id="bio-edit-container" class="hidden space-y-3">
                        <div class="relative">
          <textarea
              id="bio-textarea"
              class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-32 resize-none"
              placeholder="Write a short bio about yourself..."
              maxlength="250"
          ></textarea>
                            <div id="char-counter" class="absolute bottom-2 right-2 text-xs text-gray-500">
                                0/250
                            </div>
                        </div>

                        <div class="flex space-x-3 justify-end">
                            <button
                                id="cancel-bio-button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                Cancel
                            </button>
                            <button
                                id="save-bio-button"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
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
    <script>
        // Wait for the DOM to be fully loaded
    </script>
</x-UserHompage>

