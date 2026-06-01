@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Encabezado azul marino como tu diseño -->
    <div class="bg-pamai text-white p-3 rounded text-center mb-4 position-relative">
        <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm position-absolute start-0 top-50 translate-middle-y ms-3">←</a>
        <h4 class="m-0 text-uppercase tracking-wider fw-bold">Bienvenido al Inventario</h4>
    </div>

    <!-- Lista de propiedades en tarjetas responsivas -->
    <div class="row">
        @forelse($properties as $property)
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="{{ $property->title }}" style="height: 240px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-pamai fw-bold mb-1">{{ $property->title }}</h5>
                        <p class="text-muted small mb-3">{{ $property->location }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">{{ $property->size }} m²</span>
                            <span class="fs-5 fw-bold text-dark">${{ number_format($property->price, 2) }} MXN</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 p-3 pt-0">
                        <a href="{{ route('property.show', $property->id) }}" class="btn btn-pamai w-100 rounded-pill">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay propiedades disponibles por el momento. (Las crearemos desde el Panel de Admin).</p>
            </div>
        @endforelse
    </div>
</div>
@endsection