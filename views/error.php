<?php
include_once './constantes/constantes.php';
?>

<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>404 Page</title>

    <!--Inter UI font-->
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">
    <!--vendors styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS / Color Scheme -->
    <link rel="stylesheet" href="<?= $GLOBALS['nomeDoProjecto'] . '/views/css/indigo.css'; ?>" id="theme-color">
</head>

<body>
    <!--navigation-->
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
            </nav>
        </div>
    </section>

    <!--hero header-->
    <section class="py-7 py-md-0 bg-hero" id="home">
        <div class="container">
            <div class="row vh-md-100">
                <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">
                    <h1 class="heading-black text-capitalize">Erro 404</h1>
                    <h3 class="heading-black text-capitalize">404 - Não conseguimos encontrar essa página.</h3>
                    <p class="lead py-3">Talvez encontre o que procura aqui?</p>
                    <a href="<?= $GLOBALS['nomeDoProjecto'] . '/index.php'; ?>">
                        <button class="btn btn-primary d-inline-flex flex-row align-items-center">
                            Home
                        </button>
                    </a>
                    <a href="#">
                        <button class="btn btn-primary d-inline-flex flex-row align-items-center">
                            Suporte
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--faq section-->
    <section class="py-7 bg-dark" id="faq">
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
    <footer class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 mr-auto">
                    <h5>Sobre o GesTask</h5>
                    <p class="text-muted">Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore.
                        Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam explabo.</p>
                    <ul class="list-inline social social-sm">
                        <li class="list-inline-item">
                            <a href=""><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href=""><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href=""><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href=""><i class="fa fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacidade</a></li>
                        <li><a href="#">Termos</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Parceria</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Refer a friend</a></li>
                        <li><a href="#">Affiliates</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Ajuda</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Suporte</a></li>
                        <li><a href="#">Log in</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-muted text-center small-xl">
                    &copy; 2019 GesTask - Todos os direitos reservados
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>