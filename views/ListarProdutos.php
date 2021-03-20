<html>
<?php include "head.php"; ?>

<!DOCTYPE html>

<?php
$v_params = $this->getParams();
$v_produto = $v_params['v_produto'];
?>

<html lang="en">

<body>
    <?php include "menu.php"; ?>
    <h1 align="center">Listar Produtos</h1>
    <div align="center">
        <table width="80%" border="1">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Produto
                </th>

                <th colspan="3">
                    Ações
                </th>
            </tr>
            <?php
            foreach ($v_produto as $produto) {
            ?>
                <tr>
                    <td>
                        <?php echo $produto->getId() ?>
                    </td>
                    <td>
                        <?php echo $produto->getNome() ?>
                    </td>
                    <td align="center">
                        <a href='viewController.php?controle=Produto&acao=cadastraProduto&id=<?php echo $produto->getId() ?>'>Editar</a>
                    </td>
                    <td align="center">
                        <a href='viewController.php?controle=Produto&acao=apagarProduto&id=<?php echo $produto->getId() ?>'>Apagar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br />
        <a href='viewController.php?controle=Produto&acao=novoProduto'>NOVO PRODUTO</a>
    </div>
</body>

</html>