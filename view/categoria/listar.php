<script>
    $(document).ready(function() {
        $(".delete").click(function() {
            if (window.confirm("Deseja excluir a categoria?")) {
                window.location = "index.php?acao=excluir&id=" + this.dataset.value;
            }
        });
    });
</script>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage Categories</h2>
                </div>
                <div class="col-sm-6">
                    <a href="index.php?acao=incluir" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Category</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $categorias = $dados['categorias']; ?>
                <?php foreach ($categorias as $categoria) : ?>
                    <tr>
                        <td><?php echo $categoria->getId(); ?></td>
                        <td><a href="index.php?acao=detalhes&id=<?php echo $categoria->getId(); ?>"><?= $categoria->getNome(); ?></a></td>
                        <td><?php echo $categoria->getDescricao(); ?></td>
                        <td>
                            <a href="index.php?acao=atualizar&id=<?= $categoria->getId(); ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#" class="delete" data-value="<?= $categoria->getId() ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>