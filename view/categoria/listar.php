<script>
    $(document).ready(function(){
        $(".btn-excluir").click(function(){
            if (window.confirm("Deseja excluir a categoria?")){
                window.location = "index.php?acao=excluir&id=" + this.dataset.value;
            }
        });
    });
</script>

<div class="container">
    <h2>Lista de Categorias</h2>
    <a class="btn btn-default" href="index.php?acao=incluir">Nova categoria</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $categorias = $dados['categorias']; ?>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?php echo $categoria->getId(); ?></td>
                <td><a href="index.php?acao=detalhes&id=<?php echo $categoria->getId(); ?>"><?= $categoria->getNome(); ?></a></td>
                <td><?php echo $categoria->getDescricao(); ?></td>
                <td>
                    <a href="index.php?acao=atualizar&id=<?= $categoria->getId(); ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit"></span> edita
                    </a>
                    <a href="#" data-value="<?= $categoria->getId() ?>" class="btn btn-danger btn-excluir">
                        <span class="glyphicon glyphicon-trash"></span> deleta
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
