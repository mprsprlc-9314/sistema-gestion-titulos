<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Nuevo Gravamen</h2>

    <form wire:submit="save" class="max-w-2xl">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <label class="block text-sm font-medium mb-1">Título *</label>
                <select wire:model="id_titulo" class="border rounded px-3 py-2 w-full">
                    <option value="">Seleccione título...</option>
                    @foreach($titulos as $titulo)
                        <option value="{{ $titulo->id }}">{{ $titulo->numero_titulo }}</option>
                    @endforeach
                </select>
                @error('id_titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tipo *</label>
                <select wire:model="tipo" class="border rounded px-3 py-2 w-full">
                    <option value="embargo">Embargo</option>
                    <option value="hipoteca">Hipoteca</option>
                    <option value="restriccion_judicial">Restricción Judicial</option>
                    <option value="prenda">Prenda</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Entidad *</label>
                <input type="text" wire:model="entidad" class="border rounded px-3 py-2 w-full">
                @error('entidad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Fecha Inicio *</label>
                <input type="date" wire:model="fecha_inicio" class="border rounded px-3 py-2 w-full">
                @error('fecha_inicio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Fecha Fin</label>
                <input type="date" wire:model="fecha_fin" class="border rounded px-3 py-2 w-full">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Monto</label>
                <input type="number" wire:model="monto" class="border rounded px-3 py-2 w-full" step="0.01">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">N° Expediente</label>
                <input type="text" wire:model="numero_expediente" class="border rounded px-3 py-2 w-full">
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium mb-1">Juzgado</label>
                <input type="text" wire:model="juzgado" class="border rounded px-3 py-2 w-full">
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Guardar
            </button>
            <a href="{{ route('gravamenes.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancelar
            </a>
        </div>
    </form>
</div>