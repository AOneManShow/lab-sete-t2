<?php
include_once '../constantes/constantes.php';
?>

<html lang="pt-br">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tela Inicial</title>

    <!--Inter UI font-->
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">

    <!--estilo vendors-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Bootstrap CSS / Esquema de cores -->
    <link rel="stylesheet" href="<?= $GLOBALS['nomeDoProjecto'] . '/views/css/default.css'; ?>" id="theme-color">
</head>

<body>

    <!--nav bar-->
    <section class="smart-scroll">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-dark">
                <a class="navbar-brand heading-black" href="<?= $GLOBALS['nomeDoProjecto'] . '/index.php'; ?>">
                    GesTask
                </a>
                <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span data-feather="grid"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#features">Recursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll d-flex flex-row align-items-center text-primary"
                                href="<?= $GLOBALS['nomeDoProjecto'] . '/index.php?op=login'; ?>">
                                <em data-feather="layout" width="18" height="18" class="mr-2"></em>
                                Entrar
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>

    <!--hero header-->
    <section class="py-7 py-md-0 bg-hero" id="home">
        <div class="container">
            <div class="row vh-md-100">
                <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">
                    <h1 class="heading-black text-capitalize">Gerencie suas tarefas diárias com o GesTask</h1>
                    <p class="lead py-3">Nossa
                        plataforma simplifica o processo, permitindo que você organize, acompanhe e colabore em
                        projectos
                        de forma intuitiva.
                        Gratuitamente.
                    </p>
                    <a href="<?= $GLOBALS['nomeDoProjecto'] . '/index.php?op=registar'; ?>">
                        <button class="btn btn-primary d-inline-flex flex-row align-items-center">
                            Increver-se agora
                            <em class="ml-2" data-feather="arrow-right"></em>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- recursos section -->
    <section class="pt-6 pb-7" id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <h2 class="heading-black">GesTask oferece tudo o que você procura.</h2>
                    <p class="text-muted lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in
                        nisi
                        commodo, tempus odio a, vestibulum nibh.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <div class="row feature-boxes">
                        <div class="col-md-6 box">
                            <div class="icon-box box-primary">
                                <div class="icon-box-inner">
                                    <span data-feather="edit" width="35" height="35"></span>
                                </div>
                            </div>
                            <h5>Crie, edite, conclua tarefas.</h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in
                                nisi commodo, tempus odio a, vestibulum nibh.</p>
                        </div>
                        <div class="col-md-6 box">
                            <div class="icon-box box-success">
                                <div class="icon-box-inner">
                                    <span data-feather="monitor" width="35" height="35"></span>
                                </div>
                            </div>
                            <h5>Suporte em todos dispositivos</h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in
                                nisi commodo, tempus odio a, vestibulum nibh.</p>
                        </div>
                        <div class="col-md-6 box">
                            <div class="icon-box box-danger">
                                <div class="icon-box-inner">
                                    <span data-feather="external-link" width="35" height="35"></span>
                                </div>
                            </div>
                            <h5>Colabore com quem quiser</h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in
                                nisi commodo, tempus odio a, vestibulum nibh.</p>
                        </div>
                        <div class="col-md-6 box">
                            <div class="icon-box box-info">
                                <div class="icon-box-inner">
                                    <span data-feather="clock" width="35" height="35"></span>
                                </div>
                            </div>
                            <h5>Disponível a qualquer momento</h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in
                                nisi commodo, tempus odio a, vestibulum nibh.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--faq section-->
    <section class="py-7" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <h2>Frequently asked questions</h2>
                    <p class="text-muted lead">Answers to most common questions.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <h6>Can I try it for free?</h6>
                            <p class="text-muted">Nam liber tempor cum soluta nobis eleifend option congue nihil imper
                                per tem por legere me doming.</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <h6>Do you have hidden fees?</h6>
                            <p class="text-muted">Nam liber tempor cum soluta nobis eleifend option congue nihil imper
                                per tem por legere me doming.</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <h6>What are the payment methods you accept?</h6>
                            <p class="text-muted">Nam liber tempor cum soluta nobis eleifend option congue nihil imper
                                per tem por legere me doming.</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <h6>How often do you release updates?</h6>
                            <p class="text-muted">Nam liber tempor cum soluta nobis eleifend option congue nihil imper
                                per tem por legere me doming.</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <h6>What is your refund policy?</h6>
                            <p class="text-muted">Nam liber tempor cum soluta nobis eleifend option congue nihil imper
                                per tem por legere me doming.</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <h6>How can I contact you?</h6>
                            <p class="text-muted">Nam liber tempor cum soluta nobis eleifend option congue nihil imper
                                per tem por legere me doming.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mx-auto text-center">
                    <h5 class="mb-4">Tem dúvidas?</h5>
                    <a href="#" class="btn btn-primary">Contacte-nos</a>
                </div>
            </div>
        </div>
    </section>


    <!--footer-->
    <?php include_once './footer.php'; ?>

    <!--scroll to top-->
    <div class="scroll-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

    <div class="switcher-wrap">
        <div class="switcher-trigger">
            <span class="fa fa-gear"></span>
        </div>
        <div class="color-switcher">
            <h6>Troca de cores</h6>
            <ul class="mt-3 clearfix">
                <li class="bg-teal active" data-color="default" title="Default Teal"></li>
                <li class="bg-purple" data-color="purple" title="Purple"></li>
                <li class="bg-blue" data-color="blue" title="Blue"></li>
                <li class="bg-red" data-color="red" title="Red"></li>
                <li class="bg-green" data-color="green" title="Green"></li>
                <li class="bg-indigo" data-color="indigo" title="Indigo"></li>
                <li class="bg-orange" data-color="orange" title="Orange"></li>
                <li class="bg-cyan" data-color="cyan" title="Cyan"></li>
                <li class="bg-yellow" data-color="yellow" title="Yellow"></li>
                <li class="bg-pink" data-color="pink" title="Pink"></li>
            </ul>
            <p>Escolha uma cor e veja o resultado.</p>
        </div>
    </div>

    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS 
-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.3/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="../scripts/custom/scriptTelaInicial.js"></script>

</body>

</html>