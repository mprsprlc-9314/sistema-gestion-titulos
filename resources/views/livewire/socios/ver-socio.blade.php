<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Detalle del Socio</h2>
        <a href="{{ route('socios.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
            ← Volver
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Código</label>
                <p class="text-lg">{{ $socio->codigo_socio }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Estado</label>
                <span class="px-2 py-1 rounded text-sm 
                    @if($socio->estado == 'activo') bg-green-100 text-green-800 
                    @elseif($socio->estado == 'inactivo') bg-gray-100 text-gray-800 
                    @else bg-red-100 text-red-800 @endif">
                    {{ $socio->estado }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Tipo Documento</label>
                <p>{{ $socio->tipo_documento }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Número Documento</label>
                <p>{{ $socio->numero_documento }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Nombres</label>
                <p class="text-lg font-semibold">{{ $socio->nombres }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Apellidos</label>
                <p class="text-lg font-semibold">{{ $socio->apellidos }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Fecha Nacimiento</label>
                <p>{{ $socio->fecha_nacimiento ? \Carbon\Carbon::parse($socio->fecha_nacimiento)->format('d/m/Y') : 'No registrado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Estado Civil</label>
                <p>{{ $socio->estado_civil ?? 'No registrado' }}</p>
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-500">Domicilio</label>
                <p>{{ $socio->domicilio ?? 'No registrado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Teléfono</label>
                <p>{{ $socio->telefono ?? 'No registrado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Email</label>
                <p>{{ $socio->email ?? 'No registrado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Fecha Ingreso</label>
                <p>{{ $socio->fecha_ingreso ? \Carbon\Carbon::parse($socio->fecha_ingreso)->format('d/m/Y') : 'No registrado' }}</p>
            </div>
        </div>
    </div>
</div>