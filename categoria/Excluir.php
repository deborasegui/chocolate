 <?php
 include_once '../topo.php';
    include'Categoria.php';
	include'CategoriaDao.php';
    if($_GET){
		
		$id = $_GET['id'];
	
		$objcategoria = New Categoria();
		$objcategoria->id = $id;
		
		$obj = new CategoriaDao();
		$obj->excluir($objcategoria);
		if($obj->excluir($objcategoria) == TRUE){
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