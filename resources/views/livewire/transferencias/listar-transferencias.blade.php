<div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Transferencias</h2>
            <a href="{{ route('transferencias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Nueva Transferencia</a>
        </div>

        @if(session('mensaje'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <!-- Filtros -->
        <div class="flex gap-4 mb-4">
            <input type="text" wire:model.live="buscar" placeholder="Buscar por título o socio..." 
                   class="border rounded px-3 py-2 w-1/2">
            <select wire:model.live="estado" class="border rounded px-3 py-2">
                <option value="">Todos los estados</option>
                <option value="pendiente_creacion">Pendiente</option>
                <option value="completada">Completada</option>
                <option value="revertida">Revertida</option>
                <option value="rechazada">Rechazada</option>
            </select>
        </div>

        <!-- Tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Título</th>
                    <th class="border p-2 text-left">Cedente</th>
                    <th class="border p-2 text-left">Cesionario</th>
                    <th class="border p-2 text-left">Tipo</th>
                    <th class="border p-2 text-center">Endoso</th>
                    <th class="border p-2 text-left">Estado</th>
                    <th class="border p-2 text-left">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transferencias as $t)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2">{{ $t->titulo->numero_titulo ?? 'N/A' }}</td>
                    <td class="border p-2">{{ $t->socioCedente->apellidos ?? '' }} {{ $t->socioCedente->nombres ?? '' }}</td>
                    <td class="border p-2">{{ $t->socioCesionario->apellidos ?? '' }} {{ $t->socioCesionario->nombres ?? '' }}</td>
                    <td class="border p-2">{{ $t->tipo_transferencia }}</td>
                    <td class="border p-2 text-center">{{ $t->numero_endoso }}/3</td>
                    <td class="border p-2">
                        <span class="px-2 py-1 rounded text-sm 
                            @if($t->estado == 'completada') bg-green-100 text-green-800 
                            @elseif($t->estado == 'revertida') bg-red-100 text-red-800 
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $t->estado }}
                        </span>
                    </td>
                    <td class="border p-2">{{ $t->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="border p-4 text-center text-gray-500">No se encontraron transferencias</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $transferencias->links() }}
        </div>
    </div>
</div>