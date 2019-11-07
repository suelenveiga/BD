<?php

class Curso{
    private $id;
    private $nome;
    private $area;
    private $cargaHoraria;
    private $dataFundacao;

    public function __construct($nome, $area, $cargaHoraria, $dataFundacao){
        $this->nome = $nome;
        $this->area = $area;
        $this->cargaHoraria = $cargaHoraria;
        $this->dataFundacao = $dataFundacao;

    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getcargaHoraria(){
        return $this->cargaHoraria;
    }
    public function getArea(){
        return $this->area;
    }
    public function getdataFundacao(){
        return $this->dataFundacao;
    }
    public function setArea($area){
        $this->area = $area;
    }
    public function setcargaHoraria($cargaHoraria){
        $this->cargaHoraria = $cargaHoraria;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setdataFundacao($dataFundacao){
        $this->dataFundacao = $dataFundacao;
    }
}



?>
