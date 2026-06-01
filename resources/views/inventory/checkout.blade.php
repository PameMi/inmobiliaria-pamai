@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card border-0 shadow-lg rounded-4 p-5 bg-white" style="max-width: 850px; width: 100%;">
        
        <!-- Encabezado del Mockup -->
        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-4">
            <div class="bg-pamai text-white p-2 rounded fw-bold">PM</div>
            <h3 class="fw-bold text-uppercase m-0 text-pamai tracking-wide">Proceso de Pago Seguro</h3>
            <div></div>
        </div>

        <div class="row">
            <!-- Columna Izquierda: Resumen de selección -->
            <div class="col-md-6 border-end">
                <h5 class="fw-bold mb-3 text-secondary text-uppercase small">Resumen de Selección</h5>
                <p class="fw-bold m-0 text-muted">Propiedad</p>
                
                @php $total = 0; @endphp
                <div class="overflow-auto mb-3" style="max-height: 250px;">
                    @foreach(session()->get('cart', []) as $id => $details)
                        @php $total += $details['price'] + ($details['price'] * 0.10); @endphp
                        <div class="d-flex align-items-center border rounded p-2 mb-2 bg-light">
                            <img src="{{ asset('storage/' . $details['image']) }}" class="rounded me-2" style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="m-0 fw-bold text-pamai small">{{ $details['title'] }}</h6>
                                <small class="text-success fw-bold">${{ number_format($details['price'], 2) }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="border-top pt-3">
                    <p class="text-muted small m-0 text-uppercase fw-bold">Total (Con gestión mensual):</p>
                    <h4 class="fw-bold text-pamai">${{ number_format($total, 2) }} MXN</h4>
                </div>
            </div>

            <!-- Columna Derecha: Formulario Métodos de Pago -->
            <div class="col-md-6 ps-4">
                <h5 class="fw-bold mb-3 text-secondary text-uppercase small">Métodos de Pago</h5>
                
                <form action="#" method="POST" id="simulated-payment-form">
                    @csrf
                    <div class="form-check border rounded p-3 mb-2 bg-white shadow-sm">
                        <input class="form-check-input ms-1" type="radio" name="payment_method" id="tarjeta" checked>
                        <label class="form-check-label ms-3 fw-bold" for="tarjeta">Tarjeta de Crédito</label>
                    </div>
                    <div class="form-check border rounded p-3 mb-3 bg-white shadow-sm">
                        <input class="form-check-input ms-1" type="radio" name="payment_method" id="transferencia">
                        <label class="form-check-label ms-3 fw-bold" for="transferencia">Transferencia Bancaria</label>
                    </div>

                    <!-- Campos de Tarjeta del Mockup -->
                    <div id="credit-card-fields">
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="Número xxxx xxxx xxxx xxxx" maxlength="16" required>
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Expedición 03/29" required>
                            </div>
                            <div class="col-6">
                                <input type="password" class="form-control" placeholder="CVV" maxlength="3" required>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="alert('¡Simulación de Compra Exitosa! Su cita y transacción han sido procesadas en la Base de Datos de PAMAI.'); window.location.href='{{ route('home') }}';" class="btn btn-pamai w-100 rounded-pill py-2 fw-bold text-uppercase mb-2">Finalizar Compra</button>
                    <a href="{{ route('cart.view') }}" class="btn btn-light border w-100 rounded-pill py-2 text-secondary">Cancelar</a>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection