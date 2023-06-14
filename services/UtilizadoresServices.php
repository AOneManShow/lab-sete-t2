<?php
//include_once './session/session.php';
require_once './repositories/UtilizadoresRepository.php';

class UtilizadoresServices {

    private $utilizadorRepository = NULL;

    public function __construct() {
        $this->utilizadorRepository = new UtilizadoresRepository();
    }
/*
    public function getAllClientes() {
        try {

            $res = $this->utilizadorRepository->selectAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
*/
    public function getUtilizador($id) {
        try {
            $res = $this->utilizadorRepository->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateSenha($id, $password){
        try {

            $res = $this->utilizadorRepository->actualizarSenha($id, $password);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateDados($id, $nome, $email, $username){
        try {

            $res = $this->utilizadorRepository->actualizar($id, $nome, $email, $username);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function criarNovoUtilizador($nome, $email, $username, $password) {
        try {

            $res = $this->utilizadorRepository->inserir($nome, $email, $username, $password);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deletarUtilizador($id) {
        try {
            $res = $this->utilizadorRepository->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function logar($email, $userN, $passwd){
        try {
            $res = $this->utilizadorRepository->login($email, $userN, $passwd);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
