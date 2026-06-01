<?php $__env->startSection('content'); ?>
<div class="container-fluid p-0 position-relative d-flex align-items-center justify-content-center hero-background">
    
    <div class="position-relative d-flex flex-column align-items-center justify-content-center text-center text-white px-3 py-5" style="z-index: 2;">
        
        <h1 class="display-3 mb-2 text-uppercase tracking-wide fw-bold" 
            style="font-family: 'Montserrat', sans-serif; letter-spacing: 4px; text-shadow: 2px 4px 12px rgba(0, 0, 0, 0.85);">
            INMOBILIARIA PAMAI
        </h1>
        
        <div class="bg-white shadow-lg my-3 overflow-hidden rounded-4 d-flex align-items-center justify-content-center shadow-lg" style="width: 150px; height: 150px;">
            <img src="<?php echo e(asset('images/logo.jpeg')); ?>" alt="PM Logo" class="w-100 h-100" style="object-fit: cover;">
        </div>
        
        <h3 class="fw-semibold mb-5 text-uppercase fs-5" 
            style="font-family: 'Montserrat', sans-serif; letter-spacing: 2px; text-shadow: 1px 2px 6px rgba(0, 0, 0, 0.6);">
            ENCUENTRA TU INMUEBLE IDEAL
        </h3>
        
        <a href="<?php echo e(route('inventory')); ?>" 
           class="btn btn-pamai btn-lg px-5 py-3 rounded-pill text-uppercase fw-bold shadow-lg btn-pamai-transition" 
           style="font-family: 'Montserrat', sans-serif; background-color: #153e6b; color: white; border: none; font-size: 1.1rem; letter-spacing: 1px;">
           Consultar Inventario
        </a>
        
    </div>
</div>

<div class="container-fluid bg-white py-5 shadow-sm" style="position: relative; z-index: 3;">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0 pe-md-5">
                <span class="text-uppercase fw-bold text-secondary tracking-widest small d-block mb-2" style="font-family: 'Montserrat', sans-serif;">Nuestra Filosofía</span>
                <h2 class="fw-bold text-pamai mb-3" style="font-family: 'Montserrat', sans-serif; font-weight: 700;">Creamos espacios para toda la vida</h2>
                <p class="text-muted lh-lg mb-4">
                    En <strong>Inmobiliaria PAMAI</strong> nos inspiramos en los más altos estándares de arquitectura moderna y comodidad residencial. Te acompañamos en cada paso para asegurar el terreno o la casa de tus sueños.
                </p>
                <a href="#" class="btn btn-outline-dark btn-lg px-4 rounded-pill fw-semibold tracking-wide btn-conoce-transition" style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem;">
                    Conoce más de nosotros
                </a>
            </div>
            <div class="col-md-6">
                <div class="position-relative overflow-hidden rounded-4 shadow-lg">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1200" alt="Residencial PAMAI" class="img-fluid w-100 hover-zoom" style="max-height: 400px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hero-background {
        /* Capa oscura superpuesta usando un degradado nativo seguro (linear-gradient) sobre la imagen */
        background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url("<?php echo e(asset('images/fondoprincipal.jpg')); ?>");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        min-height: calc(100vh - 71px);
        width: 100%;
        background-color: #153e6b; /* Respaldo corporativo por seguridad */
    }

    .btn-pamai-transition:hover {
        background-color: #0d294a !important;
        transform: scale(1.04);
        box-shadow: 0px 10px 20px rgba(0,0,0,0.3) !important;
        transition: all 0.3s ease-in-out;
    }
    
    .btn-conoce-transition:hover {
        background-color: #153e6b !important;
        color: white !important;
        border-color: #153e6b !important;
        transition: all 0.3s ease-in-out;
    }

    .hover-zoom {
        transition: transform 0.5s ease;
    }
    
    .hover-zoom:hover {
        transform: scale(1.03);
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYECTOFINAL\inmobiliaria-pamai\resources\views/welcome.blade.php ENDPATH**/ ?>