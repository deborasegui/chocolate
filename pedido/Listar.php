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
           echo $value["id"] . " - "  . $value["fechaentrega"]. " - "  . $value["horaentrega"]. " - "  . $value["valortotal"]. " - "  . $value["cantidad"]. " - "  . $value["observacion"] ;
		  /* echo "<a href=editar.php?id=".$value['id'].">Editar</a>";
		   echo "<a href=excluir.php?id=".$value['id'].">Excluir</a>";*/
		   echo "<br>";
        
		}
    
	if (isset($_POST['buscar'])) {
		
		$pedido = $_POST['buscar'];

		$listar = buscar($pedido);
		echo " <table border='2'>
			  <thead>
			   <tr>
				  <th>fechaentrega</th>
				  <th>horaentrega</th>
				  <th>valortotal</th>
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