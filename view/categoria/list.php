<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>POO II</title>
    </head>
    <body>
        <div class="container">
            <h2>Lista de Categorias</h2>
            <a class="btn btn-default" href="index.php?acao=add">Nova categoria</a>
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
                    <?php  $categorias = $dados['categorias']; ?>
                    <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?php echo $categoria->getid(); ?></td>
                        <td><a href="index.php?acao=view&id=<?php echo $categoria->getid(); ?>"><?= $categoria->getNome(); ?></a></td>
                        <td><?php echo $categoria->getDescricao(); ?></td>
                        <td>
                            <a href="index.php?acao=edit&id=<?= $categoria->getid(); ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-edit"></span> edita
                            </a>
                            <a href="index.php?acao=delete&id=<?= $categoria->getid(); ?>" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> deleta
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </body>
</html>