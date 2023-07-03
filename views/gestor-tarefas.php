<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_name("Gestor_Tarefas");
    session_start();
}
include_once '../constantes/constantes.php';
include '../sessions/session.php';
?>

<head>
    <meta charset='utf-8'>
    <title>Gestor de Tarefas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- plugins:css -->
    <link rel="stylesheet" href="../content/css/vendors/materialdesignicons.min.css">
    <!-- endinject
        <link rel="stylesheet" href="../content/css/vendors/vendor.bundle.base.css">
    -->
    <link rel="stylesheet" type="text/css" href="../content/css/custom/estiloTexto.css">
    <link rel="stylesheet" type="text/css" href="../content/css/custom/estiloCards.css">
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../content/css/styleSidebar.css">
    <!-- End layout styles -->
</head>

<body>
    <div class="container-scroller">
        <?php require_once './sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php require_once './navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div id="corpo_documento" class="row">
                    </div>
                </div>
                <?php include './modals/modalEditarTarefa.php'; ?>
                <?php include './modals/modalEditarCategoria.php'; ?>
                <?php include './modals/modalAddCategoria.php'; ?>
            </div>
        </div>
    </div>
    <!-- plugins:js -->
    <script src="../scripts/vendors/vendor.bundle.base.js"></script>
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js 
-->
    <script src="../scripts/custom/off-canvas.js"></script>
    <script src="../scripts/custom/hoverable-collapse.js"></script>
    <script src="../scripts/custom/misc.js"></script>
    <script src="../scripts/custom/scriptTarefas.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>


    </script>