<div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md w-full max-w-3xl mx-auto">
    <!-- Mensaje de éxito con actualización automática -->
    <div x-data="{ show: false }" x-show="show" x-transition
         x-init="@this.on('cvSaved', () => { show = true; setTimeout(() => show = false, 3000); })"
         class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg flex items-center">
        ✅ CV creado exitosamente.
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">✍️ Crear mi CV</h2>

    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Nombre -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre</label>
            <input type="text" wire:model="nombre" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Apellido -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Apellido</label>
            <input type="text" wire:model="apellido" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Título o Profesión -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Título o Profesión</label>
            <input type="text" wire:model="titulo" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Perfil Profesional -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Perfil Profesional</label>
            <textarea wire:model="perfil" rows="4" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            @error('perfil') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Imagen de Perfil -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Imagen de Perfil</label>
            <input type="file" wire:model="imagen">
            @error('imagen') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Contacto -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Correo Electrónico</label>
            <input type="email" wire:model="correo" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('correo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Número de Contacto</label>
            <input type="text" wire:model="telefono" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('telefono') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Dirección</label>
            <input type="text" wire:model="direccion" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('direccion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Experiencia Laboral -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Experiencia Laboral</label>
            @foreach($experiencia as $index => $exp)
                <div class="mt-2 flex gap-2">
                    <input type="text" wire:model="experiencia.{{$index}}.empresa" placeholder="Empresa" class="w-full">
                    <input type="text" wire:model="experiencia.{{$index}}.puesto" placeholder="Puesto" class="w-full">
                    <input type="date" wire:model="experiencia.{{$index}}.inicio" class="w-full">
                    <input type="date" wire:model="experiencia.{{$index}}.fin" class="w-full">
                    <button wire:click="removeExperience({{$index}})" class="text-red-500">🗑</button>
                </div>
            @endforeach
            <button wire:click="addExperience()" class="mt-2 px-4 py-2 bg-green-500 text-white rounded">+ Agregar Experiencia</button>
        </div>

        <!-- Estudios Superiores -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Estudios Superiores</label>
            @foreach($educacion as $index => $edu)
                <div class="mt-2 flex gap-2">
                    <input type="text" wire:model="educacion.{{$index}}.universidad" placeholder="Universidad" class="w-full">
                    <input type="text" wire:model="educacion.{{$index}}.carrera" placeholder="Carrera" class="w-full">
                    <input type="date" wire:model="educacion.{{$index}}.inicio" class="w-full">
                    <input type="date" wire:model="educacion.{{$index}}.fin" class="w-full">
                    <button wire:click="removeEducation({{$index}})" class="text-red-500">🗑</button>
                </div>
            @endforeach
            <button wire:click="addEducation()" class="mt-2 px-4 py-2 bg-green-500 text-white rounded">+ Agregar Estudio</button>
        </div>

        <!-- Opción de CV Público -->
        <div class="flex items-center">
            <input type="checkbox" wire:model="publico" class="text-blue-600">
            <label class="ml-2 text-gray-700 dark:text-gray-300">Hacer CV público</label>
        </div>

        <!-- Botón con indicador de carga -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md font-semibold shadow-md hover:bg-blue-600 transition flex items-center justify-center" wire:loading.attr="disabled">
                🚀 Guardar CV
            </button>
        </div>

        <!-- Mensaje de carga -->
        <div wire:loading wire:target="save" class="mt-4 text-blue-500 font-semibold flex items-center">
            ⏳ Guardando CV, por favor espera...
        </div>
    </form>
</div>







