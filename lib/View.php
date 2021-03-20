<?php

/**
 * Essa classe é responsável por renderizar os arquivos HTML
 * 
 * @package Produtos-MVC+POO 
 * @author Gabriel Alves Reis
 * 
 * 
 * Diretório Pai - lib
 * Arquivo - View.php 
 */
class View
{
    private $contents;
    private $view;
    private $v_params;

    /**
     * É possivel efetuar a parametrização do objeto ao instanciar o mesmo,
     * $view é o nome do arquivo de visualização a ser usado e 
     * $v_params são os dados que devem ser utilizados pela camada de visualização
     */
    function __construct($view = null, $v_params = null)
    {
        if ($view != null)
            $this->setView($view);
        $this->v_params = $v_params;
    }

    /**
     * Setters e Getters da
     * classe CorModel
     */

    public function setView($view)
    {
        if (file_exists($view))
            $this->view = $view;
        else {
            $menssagem = "Arquivo da View '$view' não existe";
            Application::redirect("ErroPage.php?menssagem=" . $menssagem);
            die();
        }
    }

    public function getView()
    {
        return $this->view;
    }

    public function setParams(array $v_params)
    {
        $this->v_params = $v_params;
    }

    public function getParams()
    {
        return $this->v_params;
    }

    /**
     * Retorna uma string contendo todo 
     * o conteudo do arquivo
     */
    public function getContents()
    {
        ob_start();
        if (isset($this->view))
            require_once $this->view;
        $this->contents = ob_get_contents();
        ob_end_clean();
        return $this->contents;
    }

    /**
     * Imprime o arquivo de visualização 
     */
    public function showContents()
    {
        echo $this->getContents();
        exit;
    }
}
