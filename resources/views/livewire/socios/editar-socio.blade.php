<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Editar Socio</h2>

    <form wire:submit="save" class="max-w-2xl">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Código *</label>
                <input type="text" wire:model="codigo_socio" class="border rounded px-3 py-2 w-full">
                @error('codigo_socio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Estado</label>
                <select wire:model="estado" class="border rounded px-3 py-2 w-full">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                    <option value="suspendido">Suspendido</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tipo Documento *</label>
                <select wire:model="tipo_documento" class="border rounded px-3 py-2 w-full">
                    <option value="CI">CI</option>
                    <option value="NIT">NIT</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Número Documento *</label>
                <input type="text" wire:model="numero_documento" class="border rounded px-3 py-2 w-full">
                @error('numero_documento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Nombres *</label>
                <input type="text" wire:model="nombres" class="border rounded px-3 py-2 w-full">
                @error('nombres') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Apellidos *</label>
                <input type="text" wire:model="apellidos" class="border rounded px-3 py-2 w-full">
                @error('apellidos') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Fecha Nacimiento</label>
                <input type="date" wire:model="fecha_nacimiento" class="border rounded px-3 py-2 w-full">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Estado Civil</label>
                <select wire:model="estado_civil" class="border rounded px-3 py-2 w-full">
                    <option value="">Seleccione...</option>
                    <option value="soltero">Soltero</option>
                    <option value="casado">Casado</option>
                    <option value="viudo">Viudo</option>
                    <option value="divorciado">Divorciado</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium mb-1">Domicilio</label>
                <input type="text" wire:model="domicilio" class="border rounded px-3 py-2 w-full">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Teléfono</label>
                <input type="text" wire:model="telefono" class="border rounded px-3 py-2 w-full">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" wire:model="email" class="border rounded px-3 py-2 w-full">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Fecha Ingreso *</label>
                <input type="date" wire:model="fecha_ingreso" class="border rounded px-3 py-2 w-full">
                @error('fecha_ingreso') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                Actualizar
            </button>
            <a href="{{ route('socios.show', $socio->id) }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancelar
            </a>
        </div>
    </form>
</div>