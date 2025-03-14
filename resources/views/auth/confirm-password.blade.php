<x-guest-layout>
    <x-header></x-header>
    <div class="bg-gray-100 flex justify-center items-center min-h-screen">
        <div class="bg-white rounded-lg shadow-md w-full max-w-md p-8">


            <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Réinitialiser le mot de passe</h1>
            @if (session('error'))
                <div class=" top-[80px] right-[80px] p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="post" action="{{route('Password.updateThePassword')}}">
                @csrf
                <div class="mb-6">
                    <label for="new-password" class="sr-only">Nouveau mot de passe</label>
                    <input
                        name="password"
                        type="text"
                        id="new-password"
                        class="w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-gray-300 focus:bg-white focus:ring-0"
                        placeholder="Nouveau mot de passe *"
                        required
                        value="{{old('password')}}"
                    >
                </div>

                <div class="mb-8">
                    <label for="confirm-password" class="sr-only">Confirmer le nouveau mot de passe</label>
                    <input
                        name="passwordConfirm"
                        type="text"
                        id="confirm-password"
                        class="w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-gray-300 focus:bg-white focus:ring-0"
                        placeholder="Confirmer le nouveau mot de passe *"
                        required
                        value="{{old('passwordConfirm')}}"
                    >
                </div>

                <p class="text-sm text-gray-500 text-center mb-8">
                    La réinitialisation de ton mot de passe te déconnectera de tous tes appareils.
                </p>

                <button
                    type="submit"
                    class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-3 px-4 rounded-md transition duration-300"
                >
                    Continuer
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
