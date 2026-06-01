

<?php $__env->startSection('content'); ?>
<style>
    /* Efecto zoom elegante para las tarjetas de imágenes */
    .zoom-container {
        overflow: hidden;
        border-radius: 12px;
        cursor: pointer;
    }
    .zoom-img {
        transition: transform 0.4s ease;
    }
    .zoom-container:hover .zoom-img {
        transform: scale(1.08); /* Se acerca suavemente */
    }
    .modal-header-custom {
        background-color: #1a446c;
    }
</style>

<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center text-white py-3 px-3 mb-4" style="background-color: #1a446c; border-radius: 4px;">
        <div class="d-flex align-items-center gap-2">
            <a href="javascript:history.back()" class="btn btn-outline-light btn-sm">←</a>
            <span class="fw-bold ms-2">Inmobiliaria PAMAI</span>
        </div>
        <h4 class="mb-0 fw-bold text-uppercase" style="letter-spacing: 1px;">Detalles de la Vivienda</h4>
        <button class="btn btn-link text-white p-0"><i class="fas fa-cart-plus fs-4"></i></button>
    </div>

    <h3 class="text-center fw-bold my-4" style="color: #1a446c; letter-spacing: 1px;"><?php echo e($property->title); ?></h3>
    <div class="mx-auto mb-4" style="width: 80px; height: 3px; background-color: #1a446c;"></div>

    <div class="row g-3 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm zoom-container" data-bs-toggle="modal" data-bs-target="#modalFachada">
                <img src="<?php echo e($property->image_fachada); ?>" class="w-100 zoom-img" style="height: 220px; object-fit: cover;">
                <div class="text-center text-white py-2 fw-bold small text-uppercase" style="background-color: #2b567d;">Fachada</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm zoom-container" data-bs-toggle="modal" data-bs-target="#modalComedor">
                <img src="<?php echo e($property->image_comedor); ?>" class="w-100 zoom-img" style="height: 220px; object-fit: cover;">
                <div class="text-center text-white py-2 fw-bold small text-uppercase" style="background-color: #2b567d;">Comedor</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm zoom-container" data-bs-toggle="modal" data-bs-target="#modalRecamara">
                <img src="<?php echo e($property->image_recamara); ?>" class="w-100 zoom-img" style="height: 220px; object-fit: cover;">
                <div class="text-center text-white py-2 fw-bold small text-uppercase" style="background-color: #2b567d;">Recámara</div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="table-responsive shadow-sm" style="border-radius: 12px; overflow: hidden;">
                <table class="table table-bordered mb-0 align-middle text-center" style="border-color: #e9ecef;">
                    <tbody>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3" style="width: 30%;">Tipo</td>
                            <td class="text-start ps-4 fw-bold text-dark"><?php echo e($property->type); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Precio (MXN)</td>
                            <td class="text-start ps-4 fw-bold fs-5 text-primary">$<?php echo e(number_format($property->price, 2)); ?> MXN</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Estado</td>
                            <td class="text-start ps-4">
                                <span class="badge bg-success px-3 py-2 text-uppercase" style="border-radius: 20px;"><?php echo e($property->status); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Ubicación</td>
                            <td class="text-start ps-4 text-secondary"><?php echo e($property->location); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Dimensiones</td>
                            <td class="text-start ps-4 text-secondary"><?php echo e($property->dimensions); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-muted bg-light text-uppercase small py-3">Habitaciones</td>
                            <td class="text-start ps-4 text-secondary small"><?php echo e($property->rooms_detail); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <form action="<?php echo e(route('cart.add', $property->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-light shadow-sm text-uppercase fw-bold px-5 py-2" style="border-radius: 20px; border: 1px solid #e9ecef; color: #1a446c; font-size: 0.95rem;">
                        Agregar al Carrito
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFachada" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; overflow: hidden;">
            <div class="modal-header-custom d-flex justify-content-between align-items-center px-4 py-3 text-white">
                <h5 class="modal-title fw-bold text-uppercase small m-0">FACHADA - <?php echo e($property->title); ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img src="<?php echo e($property->image_fachada); ?>" class="w-100" style="max-height: 500px; object-fit: cover;">
                <div class="p-4 bg-white">
                    <h6 class="fw-bold text-primary mb-2">Descripción del espacio:</h6>
                    <p class="text-muted m-0 mb-2">Hermosa vista exterior con acabados residenciales modernos, iluminación led perimetral y acceso controlado.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalComedor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; overflow: hidden;">
            <div class="modal-header-custom d-flex justify-content-between align-items-center px-4 py-3 text-white">
                <h5 class="modal-title fw-bold text-uppercase small m-0">COMEDOR - <?php echo e($property->title); ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img src="<?php echo e($property->image_comedor); ?>" class="w-100" style="max-height: 500px; object-fit: cover;">
                <div class="p-4 bg-white">
                    <h6 class="fw-bold text-primary mb-2">Descripción del espacio:</h6>
                    <p class="text-muted m-0 mb-2">Espacioso comedor con excelente ventilación natural, ideal para reuniones familiares y convivencia directa con la cocina.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRecamara" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; overflow: hidden;">
            <div class="modal-header-custom d-flex justify-content-between align-items-center px-4 py-3 text-white">
                <h5 class="modal-title fw-bold text-uppercase small m-0">RECÁMARA - <?php echo e($property->title); ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img src="<?php echo e($property->image_recamara); ?>" class="w-100" style="max-height: 500px; object-fit: cover;">
                <div class="p-4 bg-white">
                    <h6 class="fw-bold text-primary mb-2">Descripción del espacio:</h6>
                    <p class="text-muted m-0 mb-2">Confortable recámara con baño privado, closets integrados y ventanales acústicos térmicos de piso a techo.</p>
                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYECTOFINAL\inmobiliaria-pamai\resources\views/inventory/show.blade.php ENDPATH**/ ?>