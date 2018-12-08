<div class="container">
    <?php $categoria = $dados['categorias'][0]; ?>
    <form class="form-horizontal" method="post" action="index.php?acao=gravaAtualizar">
        <h2 class="text-center">Edita Categoria - <?= $categoria->getNome(); ?></h2>
        <br><br> 
        <div class="align-middle">
            <div class="align-middle">
                <div class="form-group align-middle">
                    <label class="control-label col-sm-2" for="nome">Categoria:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nome" placeholder="Categoria" name="nome" value="<?= $categoria->getNome(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="descricao">Descrição:</label>
                    <div class="col-sm-6"> 
                        <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao" value="<?= $categoria->getDescricao(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>