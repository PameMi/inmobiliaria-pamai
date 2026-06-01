@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="text-center text-white py-3 mb-4" style="background-color: #1a446c; border-radius: 4px; position: relative;">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm" style="position: absolute; left: 15px; top: 12px;">← Volver</a>
        <h4 class="mb-0 text-uppercase fw-bold" style="letter-spacing: 1px;">Añadir Nueva Propiedad</h4>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4" style="border-radius: 16px;">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="fw-bold text-muted small text-uppercase mb-1">Título de la Propiedad</label>
                        <input type="text" name="title" class="form-control" placeholder="Ej: CASA RESIDENCIAL METEPEC" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Tipo</label>
                            <select name="type" class="form-select" required>
                                <option value="CASA">CASA</option>
                                <option value="TERRENO">TERRENO</option>
                                <option value="DEPARTAMENTO">DEPARTAMENTO</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Precio (MXN)</label>
                            <input type="number" name="price" class="form-control" placeholder="350000" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-muted small text-uppercase mb-1">Ubicación Completa</label>
                        <input type="text" name="location" class="form-control" placeholder="Municipio, Estado" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Dimensiones / Metros cuadrados</label>
                            <input type="text" name="dimensions" class="form-control" placeholder="300 m2 de terreno" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Detalle de Habitaciones / Servicios</label>
                            <input type="text" name="rooms_detail" class="form-control" placeholder="3 Recámaras, 2 Baños completo, etc." required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold text-muted small text-uppercase mb-1">URL de la Imagen de Fachada (Pexels / Internet)</label>
                        <input type="url" name="image_fachada" class="form-control" placeholder="https://images.pexels.com/..." required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn text-white fw-bold text-uppercase py-2" style="background-color: #1a446c; border-radius: 8px;">
                            Guardar Propiedad en Supabase
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection