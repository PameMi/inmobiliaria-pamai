@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="text-center text-white py-3 mb-5" style="background-color: #1a446c; border-radius: 4px; position: relative;">
        <div class="d-flex align-items-center gap-2" style="position: absolute; left: 15px; top: 12px;">
            <a href="{{ route('cart.view') }}" class="btn btn-outline-light btn-sm">←</a>
        </div>
        <h4 class="mb-0 text-uppercase fw-bold" style="letter-spacing: 1px;">Proceso de Pago Seguro</h4>
    </div>

    <div class="row g-5">
        <div class="col-md-5 border-end">
            <h5 class="text-uppercase fw-bold text-muted mb-4 text-center" style="font-size: 0.95rem; letter-spacing: 0.5px;">Resumen de Selección</h5>
            
            <div class="mb-4">
                <label class="fw-bold text-muted small text-uppercase mb-2 d-block text-center">Propiedad</label>
                @if(count($cart) > 0)
                    <ul class="list-group list-group-flush mb-3">
                        @foreach($cart as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent text-secondary small">
                                <span>🔹 {{ $item['title'] }}</span>
                                <span class="fw-bold">${{ number_format($item['price'], 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted text-center small py-2">No hay propiedades seleccionadas.</p>
                @endif
            </div>

            <div class="p-3 text-center my-4" style="background-color: #f8f9fa; border-radius: 8px;">
                <label class="fw-bold text-muted small text-uppercase mb-1 d-block">Total ({{ count($cart) }} Propiedades)</label>
                <h3 class="fw-bold text-dark mb-0">${{ number_format($total ?? 0, 2) }} <span class="fs-6 text-muted fw-normal">MXN</span></h3>
            </div>
        </div>

        <div class="col-md-7">
            <h5 class="text-uppercase fw-bold text-muted mb-4 text-center" style="font-size: 0.95rem; letter-spacing: 0.5px;">Métodos de Pago</h5>
            
            <form id="paymentForm">
                @csrf
                <div class="card p-3 border shadow-sm mb-4" style="border-radius: 12px;">
                    <div class="form-check d-flex align-items-center mb-3">
                        <input class="form-check-input" type="radio" name="payment_method" id="tarjeta" checked style="transform: scale(1.2);">
                        <label class="form-check-label fw-bold text-dark ms-3" for="tarjeta">Tarjeta de crédito</label>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="payment_method" id="transferencia" style="transform: scale(1.2);">
                        <label class="form-check-label fw-bold text-dark ms-3" for="transferencia">Transferencia Bancaria</label>
                    </div>
                </div>

                <div class="text-center mb-4">
                    <label class="fw-bold text-muted small text-uppercase mb-2 d-block">Tarjeta de crédito</label>
                    
                    <input type="text" 
                           class="form-control text-center mb-3 py-2" 
                           placeholder="Número xxxx xxxx xxxx xxxx" 
                           pattern="\d{16}" 
                           maxlength="16" 
                           inputmode="numeric"
                           title="El número de tarjeta debe tener exactamente 16 dígitos numéricos sin espacios ni guiones." 
                           required>
                    
                    <div class="row g-3">
                        <div class="col-6">
                            <input type="text" 
                                   class="form-control text-center py-2" 
                                   placeholder="Expedición (MM/AA)" 
                                   pattern="(0[1-2]|1[0-2])\/[0-9]{2}" 
                                   maxlength="5"
                                   title="Formato requerido: dos dígitos para el mes (01 al 12), una barra, y dos para el año (Ej: 03/28)." 
                                   required>
                        </div>
                        <div class="col-6">
                            <input type="text" 
                                   class="form-control text-center py-2" 
                                   placeholder="CVV" 
                                   pattern="\d{3}" 
                                   maxlength="3" 
                                   inputmode="numeric"
                                   title="El código CVV debe tener exactamente 3 dígitos numéricos." 
                                   required>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-9 mx-auto mt-5">
                    <button type="submit" class="btn text-white py-2 fw-bold text-uppercase shadow-sm" style="background-color: #1a446c; border-radius: 20px;">
                        Finalizar Compra
                    </button>
                    <a href="{{ route('cart.view') }}" class="btn btn-light py-2 fw-bold text-uppercase" style="border-radius: 20px; color:#777;">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="successPaymentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-body p-5">
                <div class="mb-4">
                    <span class="display-1 text-success">✔️</span>
                </div>
                <h4 class="fw-bold text-dark mb-2 text-uppercase" style="letter-spacing: 1px;">¡Pago Realizado con Éxito!</h4>
                <p class="text-muted small px-3 mb-4">Tu transacción ha sido procesada de forma segura. El comprobante de arrendamiento fue enviado a tu correo.</p>
                
                <button type="button" class="btn text-white px-5 py-2 fw-bold text-uppercase" style="background-color: #1a446c; border-radius: 20px; font-size: 0.85rem;" id="btnRedirect">
                    Entendido
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita la recarga de página para dejar ver el modal
        
        // Inicializa y abre el modal de éxito de Bootstrap
        var successModal = new bootstrap.Modal(document.getElementById('successPaymentModal'));
        successModal.show();
    });

    // Redirección limpia al dar clic en "Entendido"
    document.getElementById('btnRedirect').addEventListener('click', function() {
        window.location.href = "{{ route('inventory') }}";
    });
</script>
@endsection