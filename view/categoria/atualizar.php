<?php $categoria = $dados['categorias'][0]; ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">
                <!-- form edit category -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Edit <?= $categoria->getNome(); ?></h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="index.php?acao=gravaAtualizar">
                            <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
                            <div class="align-middle">
                                <div class="align-middle">
                                    <div class="form-group align-middle">
                                        <label class="control-label col-sm-2" for="nome">Name:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nome" placeholder="Category name" name="nome" value="<?= $categoria->getNome(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="descricao">Description:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="descricao" placeholder="Description" name="descricao" value="<?= $categoria->getDescricao(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-form">Save</button>
                                            <button type="button" class="btn btn-danger btn-form" onclick="history.back()">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>