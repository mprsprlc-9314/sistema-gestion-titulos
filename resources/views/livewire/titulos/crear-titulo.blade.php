<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Nuevo Título</h2>

    <form wire:submit="save" class="max-w-2xl">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Número de Título *</label>
                <input type="text" wire:model="numero_titulo" class="border rounded px-3 py-2 w-full">
                @error('numero_titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Fecha Emisión *</label>
                <input type="date" wire:model="fecha_emision" class="border rounded px-3 py-2 w-full">
                @error('fecha_emision') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Cantidad Parcelas *</label>
                <input type="number" wire:model="cantidad_parcelas" class="border rounded px-3 py-2 w-full" min="0">
                @error('cantidad_parcelas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Cantidad Acciones *</label>
                <input type="number" wire:model="cantidad_acciones" class="border rounded px-3 py-2 w-full" min="0">
                @error('cantidad_acciones') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Valor Nominal</label>
                <input type="number" wire:model="valor_nominal" class="border rounded px-3 py-2 w-full" step="0.01">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Dueño *</label>
                <select wire:model="id_socio_actual" class="border rounded px-3 py-2 w-full">
                    <option value="">Seleccione socio...</option>
                    @foreach($socios as $socio)
                        <option value="{{ $socio->id }}">{{ $socio->apellidos }} {{ $socio->nombres }} ({{ $socio->codigo_socio }})</option>
                    @endforeach
                </select>
                @error('id_socio_actual') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium mb-1">Observaciones</label>
                <textarea wire:model="observaciones" class="border rounded px-3 py-2 w-full" rows="3"></textarea>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Guardar
            </button>
            <a href="{{ route('titulos.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancelar
            </a>
        </div>
    </form>
</div>