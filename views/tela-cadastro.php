<?php
include_once './constantes/constantes.php';
if( session_status() !== PHP_SESSION_ACTIVE ){
    session_name("Gestor_Tarefas");
    session_start();
}
if( isset($_SESSION['username']) ){
    echo "<script> alert('PRECISA FAZER LOGOUT ANTES DE REALIZAR ESSA OPERAÇÃO!!!'); </script>";
    header("Location: " . $GLOBALS['nomeDoProjecto'] . '/index.php?op=gestor_tarefas');
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tela Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $GLOBALS['nomeDoProjecto'] . '/content/css/custom/estiloLoginCadastro.css'; ?>">
</head>

<body class="bg-verde-caraiba">
    <section class="vh-100 gradient-custom">
        <div class="container py-auto h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white pb-1" style="border-radius: 1rem;">
                        <div class="card-header text-start">
                            <a class="text-decoration-none" href="index.php"><i class="fa fa-home text-light"></i> Home
                            </a>
                        </div>
                        <div class="card-body p-2 ps-5 pe-5 text-center">
                            <div class="mb-md-5 mt-md-4">
                                <form id="formulario-cadastro" method="post">
                                    <h2 class="fw-bold mb-2 text-uppercase">Cadastro</h2>
                                    <p class="text-white-50 mb-5">Insira os seus dados e torne-se parte da família GesTask!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="nomeCompleto" name="nomeCompleto"
                                            class="form-control form-control-lg" placeholder="Nome Completo" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                                            placeholder="Email" required />
                                        <span id="mensagemErroEmail" class="text-danger"></span>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="username" name="username"
                                            class="form-control form-control-lg" placeholder="Utilizador" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg" placeholder="Senha" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="passwordConfirm" name="passwordConfirm"
                                            class="form-control form-control-lg" placeholder="Confirme a senha"
                                            required />
                                        <span id="mensagemErroPass" class="text-danger"></span>
                                    </div>

                                    <button class="btn btn-success btn-lg px-5" type="submit">Cadastrar-se</button>
                                    <input type="hidden" name="form-submitted" value="1" />

                                    <br><br>
                                    <span class="text-white mb-5">Já tem uma conta no sistema?
                                        Entre <a href="index.php?op=login">aqui</a>.</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= $GLOBALS['nomeDoProjecto'] . '/scripts/custom/scriptValidacaoForm.js'; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>