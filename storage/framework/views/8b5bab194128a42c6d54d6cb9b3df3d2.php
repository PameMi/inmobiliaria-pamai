

<?php $__env->startSection('content'); ?>
<div class="container d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-5">
            
            <!-- Tarjeta Minimalista Moderna estilo Slack/Genially -->
            <div class="card border-0 shadow-lg p-4 rounded-4 bg-white">
                <div class="card-body text-center">
                    
                    <h2 class="fw-bold text-pamai mb-2" style="font-family: 'Montserrat', sans-serif; font-weight: 800;">Iniciar Sesión o Registrarse</h2>
                    <p class="text-muted small mb-4">Ingresa tu correo institucional o personal. No se requiere contraseña; recibirás un enlace de inicio de sesión real instantáneo.</p>

                    <!-- Mensajes de Alerta Flotantes (Éxito del envío de correo) -->
                    <?php if(session('success')): ?>
                        <div class="alert alert-success border-0 rounded-3 small mb-4 py-3 shadow-sm text-start" role="alert">
                            ✔ <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- Formulario del Enlace Mágico por Correo -->
                    <form method="POST" action="<?php echo e(route('login.send')); ?>" id="magic-form">
                        <?php echo csrf_field(); ?>

                        <div class="mb-4 text-start">
                            <label for="email" class="form-label small fw-bold text-secondary">Dirección de Correo Electrónico</label>
                            <input id="email" type="email" class="form-control form-control-lg rounded-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="nombre@ejemplo.com"
                                   style="font-size: 1rem; padding: 12px; font-family: 'Montserrat', sans-serif;">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <button type="submit" class="btn btn-pamai btn-lg w-100 py-3 rounded-pill text-uppercase fw-bold shadow btn-magic-transition mb-3"
                                style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; letter-spacing: 1px;">
                            Continuar con el correo electrónico
                        </button>
                    </form>

                    <div class="position-relative my-4">
                        <hr class="text-muted opacity-25">
                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">o con tu cuenta</span>
                    </div>

                    <!-- Botones de Redes Sociales Reales -->
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <!-- BOTÓN DE GOOGLE AUTÉNTICO CONECTADO A TU ROUTE DE GOOGLE CLOUD -->
                        <a href="<?php echo e(route('google.login')); ?>" 
                           class="btn btn-outline-light border text-dark px-3 py-2 rounded-3 small d-flex align-items-center gap-2 w-100 justify-content-center btn-social-hover" 
                           style="font-size: 0.85rem; text-decoration: none; font-family: 'Montserrat', sans-serif; font-weight: 500;">
                            <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" width="16" alt="Google"> Google
                        </a>
                        
                        <button class="btn btn-outline-light border text-dark px-3 py-2 rounded-3 small d-flex align-items-center gap-2 w-100 justify-content-center opacity-50" style="font-size: 0.85rem;" disabled>
                            <img src="https://cdn-icons-png.flaticon.com/512/732/732221.png" width="16" alt="Office"> Office365
                        </button>
                    </div>

                </div>
            </div>

            <p class="text-center text-muted small mt-4">
                Al continuar, aceptas nuestros <a href="#" class="text-pamai text-decoration-none fw-semibold">Términos y condiciones</a>.
            </p>

        </div>
    </div>
</div>

<!-- Estilos CSS Pulidos -->
<style>
    .btn-magic-transition {
        background-color: #153e6b;
        color: white;
        border: none;
        transition: all 0.3s ease-in-out;
    }
    .btn-magic-transition:hover {
        background-color: #0d294a;
        transform: scale(1.02);
        box-shadow: 0px 5px 15px rgba(21,62,107,0.4) !important;
    }
    .btn-social-hover {
        transition: all 0.2s ease;
    }
    .btn-social-hover:hover {
        background-color: #f8f9fa !important;
        border-color: #153e6b !important;
        transform: scale(1.01);
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYECTOFINAL\inmobiliaria-pamai\resources\views/auth/magic-login.blade.php ENDPATH**/ ?>