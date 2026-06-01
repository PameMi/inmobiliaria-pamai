<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function adminStoreClient(Request $request)
{
    $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email'
    ]);

    // Simulamos el guardado exitoso regresando a la pestaña activa de clientes
    return redirect()->route('admin.dashboard')->with('success', '¡Cliente registrado con éxito en el sistema corporativo!');
}
    // =========================================================================
    // SECTION: MÉTODOS DE AUTENTICACIÓN ADMINISTRATIVA (image_f1c3a6.png)
    // =========================================================================

    // 1. Mostrar la pantalla de Login del Admin
    public function showAdminLogin()
    {
        if (session()->has('admin_logged')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    // 2. Procesar las credenciales predeterminadas
    public function processAdminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Credenciales predeterminadas exactas
        if ($request->username === 'admin@pamai.com' && $request->password === 'PAMAI2026') {
            session()->put('admin_logged', true);
            return redirect()->route('admin.dashboard')->with('success', '¡Bienvenida de vuelta, Administradora!');
        }

        return back()->withErrors(['login_error' => 'Usuario o contraseña empresarial incorrectos.']);
    }

    // 3. Cerrar sesión del administrador
    public function adminLogout()
    {
        session()->forget('admin_logged');
        return redirect('/')->with('success', 'Sesión cerrada correctamente.');
    }


    // =========================================================================
    // SECTION: PANEL DE ADMINISTRACIÓN CRUD (Protegido con Sesión)
    // =========================================================================

    // 1. Pantalla principal del Administrador (Lista de propiedades)
    public function adminDashboard()
    {
        if (!session()->has('admin_logged')) {
            return redirect()->route('admin.login-form')->withErrors(['auth_error' => 'Debes iniciar sesión para acceder al panel.']);
        }

        $properties = Property::all();
        return view('admin.dashboard', compact('properties'));
    }

    // 2. Formulario para Nueva Propiedad
    public function adminCreate()
    {
        if (!session()->has('admin_logged')) {
            return redirect()->route('admin.login-form');
        }
        return view('admin.create');
    }

    // 3. Guardar la nueva propiedad en la Base de Datos (Supabase)
    public function adminStore(Request $request)
    {
        if (!session()->has('admin_logged')) {
            return redirect()->route('admin.login-form');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'dimensions' => 'required|string',
            'rooms_detail' => 'required|string',
            'image_fachada' => 'required|url',
        ]);

        Property::create([
            'title' => $request->title,
            'type' => $request->type,
            'price' => $request->price,
            'status' => 'EN VENTA',
            'location' => $request->location,
            'dimensions' => $request->dimensions,
            'rooms_detail' => $request->rooms_detail,
            'image_fachada' => $request->image_fachada,
            'image_comedor' => $request->image_fachada, 
            'image_recamara' => $request->image_fachada,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Propiedad registrada con éxito.');
    }

    // 4. Formulario para Editar
    public function adminEdit($id)
    {
        if (!session()->has('admin_logged')) {
            return redirect()->route('admin.login-form');
        }

        $property = Property::findOrFail($id);
        return view('admin.edit', compact('property'));
    }

    // 5. Procesar la Actualización
    public function adminUpdate(Request $request, $id)
    {
        if (!session()->has('admin_logged')) {
            return redirect()->route('admin.login-form');
        }

        $property = Property::findOrFail($id);
        $property->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Propiedad actualizada con éxito.');
    }

    // 6. Eliminar Propiedad
    public function adminDestroy($id)
    {
        if (!session()->has('admin_logged')) {
            return redirect()->route('admin.login-form');
        }

        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Propiedad eliminada correctamente.');
    }


    // =========================================================================
    // SECTION: FLUJO DE CARA AL CLIENTE (Catálogo, Detalles y Carrito)
    // =========================================================================

    // Vista 2: Catálogo completo (Bienvenido al Inventario)
    public function inventory()
    {
        $properties = Property::all();
        return view('inventory.index', compact('properties'));
    }

    // Vista 3: Detalles de la Vivienda
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('inventory.show', compact('property'));
    }

    // Lógica para añadir la propiedad al carrito usando la sesión
    public function addToCart($id) 
    {
        $property = Property::findOrFail($id);
        $cart = session()->get('cart', []);

        if(!isset($cart[$id])) {
            $cart[$id] = [
                "title" => $property->title,
                "dimensions" => $property->dimensions,
                "rooms_detail" => $property->rooms_detail,
                "price" => $property->price,
                "image" => $property->image_fachada
            ];
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Propiedad añadida al carrito de compras.');
    }

    // Vista 4: Ver el Carrito de Compras con las operaciones matemáticas del Mockup
    public function viewCart() 
    {
        $cart = session()->get('cart', []);
        
        $subtotal = 0;
        foreach($cart as $item) {
            $subtotal += $item['price'];
        }
        
        $gastosGestion = $subtotal * 0.10;
        $total = $subtotal + $gastosGestion;

        return view('inventory.cart', compact('cart', 'subtotal', 'gastosGestion', 'total'));
    }

    // Función para eliminar un elemento del carrito
    public function removeFromCart($id) 
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Propiedad removida del carrito.');
    }

    // Vista 5: Proceso de Pago Seguro con los datos reales de la sesión
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        $subtotal = 0;
        foreach($cart as $item) {
            $subtotal += $item['price'];
        }
        
        $gastosGestion = $subtotal * 0.10;
        $total = $subtotal + $gastosGestion;

        return view('inventory.checkout', compact('cart', 'subtotal', 'gastosGestion', 'total'));
    }

    // Acción para procesar la agenda de la cita
    public function scheduleVisit(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        return redirect()->route('cart.view')->with('success', '¡Cita agendada con éxito! Un asesor de PAMAI se comunicará contigo.');
    }
}