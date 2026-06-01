@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Encabezado idéntico al Mockup -->
    <div class="text-center text-white py-3 mb-4" style="background-color: #1a446c; border-radius: 4px; position: relative;">
        <a href="javascript:history.back()" class="btn btn-outline-light btn-sm" style="position: absolute; left: 15px; top: 12px;">←</a>
        <h4 class="mb-0 text-uppercase fw-bold" style="letter-spacing: 1px;">Bienvenido al Inventario</h4>
    </div>

    <!-- Grid de Tarjetas -->
    <div class="row g-4">
        @foreach($properties as $property)
            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                <!-- Renderizado de la imagen real -->
                <img src="{{ $property->image_fachada }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Fachada">
                <div class="card-body px-3 py-3">
                    <h5 class="fw-bold text-primary mb-1">{{ $property->title }}</h5>
                    <p class="text-muted small mb-3">{{ $property->location }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top">
                        <!-- Imprime la dimensión exacta de Supabase -->
                        <span class="text-secondary small fw-bold"><i class="fas fa-ruler-combined"></i> {{ $property->dimensions }}</span>
                        <span class="fw-bold text-dark" style="font-size: 1.1rem;">${{ number_format($property->price, 2) }} MXN</span>
                    </div>
                    <div class="text-center mt-3">
                        <span class="btn btn-outline-primary btn-sm w-100">Ver Detalles</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection