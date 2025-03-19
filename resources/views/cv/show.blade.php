<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">📄 Ver CV</h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $cv->nombre }} {{ $cv->apellido }}</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $cv->experiencia }}</p>

            <span class="inline-block mt-3 px-3 py-1 text-sm font-medium 
                {{ $cv->publico ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} rounded-md">
                {{ $cv->publico ? 'Público' : 'Privado' }}
            </span>

            <div class="mt-6">
                <a href="{{ route('cv.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600">
                    🔙 Volver a mis CVs
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

