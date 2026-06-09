<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Nueva Transferencia</h2>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit="save" class="max-w-2xl">
        <div class="grid grid-cols-2 gap-4">
            <!-- Seleccionar Título -->
            <div class="col-span-2">
                <label class="block text-sm font-medium mb-1">Título *</label>
                <select wire:model.live="id_titulo" class="border rounded px-3 py-2 w-full">
                    <option value="">Seleccione título...</option>
                    @foreach($titulos as $titulo)
                        <option value="{{ $titulo->id }}">
                            {{ $titulo->numero_titulo }} - 
                            Dueño: {{ $titulo->socioActual->apellidos ?? '' }} {{ $titulo->socioActual->nombres ?? '' }}
                            (Endosos: {{ $titulo->endosos_realizados }}/3)
                        </option>
                    @endforeach
                </select>
                @error('id_titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            @if($tituloSeleccionado)
            <div class="col-span-2 bg-blue-50 p-3 rounded">
                <p class="text-sm"><strong>Dueño actual:</strong> {{ $tituloSeleccionado->socioActual->apellidos ?? '' }} {{ $tituloSeleccionado->socioActual->nombres ?? '' }}</p>
                <p class="text-sm"><strong>Endosos:</strong> {{ $tituloSeleccionado->endosos_realizados }}/3</p>
                <p class="text-sm"><strong>Parcelas:</strong> {{ $tituloSeleccionado->cantidad_parcelas }} | <strong>Acciones:</strong> {{ $tituloSeleccionado->cantidad_acciones }}</p>
            </div>
            @endif

            <!-- Cesionario -->
            <div class="col-span-2">
                <label class="block text-sm font-medium mb-1">Nuevo Dueño (Cesionario) *</label>
                <select wire:model="id_socio_cesionario" class="border rounded px-3 py-2 w-full">
                    <option value="">Seleccione socio...</option>
                    @foreach($socios as $socio)
                        <option value="{{ $socio->id }}">{{ $socio->apellidos }} {{ $socio->nombres }} ({{ $socio->codigo_socio }})</option>
                    @endforeach
                </select>
                @error('id_socio_cesionario') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Tipo -->
            <div>
                <label class="block text-sm font-medium mb-1">Tipo *</label>
                <select wire:model="tipo_transferencia" class="border rounded px-3 py-2 w-full">
                    <option value="venta">Venta</option>
                    <option value="herencia">Herencia</option>
                    <option value="donacion">Donación</option>
                </select>
            </div>

            <!-- Monto -->
            <div>
                <label class="block text-sm font-medium mb-1">Monto</label>
                <input type="number" wire:model="monto" class="border rounded px-3 py-2 w-full" step="0.01">
            </div>

            <!-- Datos Notariales -->
            <div class="col-span-2 mt-2">
                <h3 class="font-bold mb-2">Datos Notariales</h3>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Notario *</label>
                <input type="text" wire:model="notario_nombre" class="border rounded px-3 py-2 w-full">
                @error('notario_nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">N° Notaría *</label>
                <input type="text" wire:model="notario_numero" class="border rounded px-3 py-2 w-full">
                @error('notario_numero') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">N° Acta Notarial *</label>
                <input type="text" wire:model="acta_notarial_numero" class="border rounded px-3 py-2 w-full">
                @error('acta_notarial_numero') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Fecha Acta *</label>
                <input type="date" wire:model="fecha_acta_notarial" class="border rounded px-3 py-2 w-full">
                @error('fecha_acta_notarial') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Completar Transferencia
            </button>
            <a href="{{ route('transferencias.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancelar
            </a>
        </div>
    </form>
</div>