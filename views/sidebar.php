<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_name("Gestor_Tarefas");
    session_start();
}
include_once '../constantes/constantes.php';
include '../sessions/session.php';
?>

<html>

<head>
    <meta charset='utf-8'>
    <title>Gestor de Tarefas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../content/css/custom/estilo.css">



    <!-- plugins:css -->
    <link rel="stylesheet" href="../content/css/vendors/materialdesignicons.min.css">
    <link rel="stylesheet" href="../content/css/vendors/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../content/css/styleSidebar.css">
    <!-- End layout styles -->
</head>

<body class="">

    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo text-success" href="<?php echo $GLOBALS['nomeDoProjecto'] . '/index.php';?>">GESTASK</a>
                <a class="sidebar-brand brand-logo-mini text-success" href="<?php echo $GLOBALS['nomeDoProjecto'] . '/index.php';?>">GT</a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-category">
                    <span class="nav-link">Navegação</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Tarefas</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link"
                                    href="#">Categoria 1</a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="#">Categoria 2</a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="#">Categoria 3</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Membros</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->


        <div class="container-fluid page-body-wrapper">
            <?= require_once './navbar.php'; ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 col-xl-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tarefas</h4>
                                    <div class="add-items d-flex">
                                        <input type="text" class="form-control todo-list-input"
                                            placeholder="Nova tarefa...">
                                        <button class="add btn btn-primary todo-list-add-btn">Adicionar</button>
                                    </div>
                                    <div class="list-wrapper">
                                        <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                                            <!--
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox"> Create invoice </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox"> Meeting with Alita
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" checked> Prepare for
                                                        presentation </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox"> Plan weekend outing
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox"> Pick up kids from
                                                        school </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                        -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--
                    <div class="container">
                        <div class="row g-4 bg-dark text-light m-5 text-center box-rounded">
                            <h1 class="mt-4">Gestor de Tarefas</h1>
                            <h2>Adicionar/Editar Tarefa</h2>

                            <!-- Formulário para adicionar ou editar uma tarefa --
                            <div class="mt-4 d-flex justify-content-center">
                                <form id="taskForm">
                                    <div class="row g-1 ps-5 pe-5 ms-5 me-5 d-flex justify-content-center">
                                        <div class="col-lg-6 col-md-8">
                                            <div class="mb-3">
                                                <input type="text" id="taskName" class="form-control"
                                                    placeholder="Nome da tarefa" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-8">
                                            <div class="mb-3">
                                                <select id="category" class="form-select" required>
                                                    <option selected disabled value="">--Selecione a categoria--
                                                    </option>
                                                    <option value="Trabalho">Trabalho</option>
                                                    <option value="Estudo">Estudo</option>
                                                    <option value="Lazer">Lazer</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-md-8">
                                            <div class="mb-3">
                                                <input type="date" id="startDate" class="form-control"
                                                    placeholder="Data de Início" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-8">
                                            <div class="mb-3">
                                                <input type="date" id="completionDate" class="form-control"
                                                    placeholder="Data de Conclusão" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-10 col-md-8">
                                            <div class="mb-3">
                                                <textarea rows="3" maxlength="200" type="text" id="taskDescription"
                                                    class="form-control" placeholder="Descrição da tarefa"
                                                    style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-1 ps-5 pe-5 ms-5 me-5 d-flex justify-content-center">
                                        <div class="col-lg-2">
                                            <button type="submit" id="submitButton" class="btn text-light"
                                                style="background-color: royalblue;"><i class="fas fa-plus"></i>
                                                Adicionar</button>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" hidden id="cancelButton"
                                                class="btn btn-secondary">Cancelar</button>
                                        </div>
                                        <div class="mb-4"></div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Lista de tarefas --
                        <div class="mt-4 mb-4">
                            <h2 hidden>Tarefas</h2>
                            <ul id="taskList" class="list-group">
                                <!-- As tarefas serão adicionadas dinamicamente aqui --
                            </ul>
                        </div>
                    </div>
                    -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
              2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                templates</a> from Bootstrapdash.com</span>
          </div>
        </footer>
      -->
                <!-- partial -->


            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../scripts/vendors/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../scripts/custom/off-canvas.js"></script>
    <script src="../scripts/custom/hoverable-collapse.js"></script>
    <script src="../scripts/custom/misc.js"></script>
    <script src="../scripts/custom/settings.js"></script>
    <script src="../scripts/custom/scriptTarefas.js"></script>
    <!-- endinject 
    <script src="../scripts/custom/todolist.js"></script>
-->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->