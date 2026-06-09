<div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Gravámenes</h2>
            <a href="{{ route('gravamenes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Nuevo Gravamen</a>
        </div>

        @if(session('mensaje'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="flex gap-4 mb-4">
            <input type="text" wire:model.live="buscar" placeholder="Buscar por título o entidad..." 
                   class="border rounded px-3 py-2 w-1/2">
            <select wire:model.live="estado" class="border rounded px-3 py-2">
                <option value="">Todos</option>
                <option value="activo">Activo</option>
                <option value="levantado">Levantado</option>
                <option value="vencido">Vencido</option>
            </select>
        </div>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Título</th>
                    <th class="border p-2 text-left">Tipo</th>
                    <th class="border p-2 text-left">Entidad</th>
                    <th class="border p-2 text-right">Monto</th>
                    <th class="border p-2 text-left">F. Inicio</th>
                    <th class="border p-2 text-left">F. Fin</th>
                    <th class="border p-2 text-left">Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gravamenes as $g)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2">{{ $g->titulo->numero_titulo ?? 'N/A' }}</td>
                    <td class="border p-2">{{ $g->tipo }}</td>
                    <td class="border p-2">{{ $g->entidad }}</td>
                    <td class="border p-2 text-right">{{ $g->monto ? 'Bs. ' . number_format($g->monto, 2) : '-' }}</td>
                    <td class="border p-2">{{ $g->fecha_inicio }}</td>
                    <td class="border p-2">{{ $g->fecha_fin ?? '-' }}</td>
                    <td class="border p-2">
                        <span class="px-2 py-1 rounded text-sm 
                            @if($g->estado == 'activo') bg-red-100 text-red-800 
                            @else bg-green-100 text-green-800 @endif">
                            {{ $g->estado }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="border p-4 text-center text-gray-500">No se encontraron gravámenes</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $gravamenes->links() }}
        </div>
    </div>
</div>