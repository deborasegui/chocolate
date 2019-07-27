<?php
include_once '../topo.php';
include './Categoria.php';
include './CategoriaDao.php';

	$objcategoria = new Categoria();
	$objcategoriadao = new  CategoriaDao();
	
	$objcategoria->id = $_GET['id'];
	$objcategoria->nombre = $_GET['nombre'];
	
	var_dump($objcategoria);
	$retorno = $objcategoriadao->editar($objcategoria);
	
	if($retorno)
		echo "edito";
	else {
		
	echo "edito"; 
		
	}
?>

<?php
include_once '../rodape.php';
?>