<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AsignarRolAdmin extends Command
{
    protected $signature = 'asignar:admin {email}';
    protected $description = 'Asigna el rol super_admin a un usuario';

    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('Usuario no encontrado');
            return;
        }

        $user->assignRole('super_admin');
        $this->info('Rol super_admin asignado a: ' . $user->email);
    }
}