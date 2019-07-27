<?php
include_once "../topo.php";
?>
<div class="ajuste">
			<div class='menu_lateral'>
				<ul>
					<li><a href="#">Administrador</a>
						<ul style="margin-left: -15px;">
							<li><a href="adm/registro.php">Registro</a></li>
							<li><a href="adm/listar.php">Listar</a></li>
							<li><a href="adm/editar.php">Editar</a></li>
							<li><a href="adm/excluir.php">Excluir</a></li>
						</ul>
					</li>
					
					<li><a href="#">Categoria</a>
						<ul  style="margin-left: -15px;">
							<li><a href="categoria/registro.php">Registro</a></li>
							<li><a href="categoria/listar.php">Listar</a></li>
							<li><a href="categoria/editar.php">Editar</a></li>
							<li><a href="categoria/excluir.php">Excluir</a></li>
						</ul>
					</li>
					
					<li><a href="#">Cliente</a>
						<ul  style="margin-left: -15px;">
							<li><a href="cliente/registro.php">Registro</a></li>
							<li><a href="cliente/listar.php">Listar</a></li>
							<li><a href="cliente/editar.php">Editar</a></li>
							<li><a href="cliente/excluir.php">Excluir</a></li>
						</ul>
					</li>
					<li><a href="#">Pedido</a>
						<ul  style="margin-left: -15px;">
							<li><a href="pedido/registro.php">Registro</a></li>
							<li><a href="pedido/ListarAdm.php">Listar</a></li>
							<li><a href="pedido/EditarAdm.php">Editar</a></li>
							<li><a href="pedido/ExcluirAdm.php">Excluir</a></li>
						</ul>
					</li>
					
					<li><a href="#">Producto</a>
						<ul  style="margin-left: -15px;     margin-top: 18px;">
							<li><a href="/registro.php">Registro</a></li>
							<li><a href="/listar.php">Listar</a></li>
							<li><a href="/editar.php">Editar</a></li>
							<li><a href="/excluir.php">Excluir</a></li>
						</ul>
					</li>
				</ul>
			</div>	
		</div>
	

	<?php

		include_once './Produto.php';
		include_once 'ProdutoDao.php';
		
		$c = new ProdutoDao();
			$listr = $c->listar();

			//var_dump($listr);
			echo "<div class='centro'>
			<h3>Lista de Produtos</h3>";
			
			foreach ($listr as $value) {
			   echo $value["id"] . " - "  . $value["nombre"] ;
			   echo "<a href=editar.php?id=".$value['id'].">Editar</a>";
			   echo "<a href=excluir.php?id=".$value['id'].">Excluir</a>";
			   echo "<br>";
			
			}
		
		if (isset($_POST['buscar'])) {
			
			$produto = $_POST['buscar'];

			$listar = buscar($produto);
			echo " <table border='2'>
				  <thead>
				   <tr>
					  <th>nombre</th>
					  <th></th>
				   </tr>
				 </thead>
				 <tbody> ";


			foreach ($listar as $categoria) {
				echo'<tr>';
				echo'<td>' . $categoria['nombre'] . '</td>';
				//echo'<td><a href=editar.php?id=' . $categoria['id'] . '>Editar</a></td>';
			   
				echo'</tr>';
			}
		}
		
	echo "</div>";
	
include_once '../rodape.php';
?>