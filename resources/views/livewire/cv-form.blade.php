<div class="max-w-xl mx-auto bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 p-8 rounded-xl shadow-xl text-white">
    <h2 class="text-3xl font-bold text-center mb-6">📄 Crea tu CV</h2>

    @if (session()->has('message'))
        <div class="bg-green-600 text-white p-3 rounded-lg shadow-lg mb-4 animate-fade">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-5">
        <!-- Nombre -->
        <div>
            <label class="block text-lg font-semibold mb-1">Nombre:</label>
            <input type="text" wire:model="nombre" placeholder="Tu nombre" class="w-full border-2 border-gray-700 bg-gray-800 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('nombre') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Apellido -->
        <div>
            <label class="block text-lg font-semibold mb-1">Apellido:</label>
            <input type="text" wire:model="apellido" placeholder="Tu apellido" class="w-full border-2 border-gray-700 bg-gray-800 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('apellido') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Experiencia -->
        <div>
            <label class="block text-lg font-semibold mb-1">Experiencia:</label>
            <textarea wire:model="experiencia" placeholder="Describe tu experiencia..." class="w-full border-2 border-gray-700 bg-gray-800 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 h-28"></textarea>
            @error('experiencia') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Check Publico/Privado -->
        <div class="flex items-center">
            <input type="checkbox" wire:model="publico" class="w-5 h-5 text-blue-400 bg-gray-800 border-gray-700 rounded focus:ring-2 focus:ring-blue-400">
            <label class="ml-2 text-lg">¿Hacer mi CV público?</label>
        </div>

        <!-- Botón Guardar -->
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 transition-all text-white font-bold py-3 rounded-lg shadow-lg">
            🚀 Guardar CV
        </button>
    </form>
</div>


