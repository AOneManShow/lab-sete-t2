<?php

class Tarefa{
    protected $idTarefa;
    protected $nome;
    protected $descricao;
    protected $dataInicio;
    protected $dataTermino;
    protected $fkUtilizador;
    protected $fkCategoria;
    protected $concluida;

    public function __construct($id, $nome, $descricao, $fkUtilizador, $fkCategoria, $dataInicio, $dataTermino, $concluida) {
        $this->idTarefa = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->dataInicio = $dataInicio;
        $this->dataTermino = $dataTermino;
        $this->fkUtilizador = $fkUtilizador;
        $this->fkCategoria = $fkCategoria;
        $this->concluida = $concluida;
    }

    public function getIdTarefa() {
        return $this->idTarefa;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataTermino() {
        return $this->dataTermino;
    }

    public function getFkUtilizador() {
        return $this->fkUtilizador;
    }

    public function getFkCategoria() {
        return $this->fkCategoria;
    }

    public function getConcluida() {
        return $this->concluida;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function setDataInicio($dataInicio): void {
        $this->dataInicio = $dataInicio;
    }

    public function setDataTermino($dataTermino): void {
        $this->dataTermino = $dataTermino;
    }
    public function setFkUtilizador($fkUtilizador): void {
        $this->fkUtilizador = $fkUtilizador;
    }
    public function setFkCategoria($fkCategoria): void {
        $this->fkCategoria = $fkCategoria;
    }

    public function setConcluida($concluida): void {
        $this->concluida = $concluida;
    }

}