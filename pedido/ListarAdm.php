<?php
include_once '../topo.php';
?>




<?php

    include_once './Pedido.php';
	include_once 'PedidoDao.php';
	
	$c = new PedidoDao();
        $listr = $c->listar();

		//var_dump($listr);
		echo "<div class='centro'>
			<h3>Lista de Pedidos</h3>";
        
        foreach ($listr as $value) {
           echo $value["id"]. " - "  . $value["fecha"]. " - "  . $value["hora"] . " - "  . $value["fechaentrega"]. " - "  . $value["horaentrega"]. " - "  . $value["direccion"]. " - "  . $value["valortotal"]. " - "  . $value["estado"]. " - "  . $value["idcliente"]. " - "  . $value["idproduto"]. " - "  . $value["cantidad"]. " - "  . $value["observacion"] ;
		   echo "<a href=EditarAdm.php?id=".$value['id'].">Editar</a>";
		   echo "<a href=ExcluirAdm.php?id=".$value['id'].">Excluir</a>";
		   echo "<br>";
        
		}
    
	if (isset($_POST['buscar'])) {
		
		$pedido = $_POST['buscar'];

		$listar = buscar($pedido);
		echo " <table border='2'>
			  <thead>
			   <tr>
					<th>fecha</th>
					<th>hora</th>
				  <th>fechaentrega</th>
				  <th>horaentrega</th>
				  <th>direccion</th>
				  <th>valortotal</th>
				  <th>estado</th>
				  <th>idcliente</th>
				  <th>idproduto</th>
				  <th>cantidad</th>
				  <th>observacion</th>
				  <th></th>
			   </tr>
			 </thead>
			 <tbody> ";


		foreach ($listar as $produto) {
			echo'<tr>';
			echo'<td>' . $produto['nombre'] . '</td>';
			//echo'<td><a href=editar.php?id=' . $categoria['id'] . '>Editar</a></td>';
		   
			echo'</tr>';
		}
	}
?>

<?php
include_once '../rodape.php';
?>