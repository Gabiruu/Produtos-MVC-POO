<?php

/**
 * @package Produtos-MVC+POO 
 * @author Gabriel Alves Reis
 *  
 * Camada - Controllers
 * Diretório Pai - controllers
 * Arquivo - ProdutoController.php
 */

require_once 'models/ProdutoModel.php';
require_once 'models/CategoriaModel.php';
require_once 'models/CorModel.php';
require_once 'CategoriaController.php';
require_once 'CorController.php';

class ProdutoController extends db_Class
{
    public function loadById($id)
    {

        $sql_query = "SELECT * FROM `tbproduto` WHERE `tbproduto`.`idTbProduto`  = $id";
        $ProdutoModel = new ProdutoModel();
        $link = $this->conecta_mysql();

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }
        $Produto = $data->fetch_object();

        $CategoriaController = new CategoriaController();
        $CategoriaModel = new CategoriaModel();
        $CategoriaModel = $CategoriaController->loadById($Produto->CodTbCategoria);

        $CorController = new CorController();
        $CorModel = new CorModel();
        $CorModel = $CorController->loadById($Produto->CodTbCor);

        $ProdutoModel->setId($Produto->idTbProduto);
        $ProdutoModel->setNome($Produto->Nome);
        $ProdutoModel->setDescricao($Produto->Descricao);
        $ProdutoModel->setCodCategoria($CategoriaModel->getId());
        $ProdutoModel->setCodCor($CorModel->getId());

        return $ProdutoModel;
    }

    public function listarProdutosAction()
    {

        $sql_query = "SELECT * FROM `tbproduto` ORDER BY `tbproduto`.`nome` ASC;";

        $link = $this->conecta_mysql();
        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        $v_produtos = array();
        while ($produto_data = $data->fetch_object()) {
            $produto_model = new ProdutoModel();
            $produto_model->setId($produto_data->idTbProduto);
            $produto_model->setNome($produto_data->Nome);
            array_push($v_produtos, $produto_model);
        }

        $View = new View('views/listarProdutos.php');
        $View->setParams(array('v_produto' => $v_produtos));
        $View->showContents();
    }

    public function cadastraProdutoAction()
    {
        $ProdutoModel = new ProdutoModel();
        $CategoriaController = new CategoriaController();
        $CorController = new CorController();
        $corProduto = new CorModel();
        $categoriaProduto = new CategoriaModel();
        $v_categorias = array();
        $v_cores = array();
        $link = $this->conecta_mysql();

        if (isset($_REQUEST['id'])) {
            if ($_REQUEST['id']) {
                $ProdutoModel = $this->loadById($_REQUEST['id']);
                $categoriaProduto = $CategoriaController->loadById($ProdutoModel->getCodCategoria());
                $corProduto = $CorController->loadById($ProdutoModel->getCodCor());
            }
        }
        /**
         * Esse if confere se a requisição é POST
         * os dados só são persistidos quando enviados
         * por método POST
         */
        if (count($_POST) > 0) {
            $ProdutoModel->setNome($_POST['nome']);
            $ProdutoModel->setDescricao($_POST['descricao']);
            $ProdutoModel->setCodCor($_POST['cor']);
            $ProdutoModel->setCodCategoria($_POST['categoria']);

            if ($this->save($ProdutoModel))
                Application::redirect('viewController.php?controle=Produto&acao=listarProdutos');
        }

        /** 
         * Listando as cores cadastradas
         * */
        $sql_query = "SELECT * FROM `tbcor` ORDER BY `tbcor`.`Nome` ASC;";

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        while ($cor = $data->fetch_object()) {
            $CorModel = new CorModel();
            $CorModel->setId($cor->idTbCor);
            $CorModel->setNome($cor->Nome);
            array_push($v_cores, $CorModel);
        }

        /** 
         * Listando os categorias cadastrados
         * */
        $sql_query = "SELECT * FROM `tbcategoria` ORDER BY `tbcategoria`.`Nome` ASC;";

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        while ($categoria = $data->fetch_object()) {
            $CategoriaModel = new CategoriaModel();
            $CategoriaModel->setId($categoria->idTbCategoria);
            $CategoriaModel->setNome($categoria->Nome);
            array_push($v_categorias, $CategoriaModel);
        }

        $View = new View('views/cadastraProduto.php');
        $View->setParams(array(
            'produto' => $ProdutoModel,
            'v_categorias' => $v_categorias, 'v_cores' => $v_cores,
            'categoria' => $categoriaProduto, 'cor' => $corProduto
        ));

        $View->showContents();
    }

    public function novoProdutoAction()
    {

        /** 
         * Listando os categorias cadastrados
         * */
        $sql_query = "SELECT * FROM `tbcategoria` ORDER BY `tbcategoria`.`Nome` ASC;";
        $link = $this->conecta_mysql();

        try {
            $data = mysqli_query($link, $sql_query);
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }

        $v_categorias = array();
        while ($categoria = $data->fetch_object()) {
            $CategoriaModel = new CategoriaModel();
            $CategoriaModel->setId($categoria->idTbCategoria);
            $CategoriaModel->setNome($categoria->Nome);
            array_push($v_categorias, $CategoriaModel);
        }

        if ($v_categorias[0] === null) {
            $menssagem = "Antes de cadastrar um produto, cadastre antes uma categoria";
            Application::redirect("ErroPage.php?menssagem=" . $menssagem);
            die();
        }

        /** 
         * Listando as cores cadastradas
         * */
        $sql_query = "SELECT * FROM `tbcor` ORDER BY `tbcor`.`Nome` ASC;";

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

        if ($v_cores[0] === null) {
            $menssagem = "Antes de cadastrar um produto, cadastre antes uma cor";
            Application::redirect("ErroPage.php?menssagem=" . $menssagem);
            die();
        }
        $ProdutoModel = new ProdutoModel();

        $View = new View('views/cadastraProduto.php');
        $View->setParams(array('produto' => $ProdutoModel, 'v_categorias' => $v_categorias, 'v_cores' => $v_cores));
        $View->showContents();
    }


    public function save($ProdutoModel)
    {
        $link = $this->conecta_mysql();
        $id = $ProdutoModel->getId();
        $nome = $ProdutoModel->getNome();
        $descricao = $ProdutoModel->getDescricao();
        $CodCor = $ProdutoModel->getCodCor();
        $codCategoria = $ProdutoModel->getCodCategoria();

        if (is_null($id))
            $sql_query = "INSERT INTO `tbproduto`
                        (
                            `Nome`,
                            `Descricao`,
                            `CodTbCor`,
                            `CodTbCategoria`
                        )
                        VALUES
                        (
                            '$nome',
                            '$descricao',
                            $CodCor,
                            $codCategoria
                        );";
        else
            $sql_query = "UPDATE
                            `tbproduto`
                        SET
                            `Nome` = '$nome',
                            `Descricao` = '$descricao',
                            `CodTbCategoria` = $codCategoria,
                            `CodTbCor` = $CodCor
                        WHERE `idTbProduto` = $id";
        try {
            mysqli_query($link, $sql_query);
            return true;
        } catch (mysqli_sql_exception $e) {
            die($e->getMessage());
        }
    }

    public function apagarProdutoAction()
    {
        if ($_GET['id']) {
            $ProdutoModel = new ProdutoModel();
            $ProdutoModel = $this->loadById($_GET['id']);
            $id = $ProdutoModel->getId();
            $link = $this->conecta_mysql();
            if (!is_null($id)) {
                $sql_query = "DELETE FROM `tbproduto` WHERE `tbproduto`.`idTbProduto` = $id";
                try {
                    mysqli_query($link, $sql_query);
                } catch (mysqli_sql_exception $e) {
                    die($e->getMessage());
                }
            }
            Application::redirect('viewController.php?controle=Produto&acao=listarProdutos');
        }
    }
}
