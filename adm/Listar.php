<?php
include_once '../topo.php';




    include_once './Adm.php';
	include_once 'AdmDao.php';
	
	$c = new AdmDao();
        $listr = $c->listar();

		//var_dump($listr);
		echo "<div class='centro'>
			<h3>Lista de Administradores</h3>";
        
        foreach ($listr as $value) {
           echo $value["id"] . " - "  . $value["nome"] ;
		   echo "<a href=editar.php?id=".$value['id'].">Editar</a>";
		    echo "<a href=excluir.php?id=".$value['id'].">Excluir</a>";
		   echo "<br>";
        
		}
    
	if (isset($_POST['buscar'])) {
		
		$adm = $_POST['buscar'];

		$listar = buscar($adm);
		echo " <table border='2'>
			  <thead>
			   <tr>
				  <th>nome</th>
			   </tr>
			 </thead>
			 <tbody> ";


		foreach ($listar as $adm) {
			echo'<tr>';
			echo'<td>' . $adm['nome'] . '</td>';
			echo'<td><a href=editar.php?id=' . $adm['id'] . '>Editar</a></td>';
		   
			echo'</tr>';
		}
	}
	echo "</div>";
include_once '../rodape.php';
?>