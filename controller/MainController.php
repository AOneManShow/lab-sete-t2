<?php
include_once './constantes/constantes.php';
require_once './services/UtilizadoresServices.php';
//require_once './services/OutdoorsServices.php';

class MainController {

    private $visitanteService = NULL;
//    private $outdoorService = NULL;

    public function __construct() {
        $this->visitanteService = new UtilizadoresServices();
//        $this->outdoorService = new OutdoorsServices();
    }

    public function redirect($location) {
        header('Location: ' . $location);
        //exit;
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'inicio') {
                $this->telaInicial();
            }/*
            else if ($op == 'list') {
                $this->listOutdoors();
            }*/
            else if ($op == 'registar') {
                $this->registarCliente();
            }/*
            else if ($op == 'about') {
                $this->telaAbout(); //método que traz a tela about no início
            }*/ else if ($op == 'gestor_tarefas') {
                $this->gestTask();
            } else if ($op == 'login') {
                $this->login();
            } else if ($op == 'loginsucesso') {
                $filterUser = filter_input(INPUT_GET, 'username');
                $userN = isset($filterUser) ? $filterUser : NULL;
                $this->loggado($userN);
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
/*
    public function telaInicial(){
        $this->redirect('view/inicio/tela-inicial.php');
    } 
 */
    //pesquisarOutdoors()
    //login()

    public function telaInicial(){
        $caminhoAbsoluto = /*$GLOBALS['nomeDoProjecto'].*/'views/tela-inicial.php';
        //$this->redirect('view/inicio/tela-inicial.php');
        $this->redirect($caminhoAbsoluto);
    }

    public function gestTask(){
        $caminhoAbsoluto = /*$GLOBALS['nomeDoProjecto'].*/'views/gestor-tarefas.php';
        //$this->redirect('view/inicio/tela-inicial.php');
        $this->redirect($caminhoAbsoluto);
    }
/*
    public function listOutdoors() {
        $outdoors = $this->outdoorsService->getAllOutdoors();
        include dirname(__DIR__, 1).'/view/outdoor-view/outdoors-list.php';
    }
*/
    public function loggado($userN){
        //redireciona para a página em que estava antes de logar mas agora com a sessão iniciada
        //$caminhoAbsoluto = $nomeDoProjecto.'view/inicio/about.php';
        session_start();
        $_SESSION['username'] = $userN;
        echo "<script>
                window.location.href = 'index.php?op=gestor_tarefas'
             </script>";
             //&username=".$userN."';
        //$this->redirect('view/inicio/tela-inicial.php');
        //$this->redirect($caminhoAbsoluto);
    }
    
    public function telaAbout(){
        include dirname(__DIR__, 1).'/view/inicio/about.php';
    }

    public function registarUtilizador() {
        $title = 'Adicionar novo Utilizador';

        $nome = '';
        $email = '';
        $username = '';
        $password = '';

        $errors = array();

        if (isset($_POST['form-submitted'])) {
            $nome = isset($_POST['nome']) ? filter_input(INPUT_POST, 'nome') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $username = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : NULL;
            $password = isset($_POST['password']) ? filter_input(INPUT_POST, 'password') : NULL;

            try {
                $this->visitanteService->criarNovoUtilizador($nome, $email, $username, $password);
                //$this->redirect('../view/admin-view/admin-home.php');
                $caminhoAbsoluto = $GLOBALS['nomeDoProjecto']./*$nomeDoProjecto.*/'.view/cliente-view/index.php?op=loginsucesso';//&user='.$username;
                
                //depois de se cadastrar, ele loga logo sozinho, mas ao invés de ir para a tela inicial again, vou tentar que ele vá para a tela em que estava antes do cadastro
                $this->redirect($caminhoAbsoluto);
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include dirname(__DIR__, 1).'/view/inicio/signup-form.php';
    }

    public function login(){
        //aqui em cima, pego da tela de login, o email, username e password
        $email = '';
        $userN = '';
        $passwd = '';
        $errors = array();
        //if (isset($_POST['btn-login'])) {
        if (isset($_POST['form-logged'])) {
            //o utilizador pode logar com o username ou o email, por isso o próprio email aqui recebe o conteúdo do campo username do form
            $email = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : NULL;
            $userN = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : NULL;
            $passwd = isset($_POST['password']) ? filter_input(INPUT_POST, 'password') : NULL;
//getByUsername() e pegaria o username e o perfil para passar no window location href
            try {
                if($this->visitanteService->logar($email, $userN, $passwd)){
                    echo "<script>
                            alert('ENTROUUUU!!!');
                         </script>";
                            //window.location.href = 'index.php?op=loginsucesso&username=".$userN."';
//mas ao invés de meter o username na url, que é perigoso, devo usar uma variavel de sessão para lhe guardar, a ele e ao perfil
//tipo assim: $_SESSION['username] = $userN; $_SESSION['perfil'] = $perfil. E assim estará no programa todo
                    $this->redirect('index.php?op=loginsucesso&username='.$userN);
                }
                else{
                    //throw new Exception('Ocorreu um erro ao realizar o login.');
                    echo "<script>
                            alert('LOG ERRADO!!!');
                            window.location.href = 'index.php?op=login';
                         </script>";
                }
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        include dirname(__DIR__, 1).'/view/login.php';
    }

    public function showError($title, $message) {
        include '../view/error.php';
    }
}


