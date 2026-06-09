<div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Listado de Títulos</h2>
            <a href="{{ route('titulos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Nuevo Título</a>
        </div>

        @if(session('mensaje'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <!-- Búsqueda y Filtros -->
        <div class="flex gap-4 mb-4">
            <input type="text" wire:model.live="buscar" placeholder="Buscar por número de título o nombre del socio..." 
                   class="border rounded px-3 py-2 w-1/2">
            <select wire:model.live="estado" class="border rounded px-3 py-2">
                <option value="">Todos los estados</option>
                <option value="activo">Activo</option>
                <option value="extraviado">Extraviado</option>
                <option value="anulado">Anulado</option>
                <option value="bloqueado">Bloqueado</option>
            </select>
        </div>

        <!-- Tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">N° Título</th>
                    <th class="border p-2 text-left">Dueño</th>
                    <th class="border p-2 text-center">Parcelas</th>
                    <th class="border p-2 text-center">Acciones</th>
                    <th class="border p-2 text-center">Endosos</th>
                    <th class="border p-2 text-left">Estado</th>
                    <th class="border p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($titulos as $titulo)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2 font-medium">{{ $titulo->numero_titulo }}</td>
                    <td class="border p-2">{{ $titulo->socioActual ? $titulo->socioActual->apellidos . ' ' . $titulo->socioActual->nombres : 'Sin dueño' }}</td>
                    <td class="border p-2 text-center">{{ $titulo->cantidad_parcelas }}</td>
                    <td class="border p-2 text-center">{{ $titulo->cantidad_acciones }}</td>
                    <td class="border p-2 text-center">
                        <span class="@if($titulo->endosos_realizados >= 3) text-red-600 font-bold @endif">
                            {{ $titulo->endosos_realizados }}/3
                        </span>
                    </td>
                    <td class="border p-2">
                        <span class="px-2 py-1 rounded text-sm 
                            @if($titulo->estado == 'activo') bg-green-100 text-green-800 
                            @elseif($titulo->estado == 'bloqueado') bg-yellow-100 text-yellow-800 
                            @else bg-red-100 text-red-800 @endif">
                            {{ $titulo->estado }}
                        </span>
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('titulos.show', $titulo->id) }}" class="text-blue-500 mr-2">Ver</a>
                        <a href="{{ route('titulos.edit', $titulo->id) }}" class="text-green-500">Editar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="border p-4 text-center text-gray-500">No se encontraron títulos</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $titulos->links() }}
        </div>
    </div>
</div>