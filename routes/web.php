<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\MagicLoginController;


// Vista 1: Landing page principal de Inmobiliaria PAMAI
Route::get('/', function () { 
    return view('welcome'); 
});

// Rutas de Autenticación automáticas (Login/Registro) con verificación de correo real activada
Auth::routes(['verify' => true]);

// VISTAS DEL CLIENTE (Requiere inicio de sesión y correo verificado)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/inventario', [PropertyController::class, 'inventory'])->name('inventory');
    Route::get('/propiedad/{id}', [PropertyController::class, 'show'])->name('property.show');
    Route::post('/carrito/agregar/{id}', [PropertyController::class, 'addToCart'])->name('cart.add');
    Route::get('/carrito', [PropertyController::class, 'viewCart'])->name('cart.view');
    Route::post('/checkout', [PropertyController::class, 'checkout'])->name('cart.checkout');
});

// VISTAS DEL ADMINISTRADOR (Protegidas con el Rol de Administrador)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


// Rutas para el acceso sin contraseña (Magic Link)
Route::get('/login', [MagicLoginController::class, 'showLogin'])->name('login');
Route::post('/login', [MagicLoginController::class, 'sendLink'])->name('login.send');
Route::get('/magic-verify/{user}', [MagicLoginController::class, 'verifyLink'])->name('magic.verify');


// Rutas previas del enlace mágico...
Route::get('/login', [MagicLoginController::class, 'showLogin'])->name('login');
Route::post('/login', [MagicLoginController::class, 'sendLink'])->name('login.send');
Route::get('/magic-verify/{user}', [MagicLoginController::class, 'verifyLink'])->name('magic.verify');

// NUEVAS RUTAS REALES PARA GOOGLE AUTH
Route::get('/auth/google', [MagicLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [MagicLoginController::class, 'handleGoogleCallback']);


Route::get('/inventario', [PropertyController::class, 'inventory'])->name('inventory');
Route::get('/inventario/{id}', [PropertyController::class, 'show'])->name('property.show');
// Rutas para el Carrito de Compras
Route::post('/carrito/agregar/{id}', [PropertyController::class, 'addToCart'])->name('cart.add');
Route::get('/carrito', [PropertyController::class, 'viewCart'])->name('cart.view');
Route::delete('/carrito/eliminar/{id}', [PropertyController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/checkout', [PropertyController::class, 'checkout'])->name('checkout');
Route::post('/agendar-visita', [PropertyController::class, 'scheduleVisit'])->name('visit.schedule');
// Rutas del Panel de Administración (CRUD)
Route::get('/admin/dashboard', [PropertyController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/propiedades/crear', [PropertyController::class, 'adminCreate'])->name('admin.create');
Route::post('/admin/propiedades/guardar', [PropertyController::class, 'adminStore'])->name('admin.store');
Route::get('/admin/propiedades/{id}/editar', [PropertyController::class, 'adminEdit'])->name('admin.edit');
Route::put('/admin/propiedades/{id}/actualizar', [PropertyController::class, 'adminUpdate'])->name('admin.update');
Route::delete('/admin/propiedades/{id}/eliminar', [PropertyController::class, 'adminDestroy'])->name('admin.destroy');
// Rutas de Autenticación del Administrador
Route::get('/admin/login', [PropertyController::class, 'showAdminLogin'])->name('admin.login-form');
Route::post('/admin/login', [PropertyController::class, 'processAdminLogin'])->name('admin.login-process');
Route::get('/admin/logout', [PropertyController::class, 'adminLogout'])->name('admin.logout');

// El dashboard ahora queda protegido internamente por la validación de sesión
Route::get('/admin/dashboard', [PropertyController::class, 'adminDashboard'])->name('admin.dashboard');
// Rutas extra para simulación de flujos de clientes y contratos del Dashboard
Route::post('/admin/clientes/guardar', [PropertyController::class, 'adminStoreClient'])->name('admin.client.store');