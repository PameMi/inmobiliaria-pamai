

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <div class="text-center text-white py-3 mb-4" style="background-color: #1a446c; border-radius: 4px; position: relative;">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-outline-light btn-sm" style="position: absolute; left: 15px; top: 12px;">← Cancelar</a>
        <h4 class="mb-0 text-uppercase fw-bold" style="letter-spacing: 1px;">Editar Propiedad</h4>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4" style="border-radius: 16px;">
                <form action="<?php echo e(route('admin.update', $property->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="mb-3">
                        <label class="fw-bold text-muted small text-uppercase mb-1">Título de la Propiedad</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($property->title); ?>" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Tipo</label>
                            <select name="type" class="form-select" required>
                                <option value="CASA" <?php echo e($property->type == 'CASA' ? 'selected' : ''); ?>>CASA</option>
                                <option value="TERRENO" <?php echo e($property->type == 'TERRENO' ? 'selected' : ''); ?>>TERRENO</option>
                                <option value="DEPARTAMENTO" <?php echo e($property->type == 'DEPARTAMENTO' ? 'selected' : ''); ?>>DEPARTAMENTO</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Precio (MXN)</label>
                            <input type="number" name="price" class="form-control" value="<?php echo e($property->price); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-muted small text-uppercase mb-1">Ubicación Completa</label>
                        <input type="text" name="location" class="form-control" value="<?php echo e($property->location); ?>" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Dimensiones</label>
                            <input type="text" name="dimensions" class="form-control" value="<?php echo e($property->dimensions); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small text-uppercase mb-1">Habitaciones / Detalles</label>
                            <input type="text" name="rooms_detail" class="form-control" value="<?php echo e($property->rooms_detail); ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold text-muted small text-uppercase mb-1">URL de la Imagen de Fachada</label>
                        <input type="url" name="image_fachada" class="form-control" value="<?php echo e($property->image_fachada); ?>" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning fw-bold text-uppercase py-2" style="border-radius: 8px; color: #1a446c;">
                            Actualizar Datos en Supabase
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYECTOFINAL\inmobiliaria-pamai\resources\views/admin/edit.blade.php ENDPATH**/ ?>