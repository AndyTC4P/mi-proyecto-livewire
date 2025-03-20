<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menú') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            
            <!-- Pestañas -->
            <div class="flex border-b mb-4">
                <button class="tab-btn px-4 py-2 text-lg font-semibold border-b-2 border-transparent focus:outline-none"
                    onclick="showTab('crear-cv')">
                    📝 Crear CV
                </button>
                <button class="tab-btn px-4 py-2 text-lg font-semibold border-b-2 border-transparent focus:outline-none"
                    onclick="showTab('mis-cvs')">
                    📄 Mis CVs
                </button>
            </div>

            <!-- Contenido de las pestañas -->
            <div id="crear-cv" class="tab-content">
                @livewire('cv-form')
            </div>

            <div id="mis-cvs" class="tab-content hidden">
                @livewire('cv-list')
            </div>

        </div>
    </div>

    <script>
        function showTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
            document.getElementById(tabId).classList.remove('hidden');

            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('border-blue-500'));
            event.target.classList.add('border-blue-500');
        }
    </script>

</x-app-layout>
