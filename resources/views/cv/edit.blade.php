<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">✏️ Editar CV</h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('cv.update', $cv->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $cv->nombre }}"
                        class="w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white">
                </div>

                <div class="mb-4">
                    <label for="apellido" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="{{ $cv->apellido }}"
                        class="w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white">
                </div>

                <div class="mb-4">
                    <label for="experiencia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Experiencia</label>
                    <textarea id="experiencia" name="experiencia" rows="4"
                        class="w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white">{{ $cv->experiencia }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="publico" class="flex items-center">
                        <input type="checkbox" id="publico" name="publico" {{ $cv->publico ? 'checked' : '' }}
                            class="text-blue-600 border-gray-300 rounded">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">CV Público</span>
                    </label>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('cv.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600">
                        🔙 Cancelar
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                        💾 Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
