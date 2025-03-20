<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">📄 Perfil Profesional</h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <!-- Nombre y Apellido -->
            <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $cv->nombre }} {{ $cv->apellido }}</h3>

            <!-- Estado del CV -->
            <span class="inline-block mt-2 px-4 py-1 text-sm font-medium 
                {{ $cv->publico ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} rounded-full">
                {{ $cv->publico ? '✅ CV Público' : '🔒 Privado' }}
            </span>

            <!-- Información Profesional -->
            <div class="mt-4">
                <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Experiencia</h4>
                <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $cv->experiencia }}</p>
            </div>

            <!-- Botón para Volver -->
            <div class="mt-6">
                <a href="{{ route('cv.index') }}"
                   class="px-6 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 transition-all">
                    🔙 Regresar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>



