<?php
include_once '../topo.php';
include_once 'CategoriaDao.php';
include_once './Categoria.php';

$objcategoria = New Categoria();
$objcategoriadao = New CategoriaDao();

$objcategoria->nombre = $_GET['nombre'];
$retorno = $objcategoriadao->inserir($objcategoria);
if($retorno)
    echo "Categoria Registrada";
else {
    
echo "Sin Registro";   
}
?>

<?php
include_once '../rodape.php';
?>