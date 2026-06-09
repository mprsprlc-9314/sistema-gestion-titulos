<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Detalle del Título</h2>
        <a href="{{ route('titulos.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
            ← Volver
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Número Título</label>
                <p class="text-lg font-semibold">{{ $titulo->numero_titulo }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Estado</label>
                <span class="px-2 py-1 rounded text-sm 
                    @if($titulo->estado == 'activo') bg-green-100 text-green-800 
                    @elseif($titulo->estado == 'bloqueado') bg-yellow-100 text-yellow-800 
                    @else bg-red-100 text-red-800 @endif">
                    {{ $titulo->estado }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Dueño Actual</label>
                <p>{{ $titulo->socioActual ? $titulo->socioActual->apellidos . ' ' . $titulo->socioActual->nombres : 'Sin dueño' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Fecha Emisión</label>
                <p>{{ \Carbon\Carbon::parse($titulo->fecha_emision)->format('d/m/Y') }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Cantidad Parcelas</label>
                <p class="text-lg">{{ $titulo->cantidad_parcelas }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Cantidad Acciones</label>
                <p class="text-lg">{{ $titulo->cantidad_acciones }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Valor Nominal</label>
                <p>{{ $titulo->valor_nominal ? 'Bs. ' . number_format($titulo->valor_nominal, 2) : 'No registrado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Endosos</label>
                <p class="@if($titulo->endosos_realizados >= 3) text-red-600 font-bold @endif">
                    {{ $titulo->endosos_realizados }} de 3
                </p>
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-500">Observaciones</label>
                <p>{{ $titulo->observaciones ?? 'Sin observaciones' }}</p>
            </div>
        </div>
    </div>
</div>