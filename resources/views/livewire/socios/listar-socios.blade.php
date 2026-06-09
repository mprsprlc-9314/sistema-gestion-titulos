<div>
    <div class="p-6">
		@if(session('mensaje'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('mensaje') }}
    </div>
@endif
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Listado de Socios</h2>
			<a href="{{ route('socios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Nuevo Socio</a>       
		</div>

        <!-- Búsqueda y Filtros -->
        <div class="flex gap-4 mb-4">
            <input type="text" wire:model.live="buscar" placeholder="Buscar por nombre, código o documento..." 
                   class="border rounded px-3 py-2 w-1/2">
            <select wire:model.live="estado" class="border rounded px-3 py-2">
                <option value="">Todos los estados</option>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="fallecido">Fallecido</option>
                <option value="suspendido">Suspendido</option>
            </select>
        </div>

        <!-- Tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Código</th>
                    <th class="border p-2 text-left">Nombres</th>
                    <th class="border p-2 text-left">Apellidos</th>
                    <th class="border p-2 text-left">Documento</th>
                    <th class="border p-2 text-left">Teléfono</th>
                    <th class="border p-2 text-left">Estado</th>
                    <th class="border p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($socios as $socio)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2">{{ $socio->codigo_socio }}</td>
                    <td class="border p-2">{{ $socio->nombres }}</td>
                    <td class="border p-2">{{ $socio->apellidos }}</td>
                    <td class="border p-2">{{ $socio->numero_documento }}</td>
                    <td class="border p-2">{{ $socio->telefono }}</td>
                    <td class="border p-2">
                        <span class="px-2 py-1 rounded text-sm 
                            @if($socio->estado == 'activo') bg-green-100 text-green-800 
                            @elseif($socio->estado == 'inactivo') bg-gray-100 text-gray-800 
                            @else bg-red-100 text-red-800 @endif">
                            {{ $socio->estado }}
                        </span>
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('socios.show', $socio->id) }}" class="text-blue-500 mr-2">Ver</a>
                        <a href="{{ route('socios.edit', $socio->id) }}" class="text-green-500">Editar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="border p-4 text-center text-gray-500">No se encontraron socios</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $socios->links() }}
        </div>
    </div>
</div>