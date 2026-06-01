

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!-- Tarjeta de Login Estilo Mockup (image_f1c3a6.png) -->
            <div class="card border-0 shadow-lg px-4 py-5" style="border-radius: 20px; background-color: #ffffff;">
                <div class="text-center mb-4">
                    <!-- Ajusta la ruta si tu logo está en otra carpeta -->
                    <img src="<?php echo e(asset('images/logo.jpeg')); ?>" alt="PAMAI" class="mb-3" style="height: 110px; width: auto; object-fit: contain;">
                    <h4 class="fw-bold mb-1" style="color: #153e6b; letter-spacing: 0.5px;">PAMAI INMOBILIARIA</h4>
                    <p class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 1px;">Portal de Administración</p>
                </div>

                <?php if($errors->has('login_error') || $errors->has('auth_error')): ?>
                    <div class="alert alert-danger text-center small py-2" style="border-radius: 8px;">
                        <?php echo e($errors->first()); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('admin.login-process')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label class="fw-bold text-dark small mb-1">Usuario Empresarial</label>
                        <input type="text" name="username" class="form-control text-center py-2 text-uppercase" placeholder="USUARIO" style="border-radius: 8px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold text-dark small mb-1">Contraseña</label>
                        <input type="password" name="password" class="form-control text-center py-2 text-uppercase" placeholder="CONTRASEÑA" style="border-radius: 8px;" required>
                    </div>

                    <div class="d-grid mt-2">
                        <button type="submit" class="btn text-white py-2 fw-bold text-uppercase" style="background-color: #1a446c; border-radius: 10px; letter-spacing: 0.5px;">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYECTOFINAL\inmobiliaria-pamai\resources\views/admin/login.blade.php ENDPATH**/ ?>