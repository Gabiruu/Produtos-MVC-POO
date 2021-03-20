<!DOCTYPE html>
<?php include "head.php"; ?>
<?php
$v_params = $this->getParams();
$produto = $v_params["produto"];
if ($produto->getId() != null) {
    $codCategoria = $v_params["categoria"];
    $codCor = $v_params["cor"];
}
$v_categorias = $v_params["v_categorias"];
$v_cores = $v_params["v_cores"];
?>

<html lang="en">

<body>
    <?php include "menu.php"; ?>

    <h1 align="center">Cadastra Produto</h1>
    <div align="center">
        <form action="viewController.php" method='POST'>
            <table width="300" border="1">
                <tr>
                    <th>
                        Nome Produto
                    </th>
                    <th>
                        Descrição Produto
                    </th>
                    <th>
                        Cor Produto
                    </th>
                    <th>
                        Categoria Produto
                    </th>
                    <th colspan="2">
                        Ações
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type='text' name='nome' value='<?php echo $produto->getNome(); ?>'>
                    </td>
                    <td>
                        <input type='text' name='descricao' value='<?php echo $produto->getDescricao(); ?>'>
                    </td>
                    <td>
                        <select name="cor">
                            <?php
                            if ($produto->getId() !== null) {
                            ?>
                                <option value="<?php echo $codCor->getId() ?>"> <?php echo $codCor->getNome(); ?></option>
                            <?php
                            }
                            ?>

                            <?php
                            foreach ($v_cores as $cor) {
                                if ($cor->getId() !== $produto->getCodCor()) {
                            ?>
                                    <option value="<?php echo $cor->getId() ?>"><?php echo $cor->getNome(); ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="categoria">
                            <?php
                            if ($produto->getId() !== null) {
                            ?>
                                <option value="<?php echo $codCategoria->getId() ?>"><?php echo $codCategoria->getNome() ?></option>
                            <?php
                            }
                            ?>
                            <?php
                            foreach ($v_categorias as $categoria) {
                                if ($categoria->getId() !== $produto->getCodCategoria()) {
                            ?>
                                    <option value="<?php echo $categoria->getId() ?>"><?php echo $categoria->getNome() ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td align="center">
                        <a href='viewController.php?controle=Produto&acao=listarProdutos'>Cancelar</a>
                    </td>
                    <td align="center">
                        <input type='hidden' name='controle' value='Produto'>
                        <input type='hidden' name='acao' value='cadastraProduto'>
                        <input type='hidden' name='id' value='<?php echo $produto->getId(); ?>'>
                        <button type='submit'>Salvar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>