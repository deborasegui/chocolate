 <?php
 include_once '../topo.php';
    include'Adm.php';
	include'AdmDao.php';
    if($_GET){
		
		$id = $_GET['id'];
	
		$objadm = New Adm();
		$objadm->id = $id;
		
		$obj = new AdmDao();
		$obj->excluir($objadm);
		if($obj->excluir($objadm) == TRUE){
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