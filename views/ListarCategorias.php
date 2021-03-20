<html>
<?php include "head.php"; ?>

<!DOCTYPE html>

<?php
$v_params = $this->getParams();
$v_Categoria = $v_params['v_Categoria'];
?>

<html lang="en">

<body>
    <?php include "menu.php"; ?>
    <h1 align="center">Listar Categorias</h1>
    <div align="center">
        <table width="80%" border="1">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Categoria
                </th>

                <th colspan="3">
                    Ações
                </th>
            </tr>
            <?php
            foreach ($v_Categoria as $Categoria) {
            ?>
                <tr>
                    <td>
                        <?php echo $Categoria->getId() ?>
                    </td>
                    <td>
                        <?php echo $Categoria->getNome() ?>
                    </td>
                    <td align="center">
                        <a href='viewController.php?controle=Categoria&acao=cadastraCategoria&id=<?php echo $Categoria->getId() ?>'>Editar</a>
                    </td>
                    <td align="center">
                        <a href='viewController.php?controle=Categoria&acao=apagarCategoria&id=<?php echo $Categoria->getId() ?>'>Apagar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br />
        <a href='viewController.php?controle=Categoria&acao=cadastraCategoria'>NOVA CATEGORIA</a>
    </div>
</body>

</html>