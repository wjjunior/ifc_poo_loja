<style>
	.align-middle { margin-left:10vmin; margin-top:1vmin; }	
</style>
	<div class="container">
		<form class="form-horizontal" action="ProdutosController/cad_produtos.php">
			<h2 class="text-center">Cadastrar Produto</h2>
			<br><br> 
			<div class="align-middle">
				<div class="align-middle">
					<div class="form-group align-middle">
						<label class="control-label col-sm-2" for="email">Nome:</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nome" placeholder="Nome do Produto" name="nome">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Descrição:</label>
						<div class="col-sm-6"> 
							<input type="text" class="form-control" id="descricao" placeholder="Descrição do Produto" name="descricao">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
<main>
