<?php
	include_once '../topo.php';
	include_once './PedidoDao.php';
	include_once './Pedido.php';

	$objpedido = New Pedido();
	$objpedidodao = New PedidoDao();
	
	$data = date("d/m/y");
	$min = date("H:i:s");
	$objpedido->fecha = $data;
	$objpedido->hora = $min;
	$objpedido->fechaentrega = $_GET['fechaentrega'];
	$objpedido->horaentrega = $_GET['horaentrega'];
	$objpedido->direccion = $_GET['direccion'];
	$objpedido->valortotal = "40";
	$objpedido->idcliente = "1";
	$objpedido->idproduto = $_GET['produto'];
	$objpedido->cantidad = $_GET['cantidad'];
	$objpedido->observacion = $_GET['observacion'];
	
	$retorno = $objpedidodao->debo($objpedido);
	
	if($retorno)
		echo "Registro";
	else {
		
	echo "Sin Registro"; 
    
	}
?>

<?php
include_once '../rodape.php';
?>