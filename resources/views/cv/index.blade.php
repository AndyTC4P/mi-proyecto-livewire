<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">📄 Mis CVs</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Lista de CVs</h3>

            @if(session('message'))
                <div class="p-4 mb-4 bg-green-200 text-green-800 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 mb-4 text-red-800 bg-red-200 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            @if($cvs->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">Aún no has creado ningún CV.</p>
            @else
                <ul class="space-y-4">
                    @foreach($cvs as $cv)
                        <li class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md shadow-md flex justify-between items-center">
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white">
                                    {{ $cv->nombre }} {{ $cv->apellido }}
                                </h4>
                                <p class="text-sm text-gray-300">{{ $cv->titulo ?? 'Sin título' }}</p>
                                <p class="text-xs text-gray-400">Actualizado: {{ $cv->updated_at->format('d/m/Y H:i') }}</p>

                                <span class="text-sm {{ $cv->publico ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $cv->publico ? 'Público' : 'Privado' }}
                                </span>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('cv.show', $cv->id) }}"
                                   class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">
                                    👀 Ver CV
                                </a>

                                @if($cv->publico)
                                    <button onclick="copiarEnlace('{{ route('cv.show', $cv->id) }}')"
                                            class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                                        📋 Copiar Enlace
                                    </button>
                                @endif

                                <a href="{{ route('cv.edit', $cv->id) }}"
                                   class="px-4 py-2 bg-yellow-500 text-white rounded-md shadow hover:bg-yellow-600">
                                    ✏️ Editar CV
                                </a>
                                <form action="{{ route('cv.destroy', $cv->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este CV?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md shadow hover:bg-red-600">
        🗑 Eliminar
    </button>
</form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <script>
        function copiarEnlace(link) {
            navigator.clipboard.writeText(link).then(() => {
                alert('✅ Enlace copiado al portapapeles: ' + link);
            }).catch(err => {
                alert('❌ Error al copiar el enlace.');
                console.error(err);
            });
        }
    </script>
</x-app-layout>


