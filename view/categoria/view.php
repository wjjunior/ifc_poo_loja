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
            <h2 class="text-center">Lista de Categoria</h2><br><br>       
            <table class="table">
                <thead>
                    <tr>
                        <th>ID do Produto</th>
                        <th>Nome do Produto</th>
                        <th>Descrição do Produto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $categorias = $dados['categorias']; ?>
                    <?php foreach ($categorias as $categoria) { ?>
                        <tr>
                            <td><?= $categoria['id']; ?></td>
                            <td><?= $categoria['nome']; ?></td>
                            <td><?= $categoria['descricao']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>