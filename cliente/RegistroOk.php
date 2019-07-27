<?php
//include_once '../topo.php';
include_once 'ClienteDao.php';
include_once './Cliente.php';

$objcliente = New Cliente();
$objclientedao = New ClienteDao();

$senha = $_GET['senha'];
$senha_md5 = md5($senha);
$objcliente->ci = $_GET['ci'];
$objcliente->nombre = $_GET['nombre'];
$objcliente->direccion = $_GET['direccion'];
$objcliente->telefono = $_GET['telefono'];
$objcliente->email = $_GET['email'];
$objcliente->senha = $senha_md5;


//var_dump($objcliente);
$retorno = $objclientedao->debo($objcliente);
require_once '../app/init.php';
$response = $recaptcha->verify($_POST['g-recaptcha-response']);
if($retorno){
	if($response->isSuccess()){
		echo "Cliente Registrado";
		header("Refresh:3; url=Listar.php");}
	else {
		echo "Sin Registro"; 
		header("Refresh:3; url=Listar.php");}
}
else {
		echo "Sin Registro"; 
		header("Refresh:3; url=Listar.php");}    
?>
<?php
//include_once '../rodape.php';
?>