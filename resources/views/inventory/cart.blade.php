@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-pamai text-white p-3 rounded text-center mb-4 position-relative">
        <a href="{{ route('inventory') }}" class="btn btn-outline-light btn-sm position-absolute start-0 top-50 translate-middle-y ms-3">←</a>
        <h4 class="m-0 text-uppercase tracking-wider fw-bold">Carrito de Compras</h4>
    </div>

    <h3 class="text-pamai text-center fw-bold mb-4">RESUMEN DE TU CARRITO</h3>

    @if(count($cart) > 0)
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($cart as $id => $details)
                    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="{{ asset('storage/' . $details['image']) }}" class="img-fluid rounded-3" style="height: 80px; object-fit: cover;">
                            </div>
                            <div class="col-md-7">
                                <h5 class="fw-bold text-pamai m-0">{{ $details['title'] }}</h5>
                                <p class="text-muted small m-0">{{ $details['location'] }} | {{ $details['size'] }} m²</p>
                                <span class="badge bg-light text-success border border-success mt-1">EN VENTA</span>
                            </div>
                            <div class="col-md-3 text-end">
                                <span class="fs-5 fw-bold">${{ number_format($details['price'], 2) }} MXN</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cuadro con cálculos de gastos del Mockup -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 max-width-500 mx-auto text-center my-4 bg-white">
                        <h4 class="fw-bold text-pamai mb-3">RESUMEN DE PAGO</h4>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Monto de Propiedad (1 unidad):</span>
                            <span>${{ number_format($details['price'], 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Gastos de Gestión (10%):</span>
                            @php $gestion = $details['price'] * 0.10; @endphp
                            <span>${{ number_format($gestion, 2) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold m-0">Total a Pagar (Mensual):</h5>
                            <h4 class="fw-bold text-pamai m-0">${{ number_format($details['price'] + $gestion, 2) }}</h4>
                        </div>
                        <div class="d-flex gap-3 justify-content-center">
                            <a href="{{ route('inventory') }}" class="btn btn-light border rounded-pill px-4">Volver al Detalle</a>
                            <form action="{{ route('cart.checkout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-pamai rounded-pill px-4">Continuar Compra →</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <h5 class="text-muted">Tu carrito está vacío. ¡Ve al inventario y selecciona una casa o terreno!</h5>
        </div>
    @endif
</div>
@endsection