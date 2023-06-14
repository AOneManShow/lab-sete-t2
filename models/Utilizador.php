<?php

class Utilizador{
    protected $id;
    protected $nomeCompleto;
    protected $email;
    protected $username;
    protected $password;
    
    public function __construct($id, $nome, $email, $username, $password) {
        $this->id = $id;
        $this->nomeCompleto = $nome;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }
    
    public function verificarLogin($email, $username, $password){

    }

    public function getId() {
        return $this->id;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function setNomeCompleto($nome): void {
        $this->nomeCompleto = $nome;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }
}