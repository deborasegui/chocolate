<?php
include_once '../topo.php';
include_once 'PedidoDao.php';
include_once './Pedido.php';

	$objpedido = New Pedido();
	$objpedidodao = New PedidoDao();

	$objpedido->id = $_GET['id'];
	$objpedido->fechaentrega = $_GET['fechaentrega'];
	$objpedido->horaentrega = $_GET['horaentrega'];
	$objpedido->direccion = $_GET['direccion'];
	$objpedido->estado = $_GET['estado'];
	$objpedido->cantidad = $_GET['cantidad'];
	$objpedido->observacion = $_GET['observacion'];

	var_dump($objpedido);
	$retorno = $objpedidodao->editar($objpedido);

	if($retorno)
		echo "edito";
	else {
		
	echo "edito"; 
		
	}

	
/*if (isset($_POST['nombre'])) {
		$id = $_POST['id'];
		$ci = $_POST['ci'];
		$nombre = $_POST['nombre'];
		$nombre = $_POST['direccion'];
		$nombre = $_POST['telefono'];
		$nombre = $_POST['email'];
		$nombre = $_POST['nombre'];
		
		
		$debo->editar($nombre, $id);*/
		

   /* if ($debo == TRUE) {
        echo header('Location: Listar.php');
    } else {
        echo "Error";
    }*/
 
?>

<?php
include_once '../rodape.php';
?>