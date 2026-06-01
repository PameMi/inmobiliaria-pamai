@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-pamai text-white p-3 rounded text-center mb-4 position-relative">
        <a href="{{ route('inventory') }}" class="btn btn-outline-light btn-sm position-absolute start-0 top-50 translate-middle-y ms-3">←</a>
        <h4 class="m-0 text-uppercase tracking-wider fw-bold">Detalles de la Vivienda</h4>
    </div>

    <h3 class="text-pamai text-center fw-bold mb-4 text-uppercase">{{ $property->title }}</h3>

    <!-- Muestra las imágenes repetidas idéntico a tu mockup -->
    <div class="row justify-content-center mb-4">
        @for($i = 0; $i < 3; $i++)
            <div class="col-md-4 mb-3">
                <div class="rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/' . $property->image) }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                </div>
            </div>
        @endfor
    </div>

    <!-- Tabla de características técnicas -->
    <div class="card border-0 shadow-sm rounded-4 p-4 max-width-800 mx-auto">
        <table class="table table-striped m-0 align-middle">
            <tbody>
                <tr><td class="fw-bold text-secondary text-uppercase py-3">Tipo</td><td>{{ $property->type }}</td></tr>
                <tr><td class="fw-bold text-secondary text-uppercase py-3">Precio (MXN)</td><td class="fw-bold text-pamai">${{ number_format($property->price, 2) }} MXN</td></tr>
                <tr><td class="fw-bold text-secondary text-uppercase py-3">Estado</td><td><span class="badge bg-success p-2">{{ $property->status }}</span></td></tr>
                <tr><td class="fw-bold text-secondary text-uppercase py-3">Ubicación</td><td>{{ $property->location }}</td></tr>
                <tr><td class="fw-bold text-secondary text-uppercase py-3">Dimensiones</td><td>{{ $property->size }} m²</td></tr>
                <tr><td class="fw-bold text-secondary text-uppercase py-3">Habitaciones</td><td>{{ $property->description }}</td></tr>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <form action="{{ route('cart.add', $property->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-pamai btn-lg px-5 rounded-pill fw-bold shadow-sm">AGREGAR AL CARRITO</button>
            </form>
        </div>
    </div>
</div>
@endsection