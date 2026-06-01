@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Encabezado idéntico al Mockup -->
    <div class="text-center text-white py-3 mb-4" style="background-color: #1a446c; border-radius: 4px; position: relative;">
        <a href="javascript:history.back()" class="btn btn-outline-light btn-sm" style="position: absolute; left: 15px; top: 12px;">←</a>
        <h4 class="mb-0 text-uppercase fw-bold" style="letter-spacing: 1px; font-size: 1.25rem;">Bienvenido al Inventario</h4>
    </div>

    <!-- Grid de Tarjetas obligado a 2 por fila -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($properties as $property)
            <div class="col">
                <!-- Enlace a la ruta de detalles -->
                <a href="{{ url('/inventario/'.$property->id) }}" class="text-decoration-none text-dark d-block h-100">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden; background-color: #ffffff;">
                        
                        <!-- Contenedor con altura fija para aspecto cuadrado -->
                        <div style="width: 100%; height: 260px; overflow: hidden;">
                            <img src="{{ $property->image_fachada }}" class="w-100 h-100" style="object-fit: cover;" alt="Fachada">
                        </div>
                        
                        <div class="card-body px-3 py-3 d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="text-center fw-bold text-primary mb-1 text-uppercase" style="font-size: 0.95rem; letter-spacing: 0.5px;">
                                    {{ $property->title }} | <span class="text-muted fw-normal">{{ strtok($property->location, ',') }}</span>
                                </h6>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <span class="text-secondary small fw-bold" style="font-size: 0.8rem;">
                                    {{ strtok($property->dimensions, ' de') }}
                                </span>
                                <span class="fw-bold text-dark" style="font-size: 1.05rem;">
                                    ${{ number_format($property->price) }} MXN
                                </span>
                            </div>
                            
                            <div class="mt-3 text-center">
                                <span class="btn btn-outline-primary btn-sm w-100" style="border-radius: 4px; font-size: 0.85rem; padding: 6px 0;">
                                    Ver Detalles
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection