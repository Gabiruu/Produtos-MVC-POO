<!DOCTYPE html>

<?php
$v_params = $this->getParams();
$CorModel = $v_params["CorModel"];
?>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "menu.php"; ?>

    <h1 align="center">Cadastra Cor</h1>
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
                        <input type='text' name='nome' value='<?php echo $CorModel->getNome(); ?>'>
                    </td>

                    <td align="center">
                        <a href='viewController.php?controle=Cor&acao=listarCores'>Cancelar</a>
                    </td>
                    <td align="center">
                        <input type='hidden' name='controle' value='Cor'>
                        <input type='hidden' name='acao' value='cadastraCor'>
                        <input type='hidden' name='id' value='<?php echo $CorModel->getId(); ?>'>
                        <button type='submit'>Salvar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>