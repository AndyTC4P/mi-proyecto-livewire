<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">📄 Mis CVs</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Lista de CVs</h3>

            @if(session('error'))
                <div class="p-4 mb-4 text-red-800 bg-red-200 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            @if ($cvs->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">No has creado ningún CV aún.</p>
            @else
                <ul class="space-y-4">
                    @foreach ($cvs as $cv)
                        <li class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md shadow-md flex justify-between items-center">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $cv->nombre }} {{ $cv->apellido }}
                                </h4>
                                <p class="text-gray-600 dark:text-gray-300">{{ $cv->experiencia }}</p>
                                <span class="text-sm {{ $cv->publico ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $cv->publico ? 'Público' : 'Privado' }}
                                </span>
                            </div>

                            <a href="{{ route('cv.show', $cv->id) }}"
                               class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">
                                Ver CV
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>
