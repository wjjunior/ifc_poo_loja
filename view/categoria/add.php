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
            <form class="form-horizontal" method="post" action="index.php?acao=add">
                <h2 class="text-center">Cadastrar Categoria</h2>
                <br><br> 
                <div class="align-middle">
                    <div class="align-middle">
                        <div class="form-group align-middle">
                            <label class="control-label col-sm-2" for="nome">Categoria:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nome" placeholder="Categoria" name="nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="descricao">Descrição:</label>
                            <div class="col-sm-6"> 
                                <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao">
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
    </body>
</html>