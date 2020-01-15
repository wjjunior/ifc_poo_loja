<script>
    $(document).ready(function() {
        $('.money').mask("###0.00", {
            reverse: true
        });
    });
    const toBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });
    };

    const uploadFile = async (files) => {
        document.getElementById('foto').value = await toBase64(files[0]);
        document.getElementById('img-foto').src = await toBase64(files[0]);
    }
</script>
<div class="container py-5">
    <?php $categories = $dados['categories']; ?>
    <?php $product = $dados['products'][0]; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">
                <!-- form new category -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Edit <?= $product->getNome(); ?></h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="index.php?product=gravaAtualizar">
                            <div class="align-middle">
                                <div class="align-middle">
                                    <div class="form-group align-middle">
                                        <label class="control-label col-sm-2" for="nome">Name:</label>
                                        <div class="col-sm-12">
                                            <input type="hidden" name="id" value="<?= $product->getId(); ?>">
                                            <input type="text" class="form-control" id="nome" placeholder="Product name" name="nome" value="<?= $product->getNome(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="descricao">Description:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="descricao" placeholder="Description" name="descricao" value="<?= $product->getDescricao(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="foto">Photo:</label>
                                        <div class="col-sm-12">
                                            <input type="file" id="image" name="image" onchange="uploadFile(this.files)">
                                            <input type="hidden" id="foto" name="foto" value="<?= $product->getFoto(); ?>">
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <img src="<?php echo ($product->getFoto() ? $product->getFoto() : './assets/images/noimage.png') ?>" class="list-img" alt="" id="img-foto">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="preco">Price:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control money" id="preco" placeholder="Price" name="preco" value="<?= $product->getPreco() * 100; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="categoria">Category:</label>
                                        <div class="col-sm-4">
                                            <select name="categoria" id="categoria" class="form-control">
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?php echo $category->getId(); ?>" <?php if ($product->getIdCategoria() == $category->getId()) echo 'selected' ?>><?php echo $category->getNome(); ?></option>
                                                <?php endforeach ?>
                                            </select>
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