 <?php
 include_once '../topo.php';
    include'Pedido.php';
	include'PedidoDao.php';
    if($_GET){
		
		$id = $_GET['id'];
	
		$objpedido = New Pedido();
		$objpedido->id = $id;
		
		$obj = new PedidoDao();
		$obj->excluir($objpedido);
		if($obj->excluir($objpedido) == TRUE){
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