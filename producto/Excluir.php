 <?php
 include_once "../topo.php";
    include'Produto.php';
	include'ProdutoDao.php';
    if($_GET){
		
		$id = $_GET['id'];
	
		$objproduto = New Produto();
		$objproduto->id = $id;
		
		$obj = new ProdutoDao();
		$obj->excluir($objproduto);
		if($obj->excluir($objproduto) == TRUE){
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