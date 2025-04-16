<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier mon profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('status'))
                        <div class="text-green-500 mb-4 p-4 bg-green-100 rounded-md">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Div to modify email-->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" required>
                        </div>

                        <!-- Div to modify password-->
                        <div class="mt-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        </div>

                        <!-- Div to confirm modify password-->
                        <div class="mt-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        </div>

                        <!-- Div to modify profile photo -->
                        <div class="mt-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700">Photo de profil</label>
                            <input type="file" name="photo" id="photo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Mettre à jour le profil
                            </button>
                        </div>
                    </form>

                    <!-- Delete account-->
                    <form action="{{ route('profile.destroy') }}" method="POST" class="mt-6">
                        @csrf
                        @method('DELETE')

                        <!-- Confirm delete to be sure -->
                        <div class="mt-4">
                            <label for="confirmation" class="block text-sm font-medium text-red-500">
                                Pour supprimer votre compte, tapez "supprimer" dans ce champ :
                            </label>
                            <input type="text" name="confirmation" id="confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                            Supprimer mon compte
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
