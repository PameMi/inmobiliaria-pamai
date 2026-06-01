@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Navbar superior de detalles -->
    <div class="d-flex justify-content-between align-items-center text-white py-3 px-3 mb-4" style="background-color: #1a446c; border-radius: 4px;">
        <div class="d-flex align-items-center gap-2">
            <a href="javascript:history.back()" class="btn btn-outline-light btn-sm">←</a>
            <span class="fw-bold ms-2">Inmobiliaria PAMAI</span>
        </div>
        <h4 class="mb-0 fw-bold text-uppercase" style="letter-spacing: 1px;">Detalles de la Vivienda</h4>
        <button class="btn btn-link text-white p-0"><i class="fas fa-cart-plus fs-4"></i>🛒+</button>
    </div>

    <!-- Título de la propiedad -->
    <h3 class="text-center fw-bold my-4" style="color: #1a446c; letter-spacing: 1px;">{{ $property->title }}</h3>
    <div class="mx-auto mb-4" style="width: 80px; height: 3px; background-color: #1a446c;"></div>

    <!-- Galería de 3 Imágenes -->
    <div class="row g-3 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
                <img src="{{ $property->image_fachada }}" class="w-100" style="height: 220px; object-fit: cover;">
                <div class="text-center text-white py-2 fw-bold small text-uppercase" style="background-color: #2b567d;">Fachada</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
                <img src="{{ $property->image_comedor }}" class="w-100" style="height: 220px; object-fit: cover;">
                <div class="text-center text-white py-2 fw-bold small text-uppercase" style="background-color: #2b567d;">Comedor</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
                <img src="{{ $property->image_recamara }}" class="w-100" style="height: 220px; object-fit: cover;">
                <div class="text-center text-white py-2 fw-bold small text-uppercase" style="background-color: #2b567d;">Recámara</div>
            </div>
        </div>
    </div>

    <!-- Tabla Detallada Estilo Mockup -->
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="table-responsive shadow-sm" style="border-radius: 12px; overflow: hidden;">
                <table class="table table-bordered mb-0 align-middle text-center" style="border-color: #e9ecef;">
                    <tbody>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3" style="width: 30%;">Tipo</td>
                            <td class="text-start ps-4 fw-bold text-dark">{{ $property->type }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Precio (MXN)</td>
                            <td class="text-start ps-4 fw-bold fs-5 text-primary">${{ number_format($property->price, 2) }} MXN</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Estado</td>
                            <td class="text-start ps-4">
                                <span class="badge bg-success px-3 py-2 text-uppercase" style="border-radius: 20px;">{{ $property->status }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Ubicación</td>
                            <td class="text-start ps-4 text-secondary">{{ $property->location }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Dimensiones</td>
                            <td class="text-start ps-4 text-secondary">{{ $property->dimensions }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Habitaciones</td>
                            <td class="text-start ps-4 text-secondary small">{{ $property->rooms_detail }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Botón Agregar al Carrito idéntico a image_0c12e2.png -->
            <div class="text-center mt-4">
                <button class="btn btn-light shadow-sm text-uppercase fw-bold px-5 py-2" style="border-radius: 20px; border: 1px solid #e9ecef; color: #1a446c; font-size: 0.95rem; letter-spacing: 0.5px;">
                    Agregar al Carrito
                </button>
            </div>
        </div>
    </div>
</div>
@endsection