@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center text-white py-3 px-3 mb-4" style="background-color: #1a446c; border-radius: 4px;">
        <a href="{{ route('inventory') }}" class="btn btn-outline-light btn-sm">←</a>
        <h4 class="mb-0 fw-bold text-uppercase" style="letter-spacing: 1px;">Carrito de Compras</h4>
        <div class="position-relative">
            <span class="fs-4">🛒</span>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger" style="font-size: 0.65rem;">
                {{ count($cart) }}
            </span>
        </div>
    </div>

    <h3 class="text-center fw-bold my-4" style="color: #1a446c; letter-spacing: 1px;">RESUMEN DE TU CARRITO</h3>
    <div class="mx-auto mb-5" style="width: 80px; height: 3px; background-color: #1a446c;"></div>

    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm mb-4" style="border-radius: 8px;">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="row justify-content-center g-4 mb-5">
            <div class="col-md-10">
                <div class="card shadow-sm p-3 border-0" style="border-radius: 16px;">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead>
                                <tr class="text-uppercase text-secondary" style="font-size: 0.85rem; border-bottom: 2px solid #f8f9fa;">
                                    <th style="width: 20%;">Propiedad</th>
                                    <th>Descripción</th>
                                    <th class="text-center">Cita</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $id => $item)
                                    <tr style="border-bottom: 1px solid #f8f9fa;">
                                        <td class="position-relative py-3">
                                            <img src="{{ $item['image'] }}" class="rounded shadow-sm" style="width: 110px; height: 75px; object-fit: cover;">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="position-absolute" style="top: 10px; left: -5px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 0.65rem;">×</button>
                                            </form>
                                        </td>
                                        <td>
                                            <h6 class="fw-bold m-0 text-dark">{{ $item['title'] }}</h6>
                                            <p class="text-muted small m-0 my-1">{{ $item['dimensions'] }}</p>
                                            <p class="text-muted small m-0 text-truncate" style="max-width: 400px;">{{ $item['rooms_detail'] }}</p>
                                            <span class="fw-bold text-primary" style="font-size: 0.95rem;">$ {{ number_format($item['price'], 2) }} MXN</span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn py-2 px-3 text-uppercase fw-bold text-white btn-sm" style="background-color: #2b567d; border-radius: 8px; font-size: 0.75rem;" data-bs-toggle="modal" data-bs-target="#modalAgendar">
                                                Agendar Visita
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 px-4 py-4 mb-4" style="border-radius: 16px; background-color: #ffffff;">
                    <h5 class="text-center fw-bold text-uppercase mb-4" style="letter-spacing: 1px; color: #111;">Resumen de Pago</h5>
                    
                    <div class="d-flex justify-content-between my-2 text-secondary">
                        <span>Monto de Renta ({{ count($cart) }} unidades):</span>
                        <span class="fw-bold">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between my-2 text-secondary pb-3 border-bottom">
                        <span>Gastos de Gestión:</span>
                        <span class="fw-bold">${{ number_format($gastosGestion, 2) }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center my-4">
                        <span class="fw-bold fs-5 text-dark">Total a Pagar (Mensual):</span>
                        <span class="fw-bold fs-4 text-dark">${{ number_format($total, 2) }}</span>
                    </div>

                    <div class="d-flex gap-3 mt-2">
                        <a href="{{ route('inventory') }}" class="btn btn-light w-50 py-2 text-uppercase fw-bold border text-muted" style="border-radius: 12px; font-size: 0.8rem; line-height: 24px;">
                            Volver al detalle
                        </a>
                        <a href="{{ route('checkout') }}" class="btn text-white w-50 py-2 text-uppercase fw-bold text-center" style="background-color: #1a446c; border-radius: 12px; font-size: 0.8rem; line-height: 24px;">
                            Continuar Compra →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center my-5 py-5">
            <p class="text-muted fs-5">Tu carrito está vacío actualmente.</p>
            <a href="{{ route('inventory') }}" class="btn text-white px-4 py-2" style="background-color: #1a446c; border-radius: 8px;">Ir al Inventario</a>
        </div>
    @endif
</div>

<div class="modal fade" id="modalAgendar" tabindex="-1" aria-labelledby="modalAgendarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
            <div class="text-white py-3 px-4 d-flex justify-content-between align-items-center" style="background-color: #1a446c;">
                <h5 class="modal-title fw-bold text-uppercase small m-0">
                    📅 Agendar tu visita
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-4">
                <p class="text-muted text-center small mb-4">Por favor ingresa tus datos para coordinar con un asesor de PAMAI.</p>
                
                <form action="{{ route('visit.schedule') }}" method="POST">
                    @csrf
                    <div class="mb-3 text-center">
                        <label class="fw-bold text-muted small text-uppercase mb-1 d-block">Nombre Completo</label>
                        <input type="text" name="fullname" class="form-control text-center" placeholder="Ej. Juan Pérez" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6 text-center">
                            <label class="fw-bold text-muted small text-uppercase mb-1 d-block">Teléfono Móvil</label>
                            <input type="text" name="phone" class="form-control text-center" placeholder="55 1234 5678" required>
                        </div>
                        <div class="col-6 text-center">
                            <label class="fw-bold text-muted small text-uppercase mb-1 d-block">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control text-center" placeholder="juan@correo.com" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6 text-center">
                            <label class="fw-bold text-muted small text-uppercase mb-1 d-block">Fecha Deseada</label>
                            <input type="date" name="date" class="form-control text-center" required>
                        </div>
                        <div class="col-6 text-center">
                            <label class="fw-bold text-muted small text-uppercase mb-1 d-block">Hora Estimada</label>
                            <input type="time" name="time" class="form-control text-center" required>
                        </div>
                    </div>

                    <div class="mb-4 text-center">
                        <label class="fw-bold text-muted small text-uppercase mb-1 d-block">Notas u Observaciones (Opcional)</label>
                        <textarea name="notes" class="form-control text-center" rows="2" placeholder="¿Alguna especificación?"></textarea>
                    </div>

                    <div class="d-flex gap-3 justify-content-center">
                        <button type="button" class="btn btn-light border px-4" style="border-radius: 20px;" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn text-white px-4" style="background-color: #1a446c; border-radius: 20px;">Confirmar Agenda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection