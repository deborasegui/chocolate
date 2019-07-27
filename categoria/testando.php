<?php
include_once '../topo.php';
include './Categoria.php';
include './CategoriaDao.php';

$debo = new  CategoriaDao();

if (isset($_POST['nombre'])) {
		$nombre = $_POST['nombre'];
		$id = $_POST['id'];
		
		$debo->editar($nombre, $id);
		

    if ($debo == TRUE) {
        echo header('Location: Listar.php');
    } else {
        echo "Error";
    }
} 
?>
<?php
include_once '../rodape.php';
?>