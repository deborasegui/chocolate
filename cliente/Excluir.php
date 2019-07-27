 <?php
 include_once '../topo.php';
    include'Cliente.php';
	include'ClienteDao.php';
    if($_GET){
		
		$id = $_GET['id'];
	
		$objcliente = New Cliente();
		$objcliente->id = $id;
		
		$obj = new ClienteDao();
		$obj->excluir($objcliente);
		if($obj->excluir($objcliente) == TRUE){
			echo("deletado");
			}
		else{
			echo("Error");
		}
	}
 ?>
 
 <?php
include_once '../rodape.php';
?>