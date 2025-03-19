<div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md w-full max-w-3xl mx-auto">
    <!-- Mensaje de éxito con actualización automática -->
    <div x-data="{ show: false }" x-show="show" x-transition
         x-init="@this.on('cvSaved', () => { show = true; setTimeout(() => show = false, 3000); })"
         class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg flex items-center">
        ✅ CV creado exitosamente.
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">✍️ Crear mi CV</h2>

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="nombre" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre</label>
            <input type="text" id="nombre" wire:model="nombre" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="apellido" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Apellido</label>
            <input type="text" id="apellido" wire:model="apellido" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="experiencia" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Experiencia</label>
            <textarea id="experiencia" wire:model="experiencia" rows="4" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            @error('experiencia') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center">
            <input type="checkbox" id="publico" wire:model="publico" class="text-blue-600 focus:ring-blue-500 border-gray-300 dark:border-gray-600 dark:bg-gray-800 rounded">
            <label for="publico" class="ml-2 text-gray-700 dark:text-gray-300">Hacer CV público</label>
        </div>

        <!-- Botón con indicador de carga -->
        <div class="flex justify-end">
            <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white px-6 py-2 rounded-md font-semibold shadow-md transition flex items-center justify-center"
                wire:target="save"
                wire:loading.attr="disabled">
                🚀 Guardar CV
            </button>
        </div>

        <!-- Mensaje de carga -->
        <div wire:loading wire:target="save" class="mt-4 text-blue-500 font-semibold flex items-center">
            ⏳ Guardando CV, por favor espera...
        </div>
    </form>
</div>






