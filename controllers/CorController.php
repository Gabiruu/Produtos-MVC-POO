<?php

/**
 * @package Produtos-MVC+POO  
 * @author Gabriel Alves Reis
 *
 * Camada - Controller
 * Diretório Pai - controllers
 * Arquivo - CorController.php
 */

require_once 'models/CorModel.php';

class CorController extends db_Class
{
    public function loadById($id)
    {
        $sql_query = "SELECT * FROM `tbcor` WHERE `tbcor`.`idTbCor` = $id;";
        $CorModel = new CorModel();
        $link = $this->conecta_mysql();

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        $cor = $data->fetch_object();
        $CorModel->setId($cor->idTbCor);
        $CorModel->setNome($cor->Nome);

        return $CorModel;
    }

    public function listarCoresAction()
    {
        $sql_query = "SELECT * FROM `tbcor` ORDER BY `tbcor`.`Nome` ASC;";
        $link = $this->conecta_mysql();

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        $v_cores = array();
        while ($cor = $data->fetch_object()) {
            $CorModel = new CorModel();
            $CorModel->setId($cor->idTbCor);
            $CorModel->setNome($cor->Nome);
            array_push($v_cores, $CorModel);
        }

        $View = new View('views/listarCores.php');
        $View->setParams(array('v_cores' => $v_cores));
        $View->showContents();
    }

    public function save($CorModel)
    {
        /**
         * Checa se o id foi passado ou não,
         * assim define se a query é um INSERT
         * ou um UPDATE
         */
        $nome = $CorModel->getNome();
        $id = $CorModel->getId();
        $link = $this->conecta_mysql();

        if (is_null($id))
            $sql_query = "INSERT INTO `tbcor`
                        (
                            `Nome`
                        )
                        VALUES
                        (
                            '$nome'
                        );";
        else
            $sql_query = "UPDATE
                            `tbcor`
                        SET
                            `Nome` = '$nome'
                        WHERE
                        `idTbCor` = $id";
        try {
            mysqli_query($link, $sql_query);
            return true;
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }
    }

    public function cadastraCorAction()
    {
        $CorModel = new CorModel();

        if (isset($_REQUEST['id'])) {
            if ($_REQUEST['id'])
                $CorModel = $this->loadById($_REQUEST['id']);
        }
        /**
         * Esse if confere se a requisição é POST
         * os dados só são persistidos quando enviados por POST
         */
        if (count($_POST) > 0) {
            $CorModel->setNome($_POST['nome']);

            if ($this->save($CorModel)) {
                Application::redirect('viewController.php?controle=Cor&acao=listarCores');
            }
        }

        $View = new View('views/cadastraCor.php');
        $View->setParams(array('CorModel' => $CorModel));
        $View->showContents();
    }

    public function apagarCorAction()
    {
        if ($_GET['id']) {
            $CorModel = new CorModel();
            $CorModel = $this->loadById($_GET['id']);
            $id = $CorModel->getId();
            $link = $this->conecta_mysql();

            if (!is_null($id)) {

                $sql_query = "DELETE FROM `tbcor` WHERE `tbcor`.`idTbCor` = $id";
                try {
                    mysqli_query($link, $sql_query);
                } catch (mysqli_sql_exception $e) {
                    if ($e->getCode() === 1451) {
                        $menssagem = "A cor " . $CorModel->getNome() .
                            " não pode ser excluida porque ela está atribuida a algum produto";
                        Application::redirect("ErroPage.php?menssagem=" . $menssagem);
                        die();
                    } else {
                        $menssagem = "Houve um erro contate o administrador do sistema";
                        Application::redirect("ErroPage.php?menssagem=" . $menssagem);
                        die();
                    }
                }
            }
            Application::redirect('viewController.php?controle=Cor&acao=listarCores');
        }
    }
}
