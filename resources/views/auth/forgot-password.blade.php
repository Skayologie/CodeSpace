<x-guest-layout>
    <x-header></x-header>
    <div class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div id="loginForm" class="bg-white rounded-lg shadow-md p-8 w-full max-w-md relative">
      <!-- Close button -->
      <button class="absolute top-4 right-4 text-blue-500 hover:bg-gray-100 p-1 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10" />
          <line x1="15" y1="9" x2="9" y2="15" />
          <line x1="9" y1="9" x2="15" y2="15" />
        </svg>
      </button>
      
      <!-- Title -->
      <h1 class="text-2xl font-semibold text-center mb-2">Forget your password ?</h1>
      


      
      <!-- Divider -->
      <div class="flex items-center my-6">
        <div class="flex-grow border-t border-gray-300"></div>
        <div class="flex-grow border-t border-gray-300"></div>
      </div>
      
      <!-- Login form -->
      <form method="POST" action="{{route('password.reset')}}">
        @csrf
        <div class="space-y-4">
          <div>
            <input id="email" type="email" placeholder="Adresse email *" required
              class="w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
          </div>
        </div>
        <!-- New to site -->
        <div class="mt-6 text-sm">
          Première fois sur Reddit ? <a href="#" class="text-blue-600 hover:underline" onclick="toggleForms()">Inscris-toi</a>
        </div>
        
        <!-- Submit button -->
        <button type="submit" id="sendBtn" class="w-full mt-6 py-3 px-4 bg-gray-200 hover:bg-gray-300 rounded-full text-gray-700">
          Send Token
        </button>
      </form>
    </div>
  </div>
</x-guest-layout>
