<div>
    @if(session('error'))
        <div class="p-4 mb-4 text-red-800 bg-red-200 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    @if ($cvs->isEmpty())
        <p class="text-gray-500 dark:text-gray-400">Aún no has creado ningún CV.</p>
    @else
        <ul class="space-y-4">
            @foreach ($cvs as $cv)
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
                            <button wire:click="copiarEnlace({{ $cv->id }})"
                                    class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600">
                                📋 Copiar Enlace
                            </button>
                        @endif

                        <a href="{{ route('cv.edit', $cv->id) }}"
                           class="px-4 py-2 bg-yellow-500 text-white rounded-md shadow hover:bg-yellow-600">
                            ✏️ Editar CV
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <script>
        Livewire.on('copiar-enlace', link => {
            navigator.clipboard.writeText(link).then(() => {
                alert('✅ Enlace copiado al portapapeles: ' + link);
            }).catch(() => {
                alert('❌ No se pudo copiar el enlace.');
            });
        });
    </script>
</div>


