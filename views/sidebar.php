<nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo text-success"
                    href="<?php echo $GLOBALS['nomeDoProjecto'] . '/index.php'; ?>">GESTASK</a>
                <a class="sidebar-brand brand-logo-mini text-success"
                    href="<?php echo $GLOBALS['nomeDoProjecto'] . '/index.php'; ?>">GT</a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-category">
                    <span class="nav-link">Navegação</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-note-multiple"></i>
                        </span>
                        <span class="menu-title">Todas as tarefas</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-view-grid-plus"></i>
                        </span>
                        <span class="menu-title">Categorias</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="#">Categoria 1</a></li>
                            <li class="nav-item"> <a class="nav-link" href="#">Categoria 2</a></li>
                            <li class="nav-item"> <a class="nav-link" href="#">Categoria 3</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-check"></i>
                        </span>
                        <span class="menu-title">Concluídas</span>
                    </a>
                </li>
            </ul>
        </nav>