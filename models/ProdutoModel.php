<?php

/**
 * @package Produtos-MVC+POO  
 * @author Gabriel Alves Reis 
 *  
 * Camada - Model.
 * Diretório Pai - models  
 * Arquivo - ProdutoModel.php
 **/

require_once "CategoriaModel.php";
require_once "CorModel.php";

class ProdutoModel
{
    private $id;
    private $nome;
    private $descricao;
    private $codCategoria;
    private $CodCor;

    /**
     * Setters e Getters da
     * classe ProdutoModel
     */

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setCodCategoria($codCategoria)
    {
        $this->codCategoria = $codCategoria;
        return $this;
    }

    public function getCodCategoria()
    {
        return $this->codCategoria;
    }

    public function setCodCor($CodCor)
    {
        $this->CodCor = $CodCor;
        return $this;
    }

    public function getCodCor()
    {
        return $this->CodCor;
    }
}
