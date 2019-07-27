<?php
include_once '../topo.php';
include_once 'ClienteDao.php';
include_once './Cliente.php';

	$objcliente = New Cliente();
	$objclientedao = New ClienteDao();

	$objcliente->id = $_GET['id'];
	$objcliente->ci = $_GET['ci'];
	$objcliente->nombre = $_GET['nombre'];
	$objcliente->direccion = $_GET['direccion'];
	$objcliente->telefono = $_GET['telefono'];
	$objcliente->email = $_GET['email'];
	$objcliente->senha = $_GET['senha'];

	var_dump($objcliente);
	$retorno = $objclientedao->editar($objcliente);

	if($retorno)
		echo "Editado";
	else {
		
	echo "No editado"; 
		
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