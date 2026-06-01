

<?php $__env->startSection('content'); ?>
<!-- Cargamos de forma limpia Font Awesome para los íconos profesionales -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Estructura Avanzada del Sidebar Corporativo */
    .sidebar-admin {
        background-color: #112d4e; /* Azul noche profundo, más premium */
        min-height: calc(100vh - 71px);
        box-shadow: inset -5px 0 15px rgba(0,0,0,0.05);
    }
    
    .sidebar-title {
        color: #abc4ff;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        padding: 20px 24px 10px 24px;
    }

    .sidebar-admin .nav-link {
        color: #d6e4f0;
        font-weight: 500;
        font-size: 0.9rem;
        padding: 14px 24px;
        border-radius: 0;
        transition: all 0.25s ease;
        display: flex;
        align-items: center;
        gap: 14px;
        border-left: 4px solid transparent;
        background: none;
        width: 100%;
    }

    .sidebar-admin .nav-link i {
        font-size: 1.1rem;
        width: 24px;
        transition: color 0.25s ease;
    }

    /* Efecto premium activo e interacciones */
    .sidebar-admin .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.05);
        color: #ffffff !important;
    }
    
    .sidebar-admin .nav-link.active {
        background-color: #1a446c;
        color: #ffc107 !important;
        border-left: 4px solid #ffc107;
        font-weight: 600;
    }
    
    .sidebar-admin .nav-link.active i {
        color: #ffc107;
    }

    /* Tarjetas Métricas Modernas con microinteracciones */
    .metric-card {
        border-radius: 14px;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        background-color: #ffffff;
        transition: all 0.3s ease;
    }
    
    .metric-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(21, 62, 107, 0.08);
    }

    .metric-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 12px;
    }

    /* Tabla Estilizada */
    .custom-table-card {
        border-radius: 14px;
        border: none;
        box-shadow: 0 4px 25px rgba(0,0,0,0.03);
        background-color: #ffffff;
    }
    
    .table th {
        font-weight: 600;
        color: #5c6b73;
        background-color: #f8f9fa;
        border-bottom: 2px solid #eef2f3;
    }
</style>

<div class="container-fluid p-0" style="background-color: #f7f9fc;">
    <div class="row g-0">
        <!-- BARRA LATERAL IZQUIERDA REDISEÑADA -->
        <div class="col-md-2 sidebar-admin d-flex flex-column justify-content-between py-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="sidebar-title text-uppercase">
                    Menú de Control
                </div>
                <button class="nav-link active text-start" id="tab-dashboard-btn" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                </button>
                <button class="nav-link text-start" id="tab-propiedades-btn" data-bs-toggle="pill" data-bs-target="#tab-propiedades" type="button" role="tab">
                    <i class="fa-solid fa-building-user"></i> Propiedades
                </button>
                <button class="nav-link text-start" id="tab-clientes-btn" data-bs-toggle="pill" data-bs-target="#tab-clientes" type="button" role="tab">
                    <i class="fa-solid fa-users-gear"></i> Clientes
                </button>
                <button class="nav-link text-start" id="tab-reportes-btn" data-bs-toggle="pill" data-bs-target="#tab-reportes" type="button" role="tab">
                    <i class="fa-solid fa-chart-line"></i> Reportes
                </button>
                <button class="nav-link text-start" id="tab-contratos-btn" data-bs-toggle="pill" data-bs-target="#tab-contratos" type="button" role="tab">
                    <i class="fa-solid fa-file-signature"></i> Contratos
                </button>
            </div>
            
            <div class="px-4 pt-3 border-top border-dark text-white-50 small">
                <div class="d-flex align-items-center gap-2" style="font-size: 0.8rem;">
                    <i class="fa-solid fa-shield-halved text-success"></i>
                    <span>Admin Autorizado</span>
                </div>
                <span style="font-size: 0.7rem; display:block;" class="mt-1">PAMAI Inmobiliaria v2.6</span>
            </div>
        </div>

        <!-- CONTENEDOR DE CONTENIDO DINÁMICO (Derecha) -->
        <div class="col-md-10 px-4 py-4">
            
            <?php if(session('success')): ?>
                <div class="alert alert-success text-center shadow-sm mb-4 border-0" style="border-radius: 8px; background-color: #d4edda; color: #155724;">
                    <i class="fa-solid fa-circle-check me-2"></i> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="tab-content" id="v-pills-tabContent">
                
                <!-- ================= 1. PESTAÑA: DASHBOARD INDUSTRIAL ================= -->
                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel">
                    <div class="mb-4">
                        <h2 class="fw-bold m-0 text-dark" style="letter-spacing: -0.5px;">Panel de Control General</h2>
                        <p class="text-muted m-0 small">Indicadores operativos e ingresos de Inmobiliaria PAMAI.</p>
                    </div>

                    <!-- Fila de Tarjetas de Indicadores Métricos -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-3">
                            <div class="card metric-card p-3">
                                <div class="metric-icon-box bg-primary-subtle text-primary">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                <span class="text-muted small text-uppercase fw-bold tracking-wide" style="font-size:0.7rem;">Propiedades Totales</span>
                                <h3 class="fw-bold text-dark m-0 mt-1">78</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card metric-card p-3">
                                <div class="metric-icon-box bg-success-subtle text-success">
                                    <i class="fa-solid fa-handshake"></i>
                                </div>
                                <span class="text-muted small text-uppercase fw-bold tracking-wide" style="font-size:0.7rem;">Vendidas este Mes</span>
                                <h3 class="fw-bold text-success m-0 mt-1">12</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card metric-card p-3">
                                <div class="metric-icon-box bg-info-subtle text-info">
                                    <i class="fa-solid fa-user-plus"></i>
                                </div>
                                <span class="text-muted small text-uppercase fw-bold tracking-wide" style="font-size:0.7rem;">Nuevos Clientes</span>
                                <h3 class="fw-bold text-info m-0 mt-1">34</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card metric-card p-3">
                                <div class="metric-icon-box bg-warning-subtle text-dark">
                                    <i class="fa-solid fa-wallet"></i>
                                </div>
                                <span class="text-muted small text-uppercase fw-bold tracking-wide" style="font-size:0.7rem;">Ganancias del Mes</span>
                                <h3 class="fw-bold text-dark m-0 mt-1">$45,000 <span class="fs-6 fw-normal text-muted">USD</span></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Propiedades Recientes -->
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fa-solid fa-clock-rotate-left text-secondary"></i>
                        <h5 class="fw-bold text-dark text-uppercase m-0 small" style="letter-spacing: 0.5px;">Últimas actualizaciones de catálogo</h5>
                    </div>
                    
                    <div class="card custom-table-card p-3 mb-4">
                        <table class="table table-hover align-middle text-center mb-0">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th class="text-start">Dirección / Título</th>
                                    <th>Precio de Salida</th>
                                    <th>Estado de Operación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid #f8f9fa;">
                                    <td><img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=100" class="rounded shadow-sm" style="width: 55px; height: 35px; object-fit: cover;"></td>
                                    <td class="text-start fw-bold text-dark">CASA DE LUJO SANTA FE</td>
                                    <td class="fw-semibold text-secondary">$120,000 MXN</td>
                                    <td><span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill small">En Venta</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://images.pexels.com/photos/462118/pexels-photo-462118.jpeg?auto=compress&cs=tinysrgb&w=100" class="rounded shadow-sm" style="width: 55px; height: 35px; object-fit: cover;"></td>
                                    <td class="text-start fw-bold text-dark">DEPARTAMENTO LOMAS VERDES</td>
                                    <td class="fw-semibold text-secondary">$45,000 MXN</td>
                                    <td><span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill small">En Venta</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ================= 2. PESTAÑA: PROPIEDADES (CRUD) ================= -->
                <div class="tab-pane fade" id="tab-propiedades" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0 fw-bold text-dark"><i class="fa-solid fa-list-check me-2"></i> Control de Inventario</h4>
                        <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-success btn-sm fw-bold px-3 shadow-sm" style="border-radius: 20px;">
                            <i class="fa-solid fa-plus me-1"></i> Registrar Inmueble
                        </a>
                    </div>
                    
                    <div class="card custom-table-card overflow-hidden">
                        <table class="table table-hover align-middle mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Miniatura</th>
                                    <th class="text-start">Título</th>
                                    <th>Tipo</th>
                                    <th>Precio</th>
                                    <th>Gestión</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><img src="<?php echo e($property->image_fachada); ?>" class="rounded" style="width: 55px; height: 35px; object-fit: cover;"></td>
                                        <td class="text-start fw-bold text-dark"><?php echo e($property->title); ?></td>
                                        <td><span class="badge bg-secondary-subtle text-secondary border px-2 py-1"><?php echo e($property->type); ?></span></td>
                                        <td class="fw-bold text-primary">$<?php echo e(number_format($property->price, 2)); ?></td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="<?php echo e(route('admin.edit', $property->id)); ?>" class="btn btn-sm btn-light border text-warning px-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="<?php echo e(route('admin.destroy', $property->id)); ?>" method="POST" onsubmit="return confirm('¿Confirmar baja permanente del catálogo?')">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-light border text-danger px-2"><i class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ================= 3. PESTAÑA: CLIENTES ================= -->
                <div class="tab-pane fade" id="tab-clientes" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0 fw-bold text-dark"><i class="fa-solid fa-users me-2"></i> Padrón Corporativo de Clientes</h4>
                        <button class="btn btn-primary btn-sm fw-bold px-3 shadow-sm" style="border-radius: 20px;" data-bs-toggle="collapse" data-bs-target="#collapseNuevoCliente">
                            <i class="fa-solid fa-user-plus me-1"></i> Alta de Cliente
                        </button>
                    </div>

                    <!-- FORMULARIO SECCIONES -->
                    <div class="collapse mb-4" id="collapseNuevoCliente">
                        <div class="card border-0 shadow-sm p-4" style="border-radius: 14px; background-color: #ffffff;">
                            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-file-lines text-primary me-2"></i> Expediente de Registro Inicial</h5>
                            
                            <form action="<?php echo e(route('admin.client.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <p class="fw-bold text-primary small text-uppercase tracking-wider border-bottom pb-1 mb-3">Sección 1: Datos Personales</p>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small text-secondary fw-semibold mb-1">Nombre Completo</label>
                                        <input type="text" name="fullname" class="form-control form-control-sm" placeholder="Ej: Pamela Miranda" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-secondary fw-semibold mb-1">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-secondary fw-semibold mb-1">Tipo de Identificación</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="INE / Cédula">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-secondary fw-semibold mb-1">Teléfono Móvil</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="55 1234 5678">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-secondary fw-semibold mb-1">Nacionalidad</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Mexicana">
                                    </div>
                                </div>

                                <p class="fw-bold text-primary small text-uppercase tracking-wider border-bottom pb-1 mb-3 mt-4">Sección 2: Canales de Contacto</p>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small text-secondary fw-semibold mb-1">Correo Electrónico Corporativo</label>
                                        <input type="email" name="email" class="form-control form-control-sm" placeholder="nombre@empresa.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-secondary fw-semibold mb-1">Dirección de Residencia Actual</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Calle, Colonia, Entidad">
                                    </div>
                                </div>

                                <p class="fw-bold text-primary small text-uppercase tracking-wider border-bottom pb-1 mb-3 mt-4">Sección 3: Requerimientos Inmobiliarios</p>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <label class="small text-secondary fw-semibold mb-1">Segmento de Interés</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Residencial / Comercial">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-secondary fw-semibold mb-1">Presupuesto Comercial Asignado</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Ej: $5,000,000 MXN">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-secondary fw-semibold mb-1">Notas de Asesoría</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Buscando lote plano / créditos autorizados">
                                    </div>
                                </div>

                                <div class="d-flex gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light border btn-sm px-4" data-bs-toggle="collapse" data-bs-target="#collapseNuevoCliente" style="border-radius:20px;">Cerrar</button>
                                    <button type="submit" class="btn btn-dark btn-sm px-4" style="border-radius:20px;">Validar y Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tabla de Listado de Clientes Ejecutiva -->
                    <div class="card custom-table-card p-3">
                        <table class="table align-middle text-center mb-0">
                            <thead>
                                <tr>
                                    <th>Nombre de Registro</th>
                                    <th>Canal de Correo</th>
                                    <th>Contacto Telefónico</th>
                                    <th>Ubicación</th>
                                    <th>Estatus Legal</th>
                                    <th>Ficha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-dark">Juanita M.</td>
                                    <td class="text-muted">juanilop02@gmail.com</td>
                                    <td>55 2586 2658</td>
                                    <td class="small">Toluca, EdoMex</td>
                                    <td><span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">ACTIVO</span></td>
                                    <td><span class="text-secondary" style="cursor:pointer;"><i class="fa-solid fa-folder-open"></i></span></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">Romeo G.</td>
                                    <td class="text-muted">romdan05@gmail.com</td>
                                    <td>75 6259 3628</td>
                                    <td class="small">Metepec, Centro</td>
                                    <td><span class="badge bg-danger-subtle text-danger px-3 py-1 rounded-pill">INACTIVO</span></td>
                                    <td><span class="text-secondary" style="cursor:pointer;"><i class="fa-solid fa-folder-open"></i></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ================= 4. PESTAÑA: REPORTES ANALÍTICOS ================= -->
                <div class="tab-pane fade" id="tab-reportes" role="tabpanel">
                    <div class="mb-4">
                        <h4 class="fw-bold text-dark m-0"><i class="fa-solid fa-chart-pie me-2"></i> Reportes y Rendimiento Operativo</h4>
                        <p class="text-muted small m-0">Análisis visual de transacciones acumuladas y balance del catálogo.</p>
                    </div>
                    
                    <div class="row g-4">
                        <!-- Tendencias de venta con Chart.js -->
                        <div class="col-md-7">
                            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 12px; background-color: #ffffff;">
                                <h6 class="fw-bold text-secondary text-uppercase small mb-3">
                                    <i class="fa-solid fa-wave-square me-2 text-primary"></i>Tendencia de Ingresos Mensuales (2026)
                                </h6>
                                <div style="position: relative; height:250px; width:100%;">
                                    <canvas id="lineChartVentas"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Distribución del inventario real -->
                        <div class="col-md-5">
                            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 12px; background-color: #ffffff;">
                                <h6 class="fw-bold text-secondary text-uppercase small mb-3">
                                    <i class="fa-solid fa-chart-pie me-2 text-warning"></i>Distribución del Catálogo por Tipo
                                </h6>
                                <div style="position: relative; height:200px; width:100%;" class="d-flex justify-content-center">
                                    <canvas id="doughnutChartCatálogo"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= 5. PESTAÑA: CONTRATOS ADMINISTRACIÓN (image_f06664.png) ================= -->
                <div class="tab-pane fade" id="tab-contratos" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="fw-bold m-0 text-dark"><i class="fa-solid fa-file-contract me-2"></i> Archivo de Contratos de Arrendamiento</h4>
                            <p class="text-muted m-0 small">Auditoría legal de vigencias y cierres mensuales.</p>
                        </div>
                        <span class="badge bg-dark px-3 py-2 text-uppercase font-monospace">Ciclo Fiscal 2026</span>
                    </div>

                    <div class="card custom-table-card p-3">
                        <table class="table align-middle text-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rubro de Propiedad</th>
                                    <th>Estatus Legal</th>
                                    <th>Fecha de Firma</th>
                                    <th>Valor Financiado</th>
                                    <th>Ejecutivo Asignado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold font-monospace">CTR-001</td>
                                    <td><i class="fa-solid fa-house-chimney text-muted me-2"></i> Casa Habitación - Santa Fe</td>
                                    <td><span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">VIGENTE</span></td>
                                    <td class="small">21/03/2026</td>
                                    <td class="fw-bold text-dark">$45,000</td>
                                    <td>Lic. Lujano M.</td>
                                    <td>
                                        <button class="btn btn-sm btn-light border btn-view-contract" 
                                                data-id="CTR-001"
                                                data-propiedad="Casa Habitación - Santa Fe"
                                                data-estatus="VIGENTE"
                                                data-fecha="21 de Marzo de 2026"
                                                data-monto="$45,000 MXN"
                                                data-asesor="Lic. Lujano M."
                                                data-cliente="Juanita M."
                                                data-bs-toggle="modal" 
                                                data-bs-target="#contractModal">
                                            <i class="fa-solid fa-file-lines text-primary me-1"></i> Ver Contrato
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold font-monospace">CTR-002</td>
                                    <td><i class="fa-solid fa-building text-muted me-2"></i> Local Comercial - Lomas Verdes</td>
                                    <td><span class="badge bg-danger-subtle text-danger px-3 py-1 rounded-pill">VENCIDO</span></td>
                                    <td class="small">15/01/2026</td>
                                    <td class="fw-bold text-dark">$18,000</td>
                                    <td>Ing. Miranda A.</td>
                                    <td>
                                        <button class="btn btn-sm btn-light border btn-view-contract" 
                                                data-id="CTR-002"
                                                data-propiedad="Local Comercial - Lomas Verdes"
                                                data-estatus="VENCIDO"
                                                data-fecha="15 de Enero de 2026"
                                                data-monto="$18,000 MXN"
                                                data-asesor="Ing. Miranda A."
                                                data-cliente="Romeo G."
                                                data-bs-toggle="modal" 
                                                data-bs-target="#contractModal">
                                            <i class="fa-solid fa-file-lines text-primary me-1"></i> Ver Contrato
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ================= VENTANA EMERGENTE: MODAL VISUALIZADOR DE CONTRATO ================= -->
<div class="modal fade" id="contractModal" tabindex="-1" aria-labelledby="contractModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header bg-dark text-white p-3" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-gavel text-warning fs-5"></i>
                    <h5 class="modal-title fw-bold m-0" id="contractModalLabel">Instrumento Legal de Arrendamiento</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light p-4">
                <div class="bg-white p-5 shadow-sm border mx-auto position-relative" style="max-width: 100%; border-radius: 4px; font-family: 'Times New Roman', Times, serif; color: #222; line-height: 1.6;">
                    
                    <!-- Membrete Ejecutivo -->
                    <div class="text-center mb-4">
                        <h4 class="fw-bold tracking-wide m-0" style="color: #112d4e;">INMOBILIARIA PAMAI S.A. DE C.V.</h4>
                        <small class="text-secondary font-monospace text-uppercase" id="modal-contract-id" style="font-size: 0.85rem; font-weight: bold;"></small>
                        <hr class="my-2" style="border-color: #112d4e;">
                    </div>

                    <!-- Datos Generales de Control -->
                    <div class="mb-4 p-3 bg-light rounded font-monospace" style="font-size: 0.85rem; font-family: sans-serif;">
                        <div class="row g-2">
                            <div class="col-6"><strong>Arrendatario:</strong> <span id="modal-client"></span></div>
                            <div class="col-6"><strong>Fecha de Cierre:</strong> <span id="modal-date"></span></div>
                            <div class="col-6"><strong>Monto Mensual:</strong> <span id="modal-amount"></span></div>
                            <div class="col-6"><strong>Estatus Legal:</strong> <span id="modal-status"></span></div>
                            <div class="col-12"><strong>Inmueble Vinculado:</strong> <span id="modal-property"></span></div>
                        </div>
                    </div>

                    <!-- Texto Legal Declaratorio -->
                    <h6 class="fw-bold text-uppercase text-center mb-3">CONTRATO DE ARRENDAMIENTO</h6>
                    <p style="text-align: justify; text-indent: 30px;">
                        CONTRATO DE ARRENDAMIENTO QUE CELEBRAN, POR UNA PARTE, <strong>INMOBILIARIA PAMAI S.A. DE C.V.</strong>, REPRESENTADA EN ESTE ACTO POR EL ASESOR ASIGNADO <strong id="modal-agent"></strong>, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ COMO "EL ARRENDADOR", Y POR LA OTRA PARTE LA PERSONA REGISTRADA EN EL APARTADO DE CONTROL, A QUIEN SE LE DENOMINARÁ "EL ARRENDATARIO".
                    </p>
                    
                    <h6 class="fw-bold text-uppercase mt-4 mb-2">DECLARACIONES Y CLÁUSULAS</h6>
                    <p style="text-align: justify;">
                        <strong>PRIMERA. MATERIA DEL CONTRATO.</strong> El Arrendador otorga en arrendamiento el uso y goce temporal del inmueble descrito anteriormente, el cual cuenta con todas las condiciones de habitabilidad requeridas por la normatividad vigente.
                    </p>
                    <p style="text-align: justify;">
                        <strong>SEGUNDA. PRECIO Y PAGO.</strong> El Arrendatario se obliga a pagar puntualmente por concepto de renta mensual la cantidad estipulada en el panel de control, dentro de los primeros cinco días naturales de cada mes de manera íntegra.
                    </p>
                    <p style="text-align: justify;">
                        <strong>TERCERA. VIGENCIA.</strong> Las partes acuerdan que el presente instrumento jurídico surtirá efectos a partir de la fecha de firma plasmada, teniendo una vigencia obligatoria de doce meses para ambas partes.
                    </p>

                    <!-- Firmas simuladas -->
                    <div class="row text-center mt-5 pt-4">
                        <div class="col-6">
                            <div style="border-bottom: 1px solid #333; width: 80%; margin: 0 auto 5px auto;"></div>
                            <small class="fw-bold text-muted text-uppercase d-block" style="font-size:0.75rem;">El Arrendador (PAMAI)</small>
                        </div>
                        <div class="col-6">
                            <div style="border-bottom: 1px solid #333; width: 80%; margin: 0 auto 5px auto;"></div>
                            <small class="fw-bold text-muted text-uppercase d-block" style="font-size:0.75rem;">El Arrendatario (Cliente)</small>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-sm btn-secondary px-3" data-bs-dismiss="modal" style="border-radius:20px;">Cerrar Vista</button>
                <button type="button" class="btn btn-sm btn-dark px-3" onclick="window.print();" style="border-radius:20px;">
                    <i class="fa-solid fa-print me-1"></i> Imprimir Expediente
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Carga de la librería oficial de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- 1. SCRIPT DE INTERACTIVIDAD DINÁMICA DE CONTRATOS ---
        const buttons = document.querySelectorAll('.btn-view-contract');
        
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const propiedad = this.getAttribute('data-propiedad');
                const estatus = this.getAttribute('data-estatus');
                const fecha = this.getAttribute('data-fecha');
                const monto = this.getAttribute('data-monto');
                const asesor = this.getAttribute('data-asesor');
                const cliente = this.getAttribute('data-cliente');
                
                document.getElementById('modal-contract-id').innerText = "FOLIO DIGITAL DE REGISTRO: " + id;
                document.getElementById('modal-client').innerText = cliente;
                document.getElementById('modal-date').innerText = fecha;
                document.getElementById('modal-amount').innerText = monto;
                document.getElementById('modal-status').innerText = estatus;
                document.getElementById('modal-property').innerText = propiedad;
                document.getElementById('modal-agent').innerText = asesor.toUpperCase();
                
                const statusBadge = document.getElementById('modal-status');
                if(estatus === 'VIGENTE') {
                    statusBadge.className = "badge bg-success-subtle text-success font-sans shadow-sm";
                } else {
                    statusBadge.className = "badge bg-danger-subtle text-danger font-sans shadow-sm";
                }
            });
        });

        // --- 2. CONFIGURACIÓN DEL GRÁFICO DE LÍNEAS (INGRESOS MENSUALES) ---
        const ctxLine = document.getElementById('lineChartVentas').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Ingresos Mensuales ($ MXN)',
                    data: [15000, 28000, 18000, 32000, 45000, 39000],
                    borderColor: '#153e6b',
                    backgroundColor: 'rgba(21, 62, 107, 0.05)',
                    borderWidth: 3,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f3f5' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // --- 3. CONFIGURACIÓN DEL GRÁFICO DE DONA (DISTRIBUCIÓN DEL INVENTARIO) ---
        const ctxDoughnut = document.getElementById('doughnutChartCatálogo').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Casas', 'Terrenos', 'Departamentos'],
                datasets: [{
                    data: [45, 20, 13], // Suma las 78 propiedades totales que tienes en el mockup
                    backgroundColor: ['#153e6b', '#ffc107', '#6c757d'],
                    borderWidth: 2,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, font: { size: 11, family: 'Montserrat' } }
                    }
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYECTOFINAL\inmobiliaria-pamai\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>