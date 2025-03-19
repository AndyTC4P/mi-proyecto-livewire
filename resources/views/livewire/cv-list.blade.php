<div>
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

                    <div class="flex gap-2">
                        <a href="{{ route('cv.show', $cv->id) }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">
                            Ver CV
                        </a>

                        @if ($cv->publico)
                            <button onclick="copiarEnlace('{{ route('cv.show', $cv->id) }}')"
                                class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                                📋 Copiar Enlace
                            </button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <script>
        function copiarEnlace(link) {
            navigator.clipboard.writeText(link).then(() => {
                alert('✅ Enlace copiado al portapapeles: ' + link);
            }).catch(err => {
                console.error('Error al copiar enlace: ', err);
                alert('❌ Error al copiar el enlace. Inténtalo manualmente.');
            });
        }
    </script>
</div>

