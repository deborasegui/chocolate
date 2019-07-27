<?php
include_once '../topo.php';
include_once 'AdmDao.php';
include_once './Adm.php';

	$objadm = New Adm();
	$objadmdao = New AdmDao();

	$objadm->id = $_GET['id'];
	$objadm->nome = $_GET['nome'];
	$objadm->email = $_GET['email'];
	$objadm->senha = $_GET['senha'];

	var_dump($objadm);
	$retorno = $objadmdao->editar($objadm);

	if($retorno)
		echo "Cliente Registrado";
	else {
		
	echo "Sin Registro"; 
		
	}

	

?>
<?php
include_once '../rodape.php';
?>