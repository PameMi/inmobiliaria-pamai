<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\MagicLoginLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;

class MagicLoginController extends Controller
{
    // Muestra la nueva pantalla estilizada de Login/Registro unificado
    public function showLogin()
    {
        return view('auth.magic-login');
    }

    // Procesa el correo electrónico y envía el Magic Link real
    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Si el usuario no existe, lo registra automáticamente con un nombre temporal
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => strstr($request->email, '@', true), // Usa la primera parte del correo como nombre inicial
                'password' => bcrypt(Str::random(16)), // Contraseña aleatoria por requisito técnico de BD
            ]
        );

        // Genera una URL firmada temporal que expira en 15 minutos
        $url = URL::temporarySignedRoute(
            'magic.verify', 
            now()->addMinutes(15), 
            ['user' => $user->id]
        );

        // Envía el correo electrónico real
        Mail::to($user->email)->send(new MagicLoginLink($url));

        return back()->with('success', '¡Enlace enviado! Revisa tu correo electrónico para iniciar sesión de inmediato.');
    }

    // Verifica el enlace al hacer clic en el correo
    public function verifyLink(Request $request, $user_id)
    {
        // Si la firma es falsa o ya pasaron los 15 minutos, rechaza el acceso
        if (! $request->hasValidSignature()) {
            abort(401, 'El enlace de acceso es inválido o ha expirado.');
        }

        $user = User::findOrFail($user_id);
        
        // Autentica al usuario en el sistema
        Auth::login($user);

        return redirect()->route('inventory')->with('status', '¡Sesión iniciada correctamente!');
    }
    // No olvides importar Socialite al inicio del archivo (línea 11 aprox.)

// ... (Mantiene tus funciones showLogin, sendLink y verifyLink intactas) ...

    // Redirecciona al usuario a la página de inicio de sesión de Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Recibe los datos de Google de vuelta de forma segura
    public function handleGoogleCallback()
    {
        try {
            // Obtenemos los datos del usuario directamente de Google de forma segura
            $googleUser = Socialite::driver('google')->user();
            
            // Buscamos si el usuario ya existe en tu base de datos por su email; si no, lo crea de inmediato
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(16)), // Contraseña segura aleatoria requerida por BD
                ]
            );

            // Logueamos al usuario de forma oficial en Laravel
            Auth::login($user);

            // Redireccionamos directamente al inventario de propiedades
            return redirect()->route('inventory')->with('status', '¡Sesión iniciada con Google con éxito!');

        } catch (\Exception $e) {
            // Si ocurre algún error en la comunicación (por ejemplo, que el usuario cancele), lo regresa con aviso
            return redirect()->route('login')->with('error', 'Hubo un problema al autenticar con Google. Inténtalo de nuevo.');
        }
    }
}