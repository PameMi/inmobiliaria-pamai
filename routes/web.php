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