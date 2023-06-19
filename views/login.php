<?php
include './constantes/constantes.php';
if( session_status() !== PHP_SESSION_ACTIVE ){
    session_name("Gestor_Tarefas");
    session_start();
}
if( isset($_SESSION['username']) ){
    header("Location: " . $GLOBALS['nomeDoProjecto'] . '/index.php?op=gestor_tarefas');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tela Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $GLOBALS['nomeDoProjecto'] . '/content/css/custom/estiloLoginCadastro.css' ?>">
</head>

<body class="bg-verde-caraiba">
    <section class="vh-100 gradient-custom">
        <div class="container py-auto h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-header">
                            <a class="text-decoration-none text-start" href="index.php"><i class="fa fa-home text-light"></i> Home
                            </a>
                        </div>
                        <div class="card-body p-2 ps-5 pe-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form method="post">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Insira os seus dados para ter acesso a todas
                                        funcionalidades!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="username" name="username"
                                            class="form-control form-control-lg"
                                            placeholder="Email ou nome de utilizador" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg" placeholder="Senha" required />
                                    </div>

                                    <button class="btn btn-success btn-lg px-5" type="submit">Login</button>
                                    <input type="hidden" name="form-logged" value="1" />

                                    <br><br>
                                    <span class="text-white mb-5">Não tem uma conta ainda?
                                        Cadastre-se <a href="index.php?op=registar">aqui</a>.</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>