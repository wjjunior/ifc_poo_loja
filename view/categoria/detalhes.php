<?php $categoria = $dados['categorias'][0]; ?>
<div class="container">
    <h2 class="text-center">Detalhe de Categoria</h2><br><br>       
    <table class="table">
        <thead>
            <tr>
                <th>ID do Produto</th>
                <th>Nome do Produto</th>
                <th>Descrição do Produto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $categoria->getId(); ?></td>
                <td><?= $categoria->getNome(); ?></td>
                <td><?= $categoria->getDescricao(); ?></td>
            </tr>
        </tbody>
    </table>
</div>