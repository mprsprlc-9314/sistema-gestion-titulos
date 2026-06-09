<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Lista de permisos
        $permisos = [
            'socios.ver', 'socios.crear', 'socios.editar', 'socios.eliminar',
            'titulos.ver', 'titulos.crear', 'titulos.editar', 'titulos.anular',
            'transferencias.ver', 'transferencias.crear', 'transferencias.aprobar', 'transferencias.revertir',
            'contabilidad.ver', 'contabilidad.crear', 'contabilidad.editar',
            'anticipos.ver', 'anticipos.crear', 'anticipos.aprobar',
            'gravamenes.ver', 'gravamenes.crear', 'gravamenes.levantar',
            'reportes.ver', 'reportes.exportar',
            'admin.ver', 'admin.configurar', 'admin.gestionar_roles',
        ];

        // Crear permisos
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }

        // Crear rol Super Admin y asignar todos los permisos
        $superAdmin = Role::create(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Crear rol Admin
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        // Crear rol Operador
        $operador = Role::create(['name' => 'operador']);
        $operador->givePermissionTo([
            'socios.ver', 'socios.crear', 'socios.editar',
            'titulos.ver', 'titulos.crear', 'titulos.editar',
            'transferencias.ver', 'transferencias.crear',
            'gravamenes.ver', 'gravamenes.crear',
            'reportes.ver',
        ]);

        // Crear rol Consulta (solo lectura)
        $consulta = Role::create(['name' => 'consulta']);
        $consulta->givePermissionTo([
            'socios.ver', 'titulos.ver', 'transferencias.ver',
            'gravamenes.ver', 'reportes.ver',
        ]);
    }
}