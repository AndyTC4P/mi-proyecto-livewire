<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✍️ Nuevo Currículum
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <!-- Encabezado amigable -->
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Completa los datos para generar tu CV</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
                    Puedes actualizarlo cuando quieras. ¡Hazlo destacar! 🚀
                </p>
            </div>

            <!-- Componente Livewire -->
            @livewire('cv-form')

        </div>
    </div>
</x-app-layout>


