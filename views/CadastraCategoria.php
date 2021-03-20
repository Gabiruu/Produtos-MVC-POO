<!DOCTYPE html>

<?php
$v_params = $this->getParams();
$categoria = $v_params["Categoria"];
?>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "menu.php"; ?>

    <h1 align="center">Cadastra Categoria</h1>
    <div align="center">
        <form method='POST'>
            <table width="300" border="1">
                <tr>
                    <th>
                        Nome
                    </th>

                    <th colspan="2">
                        Ações
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type='text' name='nome' value='<?php echo $categoria->getNome(); ?>'>
                    </td>

                    <td align="center">
                        <a href='viewController.php?controle=Categoria&acao=listarCategorias'>Cancelar</a>
                    </td>
                    <td align="center">
                        <input type='hidden' name='controle' value='Categoria'>
                        <input type='hidden' name='acao' value='cadastraCategoria'>
                        <input type='hidden' name='id' value='<?php echo $categoria->getId(); ?>'>
                        <button type='submit'>Salvar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>