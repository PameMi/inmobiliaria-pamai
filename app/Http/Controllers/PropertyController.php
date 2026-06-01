<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    // Vista 2: Catálogo completo (Bienvenido al Inventario)
    public function inventory()
    {
        // Traemos todas las propiedades guardadas en la base de datos
        $properties = Property::all();
        return view('inventory.index', compact('properties'));
    }

    // Vista 3: Detalles de la Vivienda
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('inventory.show', compact('property'));
    }

    // Lógica para añadir temporalmente la propiedad a la simulación del carrito (usando la sesión)
    public function addToCart(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $cart = session()->get('cart', []);

        // Guardamos los datos clave de la propiedad en el carrito
        $cart[$id] = [
            "title" => $property->title,
            "price" => $property->price,
            "image" => $property->image,
            "type" => $property->type,
            "location" => $property->location,
            "size" => $property->size,
            "description" => $property->description,
            "quantity" => 1
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart.view')->with('success', 'Propiedad añadida al carrito de compras.');
    }

    // Vista 4: Ver el Carrito de Compras
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('inventory.cart', compact('cart'));
    }
    // Vista 5: Proceso de Pago Seguro
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('inventory.checkout', compact('cart'));
    }
}