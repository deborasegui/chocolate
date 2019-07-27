<?php
include_once "../topo.php";
include_once 'ProdutoDao.php';
include_once 'Produto.php';

	$objproduto = New Produto();
	$objprodutodao = New ProdutoDao();

	$objproduto->id = $_GET['id'];
	$objproduto->idcategoria = $_GET['idcategoria'];
	$objproduto->nombre = $_GET['nombre'];
	$objproduto->descripcion = $_GET['descripcion'];
	$objproduto->tamano = $_GET['tamano'];
	$objproduto->imagen = $_GET['imagen'];
	$objproduto->precio = $_GET['precio'];
	
	
	//var_dump($objproduto);
	$retorno = $objprodutodao->editar($objproduto);

	if($retorno)
		echo "Producto Editado";
	else {
		
	echo "No edito"; 
		
	}

	

?>

<?php
	include_once "../rodape.php";
?>