<?php
	include_once '../topo.php';
	include_once 'AdmDao.php';
	include_once './Adm.php';

	$objadm = New adm();
	$objadmdao = New AdmDao();

	$objadm->nome = $_GET['nome'];
	$objadm->email = $_GET['email'];
	$objadm->senha = $_GET['senha'];

	var_dump($objadm);
	$retorno = $objadmdao->inserir($objadm);

	if($retorno)
		echo "Registrado";
	else {
		
	echo "Sin Registro"; 
		
}
?>
<?php
include_once '../rodape.php';
?>