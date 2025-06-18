<?php
// sidebar.php

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar sesión si no está iniciada
}

$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : '';
$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';

// Función para verificar permisos
function hasAccess($required_roles = [], $required_types = [])
{
    global $user_role, $user_type;

    // Verificar roles y tipos de usuario
    $role_access = empty($required_roles) || in_array($user_role, $required_roles);
    $type_access = empty($required_types) || in_array($user_type, $required_types);

    return $role_access && $type_access;
}
?>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu"><b>DASHBOARD</b></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="dashboardSuperadmin">Dashboard</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-folder-multiple"></i>
                        <span class="hide-menu"><b>ADMINISTRACIÓN</b></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="categoriaCliente">Categoría Cliente</a></li>
                        <li><a href="categoriaProveedor">Categoría Proveedor</a></li>
                        <li><a href="cliente">Cliente</a></li>
                        <li><a href="clienteContacto">Contacto Cliente</a></li>
                        <li><a href="clienteLocal">Local Cliente</a></li>
                        <li><a href="proveedor">Proveedor</a></li>
                        <li><a href="contacto">Contacto</a></li>
                        <li><a href="condicionPago">Condición Pago</a></li>
                        <li><a href="formaPago">Forma Pago</a></li>
                        <li><a href="moneda">Moneda</a></li>
                        <li><a href="tipoRetencion">Tipo Retención</a></li>
                        <li><a href="notificacion">Notificación</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-database"></i>
                        <span class="hide-menu"><b>INVENTARIO</b></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="linea">Línea</a></li>
                        <li><a href="sublinea">Sub línea</a></li>
                        <li><a href="marca">Marca</a></li>
                        <li><a href="tipoArticulo">Tipo Artículo</a></li>
                        <li><a href="tipoMovimientoAlmacen">Tipo Movimiento Almacén</a></li>
                        <li><a href="unidadMedida">Unidad Medida</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-tools"></i>
                        <span class="hide-menu"><b>EQUIPOS Y SERVICIOS</b></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="equipo">Equipo</a></li>
                        <li><a href="equipoModelo">Modelo Equipo</a></li>
                        <li><a href="equipoTipo">Tipo Equipo</a></li>
                        <li><a href="servicioTecnico">Servicio Técnico</a></li>
                        <li><a href="tipoServicio">Tipo Servicio</a></li>
                        <li><a href="programacionServiciosTecnicos">Programación Servicios Técnicos</a></li>
                        <li><a href="plantilla">Plantilla</a></li>
                        <li><a href="plantillaHoras">Plantilla Horas</a></li>
                        <li><a href="plantillaRepuesto">Plantilla Repuesto</a></li>
                        <li><a href="plantillaRespuestoHora">Plantilla Repuesto Hora</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i>
                        <span class="hide-menu"><b>DOCUMENTOS Y ESTADOS</b></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="estadoCotizacion">Estado Cotización</a></li>
                        <li><a href="estadoDocumento">Estado Documento</a></li>
                        <li><a href="estadoEquipos">Estado Equipos</a></li>
                        <li><a href="estadoOrdenCompra">Estado Orden Compra</a></li>
                        <li><a href="estadoOrdenTrabajo">Estado Orden Trabajo</a></li>
                        <li><a href="guiaRemModalidad">Guía Remisión Modalidad</a></li>
                        <li><a href="guiaRemMotivo">Guía Remisión Motivo</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-security"></i>
                        <span class="hide-menu"><b>SEGURIDAD</b></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="modulo">Módulo</a></li>
                        <li><a href="permiso">Permiso</a></li>
                        <li><a href="rol">Rol</a></li>
                        <li><a href="rolPermiso">Rol Permiso</a></li>
                        <li><a href="usuario">Usuario</a></li>
                        <li><a href="usuarioRol">Usuario Rol</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li>
                    <a href="logout" class="waves-effect waves-dark">
                        <i class="mdi mdi-logout"></i>
                        <span class="hide-menu"><b>Cerrar Sesión</b></span>
                    </a>
                </li>
                <li class="nav-devider"></li>
            </ul>
        </nav>
    </div>
</aside>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <div class="scalable-container">
        <!-- ============================================================== -->
        <div class="container-fluid r-aside">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
                    <i class="ti-settings text-white"></i>
                </button>
