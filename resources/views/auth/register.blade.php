<x-guest-layout>
    <x-header></x-header>
    <!-- Registration Form Card -->
  <div class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div id="registerForm" class="bg-white rounded-lg shadow-md p-8 w-full max-w-md relative">
    <!-- Close button -->
    <button class="absolute top-4 right-4 text-blue-500 hover:bg-gray-100 p-1 rounded-full">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10" />
        <line x1="15" y1="9" x2="9" y2="15" />
        <line x1="9" y1="9" x2="15" y2="15" />
      </svg>
    </button>
    
    <!-- Title -->
    <h1 class="text-2xl font-semibold text-center mb-2">S'inscrire</h1>
    
    <!-- Terms notice -->
    <p class="text-sm text-center text-gray-600 mb-6">
      En continuant, tu acceptes notre <a href="#" class="text-blue-600 hover:underline">Contrat d'utilisation</a> et 
      reconnais que tu comprends notre <a href="#" class="text-blue-600 hover:underline">Politique de confidentialité</a>.
    </p>
    
    <!-- Social login buttons -->
    <div class="space-y-3 mb-4">
      <button class="flex items-center justify-center w-full py-2 px-4 border border-gray-300 rounded-full hover:bg-gray-50">
        <img src="https://cdn.cdnlogo.com/logos/g/35/google-icon.svg" class="w-5 h-5 mr-2" alt="Google logo">
        Continuer avec Google
      </button>
      <button class="flex items-center justify-center w-full py-2 px-4 border border-gray-300 rounded-full hover:bg-gray-50">
        <img src="https://cdn.cdnlogo.com/logos/a/92/apple.svg" class="w-5 h-5 mr-2" alt="Apple logo">
        Continue With Apple
      </button>
    </div>
    
    <!-- Divider -->
    <div class="flex items-center my-6">
      <div class="flex-grow border-t border-gray-300"></div>
      <span class="px-3 text-gray-500 text-sm">Ou</span>
      <div class="flex-grow border-t border-gray-300"></div>
    </div>
    
    <!-- Registration form -->
    <form>
      <div class="space-y-4">
        <div>
          <input type="email" placeholder="Adresse email *" required
            class="w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
        </div>
        <div>
                <input type="text" placeholder="Nom d'utilisateur *" required
                    class="w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                </div>
                <div>
                <input type="password" placeholder="Mot de passe *" required
                    class="w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                </div>
            </div>
            
            <!-- Already have account -->
            <div class="mt-6 text-sm">
                Déjà inscrit ? <a href="#" class="text-blue-600 hover:underline" onclick="toggleForms()">Connecte-toi</a>
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="w-full mt-6 py-3 px-4 bg-gray-200 hover:bg-gray-300 rounded-full text-gray-700">
                S'inscrire
            </button>
            </form>
        </div>
    </div>
</x-guest-layout>
