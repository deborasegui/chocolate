<?php
include_once '../topo.php';


    include_once './Categoria.php';
	include_once 'CategoriaDao.php';
	
	$c = new CategoriaDao();
        $listr = $c->listar();

		//var_dump($listr);
		echo "<div class='centro'>
			<h3>Lista de Categoria</h3>";
        
        foreach ($listr as $value) {
           echo $value["id"] . " - "  . $value["nombre"] ;
		   echo "<a href=editar.php?id=".$value['id'].">Editar</a>";
		   echo "<a href=excluir.php?id=".$value['id'].">Excluir</a>";
		   echo "<br>";
        
		}
    
	if (isset($_POST['buscar'])) {
		
		$categoria = $_POST['buscar'];

		$listar = buscar($categoria);
		echo " <table border='2'>
			  <thead>
			   <tr>
				  <th>nombre</th>
			   </tr>
			 </thead>
			 <tbody> ";


		foreach ($listar as $categoria) {
			echo'<tr>';
			echo'<td>' . $categoria['nombre'] . '</td>';
			echo'<td><a href=editar.php?id=' . $categoria['id'] . '>Editar</a></td>';
		   
			echo'</tr>';
		}
	}
	echo '</div>';

include_once '../rodape.php';
?>