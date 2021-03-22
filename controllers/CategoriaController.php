<?php

/**
 * @package Produtos-MVC+POO  
 * @author Gabriel Alves Reis
 * @param bool
 *  
 * Camada - Controllers
 * Diretório Pai - controllers
 * Arquivo - CategoriaController.php
 */

require_once 'models/CategoriaModel.php';

class CategoriaController extends db_Class
{
    /**
     * @package Produtos-MVC+POO 
     * @author Gabriel Alves Reis
     *  
     * Camada - Controllers
     * Diretório Pai - controllers
     * Arquivo - ProdutoController.php
     */
    public function loadById($id)
    {
        $sql_query = "SELECT * FROM `tbCategoria` WHERE `tbCategoria`.`idTbCategoria`  = $id;";
        $CategoriaModel = new CategoriaModel();
        $link = $this->conecta_mysql();

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        $Categoria = $data->fetch_object();
        $CategoriaModel->setId($Categoria->idTbCategoria);
        $CategoriaModel->setNome($Categoria->Nome);

        return $CategoriaModel;
    }

    public function listarCategoriasAction()
    {
        $link = $this->conecta_mysql();
        $sql_query = "SELECT * FROM `tbCategoria` ORDER BY `tbCategoria`.`Nome` ASC;";

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        $v_Categoria = array();
        while ($categoria = $data->fetch_object()) {
            $CategoriaModel = new CategoriaModel();
            $CategoriaModel->setId($categoria->idTbCategoria);
            $CategoriaModel->setNome($categoria->Nome);
            array_push($v_Categoria, $CategoriaModel);
        }

        $View = new View('views/listarCategorias.php');
        $View->setParams(array('v_Categoria' => $v_Categoria));
        $View->showContents();
    }

    public function save($CategoriaModel)
    {
        /**
         * Checa se o id foi passado ou não,
         * assim define se a query é INSERT
         * ou UPDATE
         */
        $nome = $CategoriaModel->getNome();
        $id = $CategoriaModel->getId();
        $link = $this->conecta_mysql();

        if (is_null($id))
            $sql_query = "INSERT INTO `tbCategoria`
                        (
                            `Nome`
                        )
                        VALUES
                        (
                            '$nome'
                        );";
        else
            $sql_query = "UPDATE
                            `tbCategoria`
                        SET
                            Nome = '$nome'
                        WHERE
                        idTbCategoria = $id";
        try {
            mysqli_query($link, $sql_query);
            return true;
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }
    }

    public function cadastraCategoriaAction()
    {
        $CategoriaModel = new CategoriaModel();


        if (isset($_REQUEST['id']))

            if ($_REQUEST['id'])

                $CategoriaModel = $this->loadById($_REQUEST['id']);

        /**
         * Esse if confere se a requisição é POST
         * os dados só são persistidos quando enviados
         * por método POST
         */
        if (count($_POST) > 0) {
            $CategoriaModel->setNome($_POST['nome']);

            if ($this->save($CategoriaModel) > 0)
                Application::redirect('viewController.php?controle=Categoria&acao=listarCategorias');
        }


        $View = new View('views/cadastraCategoria.php');
        $View->setParams(array('Categoria' => $CategoriaModel));
        $View->showContents();
    }

    public function apagarCategoriaAction()
    {
        if ($_GET['id']) {
            $CategoriaModel = new CategoriaModel();
            $CategoriaModel = $this->loadById($_GET['id']);
            $id = $CategoriaModel->getId();
            $link = $this->conecta_mysql();

            if (!is_null($id)) {
                $sql_query = "DELETE FROM `tbCategoria` WHERE `tbCategoria`.`idTbCategoria ` = $id";
                try {
                    mysqli_query($link, $sql_query);
                } catch (mysqli_sql_exception $e) {
                    if ($e->getCode() === 1451) {
                        $menssagem = "A categoria " . $CategoriaModel->getNome() .
                            " não pode ser excluida porque ela está atribuida a algum produto";
                        Application::redirect("ErroPage.php?menssagem=" . $menssagem);
                        die();
                    } else {
                        die($e->getMessage());
                    }
                }
            }
            Application::redirect('viewController.php?controle=Categoria&acao=listarcategorias');
        }
    }
}
