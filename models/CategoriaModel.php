<?php

/**
 * @package Produtos-MVC+POO  
 * @author Gabriel Alves Reis 
 *  
 *  
 * Camada - Model.
 * Diretório Pai - models  
 * Arquivo - CategoriaModel.php
 **/

class CategoriaModel
{
    private $id;
    private $nome;

    /**
     * Setters e Getters da
     * classe CategoriaModel
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
}
