<?php require_once __DIR__.'/../../config/global.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel de Control ANDINA ENERGY IT">
    <meta name="author" content="PACIFIC">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= APP_URL ?>app/template/images/LOGO_FONDO_TRANSPARENTE.png">

    <!-- Título del Proyecto -->
    <title>PACIFIC COMPRESOR</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= APP_URL ?>app/template/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Plugins Adicionales -->
    <link href="<?= APP_URL ?>app/template/plugins/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/dropify/dist/css/dropify.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/plugins/c3-master/c3.min.css" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- CSS Customizado -->
    <link href="<?= APP_URL ?>app/template/css/style.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/css/pages/card-page.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/css/pages/progressbar-page.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/css/pages/easy-pie-chart.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/css/pages/ribbon-page.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/css/pages/file-upload.css" rel="stylesheet">
    <link href="<?= APP_URL ?>app/template/css/pages/dashboard3.css" rel="stylesheet">

    <!-- Cargar jQuery Primero -->
    <!-- Cargamos jQuery de forma local para evitar errores si la CDN no está disponible -->
    <script src="<?= APP_URL ?>app/template/plugins/jquery/jquery.min.js"></script>

    <!-- Eliminar custom.js de aquí -->
    <!-- <script src="../app/template/js/custom.js"></script> -->

</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- BEGIN LOADER -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">PACIFIC COMPRESOR</p>
        </div>
    </div>
    <!-- END LOADER -->

    <div id="main-wrapper">
        <!-- Topbar header -->
         