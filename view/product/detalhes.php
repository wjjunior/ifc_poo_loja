<?php $product = $dados['products'][0]; ?>
<div class="container">
    <h2 class="text-center">Product Details</h2><br><br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $product->getId(); ?></td>
                <td><?= $product->getNome(); ?></td>
                <td><?= $product->getDescricao(); ?></td>
                <td><img src="<?php echo $product->getFoto(); ?>" class="list-img" alt=""></td>
                <td><?php echo $product->getPreco(); ?></td>
                <td><?php echo $product->getIdCategoria(); ?></td>
            </tr>
        </tbody>
    </table>
    <div class="row" style="float:right">
        <button type="button" class="btn btn-danger btn-form" onclick="history.back()">Back</button>
    </div>
</div>