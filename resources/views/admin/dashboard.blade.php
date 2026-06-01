@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: -24px;">
    <div class="row" style="min-height: 90vh;">
        
        <!-- BARRA LATERAL (SIDEBAR) AZUL MARINO DE TUS MOCKUPS -->
        <div class="col-md-3 col-lg-2 bg-pamai text-white p-4 d-flex flex-column justify-content-between shadow">
            <div>
                <div class="text-center mb-4 border-bottom pb-3">
                    <h4 class="fw-bold m-0 tracking-wide">PM</h4>
                    <small class="text-uppercase text-white-50 small">Inmobiliaria</small>
                </div>
                
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a class="nav-link text-white bg-white bg-opacity-10 rounded px-3 py-2 fw-bold" href="#">📊 Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50 px-3 py-2" href="#">🏠 Propiedades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50 px-3 py-2" href="#">👥 Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50 px-3 py-2" href="#">📄 Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50 px-3 py-2" href="#">🤝 Contratos</a>
                    </li>
                </ul>
            </div>
            
            <!-- Botón de Cerrar Sesión Obligatorio de tu lista -->
            <div class="border-top pt-3 text-center">
                <small class="d-block mb-2 text-white-50">Hola, Admin 👋</small>
                <a class="btn btn-danger btn-sm w-100 rounded-pill" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                    Cerrar Sesión
                </a>
                <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </div>

        <!-- CONTENIDO PRINCIPAL DEL DASHBOARD -->
        <div class="col-md-9 col-lg-10 bg-light p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold m-0 text-pamai">Hola, Admin 👋</h2>
                    <p class="text-muted m-0">Bienvenido a tu panel inmobiliario</p>
                </div>
                <button class="btn btn-pamai rounded-pill px-4">+ Añadir Propiedad</button>
            </div>

            <!-- TARJETAS DE MÉTRICAS (PROPIEDADES TOTALES, VENDIDAS, GANANCIAS) -->
            <div class="row mb-5">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm p-4 text-center bg-white rounded-4">
                        <h6 class="text-muted text-uppercase small fw-bold">Propiedades Totales</h6>
                        <h2 class="fw-bold text-pamai m-0">78</h2>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm p-4 text-center bg-white rounded-4">
                        <h6 class="text-muted text-uppercase small fw-bold">Vendidas este Mes</h6>
                        <h2 class="fw-bold text-pamai m-0">12</h2>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm p-4 text-center bg-white rounded-4">
                        <h6 class="text-muted text-uppercase small fw-bold">Nuevos Clientes</h6>
                        <h2 class="fw-bold text-pamai m-0">34</h2>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm p-4 text-center bg-white rounded-4">
                        <h6 class="text-muted text-uppercase small fw-bold">Ganancias del Mes</h6>
                        <h2 class="fw-bold text-success m-0">$45,000</h2>
                    </div>
                </div>
            </div>

            <!-- TABLA DE PROPIEDADES RECIENTES -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h5 class="fw-bold text-pamai mb-4">Propiedades Recientes</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Imagen</th>
                                <th>Dirección / Título</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="bg-secondary rounded bg-opacity-20" style="width: 45px; height: 45px;"></div></td>
                                <td class="fw-bold">Departamento Zona Centro</td>
                                <td>$12,500 MXN</td>
                                <td><span class="badge bg-success-subtle text-success border border-success px-2 py-1 rounded-pill">En Venta</span></td>
                                <td>Martínez</td>
                            </tr>
                            <tr>
                                <td><div class="bg-secondary rounded bg-opacity-20" style="width: 45px; height: 45px;"></div></td>
                                <td class="fw-bold">Casa en Venta | Cholula</td>
                                <td>$345,500 MXN</td>
                                <td><span class="badge bg-danger-subtle text-danger border border-danger px-2 py-1 rounded-pill">Vendida</span></td>
                                <td>Miranda</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection