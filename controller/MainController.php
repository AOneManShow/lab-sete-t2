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
                $this->registarUtilizador();
            }/*
            else if ($op == 'about') {
                $this->telaAbout(); //método que traz a tela about no início
            }*/ else if ($op == 'gestor_tarefas') {
                $this->gestTask();
            } else if ($op == 'login') {
                $this->login();
            }/* else if ($op == 'loginsucesso') {
                $filterUser = filter_input(INPUT_GET, 'username');
                $userN = isset($filterUser) ? $filterUser : NULL;
                $this->loggado($userN);
            }*/
             else {
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
            $nome = isset($_POST['nomeCompleto']) ? filter_input(INPUT_POST, 'nomeCompleto') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $username = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : NULL;
            $password = isset($_POST['password']) ? filter_input(INPUT_POST, 'password') : NULL;

            try {
                if($this->visitanteService->criarNovoUtilizador($nome, $email, $username, $password)){
                    //$this->redirect('../view/admin-view/admin-home.php');
                    echo "<script>
                            alert('REGISTADO COM SUCESSO. AGORA FAÇA O LOGIN.');
                            window.location.href = 'index.php?op=login';
                        </script>";
                    //$caminhoAbsoluto = $GLOBALS['nomeDoProjecto']./*$nomeDoProjecto.*/'/index.php?op=login';//&user='.$username;
                    
                    //depois de se cadastrar, ele loga logo sozinho, mas ao invés de ir para a tela inicial again, vou tentar que ele vá para a tela em que estava antes do cadastro
                    //$this->redirect($caminhoAbsoluto);
                    return;
                }
                else{
                    /*event.preventDefault();
                    window.location.href = 'index.php?op=registar';
                    */
                    echo "<script>
                            alert('JÁ EXISTE ESSE UTILIZADOR!!!');
                          </script>";
                }
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include dirname(__DIR__, 1).'/views/tela-cadastro.php';
    }

    public function login(){
        //para mudar a url, o redirect funciona, mas por algum motivo, não dá muito certo na estilização
        //$this->redirect('views/login.php');

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
                $utilizador = $this->visitanteService->logar($email, $userN, $passwd);
                if( isset($utilizador) && $utilizador !== false ){
                    echo "<script>
                            alert('ENTROUUUU!!!');
                         </script>";
                            //window.location.href = 'index.php?op=loginsucesso&username=".$userN."';
//mas ao invés de meter o username na url, que é perigoso, devo usar uma variavel de sessão para lhe guardar, a ele e ao perfil
//tipo assim: $_SESSION['username] = $userN; $_SESSION['perfil'] = $perfil. E assim estará no programa todo
                    session_name("Gestor_Tarefas");
                    session_start();
                    $_SESSION['username'] = $utilizador->getUsername();
                    $_SESSION['email'] = $utilizador->getEmail();
                    $_SESSION['nome'] = $utilizador->getNomeCompleto();
                    $this->redirect('index.php?op=gestor_tarefas');
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
        include dirname(__DIR__, 1).'/views/login.php';
    }

    public function showError($title, $message) {
        include './views/error.php';
    }
}


