<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Socios\ListarSocios;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/socios', ListarSocios::class)->name('socios.index');
    Route::get('/socios/crear', \App\Livewire\Socios\CrearSocio::class)->name('socios.create');
    Route::get('/socios/{id}', \App\Livewire\Socios\VerSocio::class)->name('socios.show');
	Route::get('/socios/{id}/editar', \App\Livewire\Socios\EditarSocio::class)->name('socios.edit');
	Route::get('/titulos', \App\Livewire\Titulos\ListarTitulos::class)->name('titulos.index');
	Route::get('/titulos/crear', \App\Livewire\Titulos\CrearTitulo::class)->name('titulos.create');
	Route::get('/titulos/{id}', \App\Livewire\Titulos\VerTitulo::class)->name('titulos.show');
	Route::get('/titulos/{id}/editar', \App\Livewire\Titulos\EditarTitulo::class)->name('titulos.edit');
	Route::get('/transferencias', \App\Livewire\Transferencias\ListarTransferencias::class)->name('transferencias.index');
	Route::get('/transferencias/crear', \App\Livewire\Transferencias\CrearTransferencia::class)->name('transferencias.create');
});

require __DIR__.'/auth.php';