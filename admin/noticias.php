<?php 
require "../includes/cabecalho-admin.php";
require "../includes/funcoes-noticias.php";

// Pegando ID e o tipo de usuario que esta logado na sessao
$idUsuario = $_SESSION['id'];
$tipoUsuario = $_SESSION['tipo'];

// Chamando a função e pegando o array com lista de noticias
$listaDeNoticias = lerNoticias($conexao, $idUsuario, $tipoUsuario);
?>
<pre><?=var_dump($listaDeNoticias)?></pre>

<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Notícias <span class="badge bg-dark">X</span>
		</h2>

		<p class="text-center mt-5">
			<a class="btn btn-primary" href="noticia-insere.php">
			<i class="bi bi-plus-circle"></i>	
			Inserir nova notícia</a>
		</p>
				
		<div class="table-responsive">
		
			<table class="table table-hover">
				<thead class="table-light">
					<tr>
                        <th>Título</th>
                        <th>Data</th>
                        <th>Autor</th>
						<th class="text-center">Operações</th>
					</tr>
				</thead>

				<tbody>

					<tr>
                        <td> Título da notícia... </td>
                        <td> 21/12/2112 21:12 </td>
                        <td> Autor da notícia... </td>
						<td class="text-center">
							<a class="btn btn-warning" 
							href="noticia-atualiza.php">
							<i class="bi bi-pencil"></i> Atualizar
							</a>
						
							<a class="btn btn-danger excluir" 
							href="noticia-exclui.php">
							<i class="bi bi-trash"></i> Excluir
							</a>
						</td>
					</tr>

				</tbody>                
			</table>
	</div>
		
	</article>
</div>


<?php 
require "../includes/rodape-admin.php";
?>

