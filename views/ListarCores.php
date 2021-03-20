<html>
    <?php include "head.php"; ?>

<!DOCTYPE html>

<?php
    $v_params = $this->getParams();
    $v_cores = $v_params['v_cores'];
?>

<html lang="en">

    <?php include "head.php"; ?>
<body>
    <?php include "menu.php"; ?>

    <h1 align="center" >Listar Cores</h1>
    <div align="center">
        <table width="80%" border="1">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Nome
                </th>
               
                <th colspan="3">
                    Ações
                </th>
            </tr>
            <?php
            foreach($v_cores AS $cor)
            {
                ?>
                <tr>
                    <td>
                        <?php echo $cor->getId()?>
                    </td>
                    <td>
                        <?php echo $cor->getNome()?>
                    </td>
                    <td align="center">
                        <a href='viewController.php?controle=Cor&acao=cadastraCor&id=<?php echo $cor->getId()?>'>Editar</a>
                    </td>
                    <td align="center">
                        <a href='viewController.php?controle=Cor&acao=apagarCor&id=<?php echo $cor->getId()?>'>Apagar</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br />
        <a href='viewController.php?controle=Cor&acao=CadastraCor'>NOVA COR</a>
    </div>
</body>
</html>