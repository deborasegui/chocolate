<?php
include_once "../topo.php";
include_once './Produto.php';
include_once 'ProdutoDao.php';

$objproduto = New Produto();
$objprodutodao = New ProdutoDao();

$objproduto->nombre = $_GET['nombre'];
$objproduto->descripcion = $_GET['descripcion'];
$objproduto->tamano = $_GET['tamano'];
$objproduto->imagen = $_GET['imagen'];
$objproduto->precio = $_GET['precio'];
$objproduto->idcategoria = $_GET['categoria'];

//var_dump($objproduto);
$retorno = $objprodutodao->inserir($objproduto);

if($retorno)
    echo "Producto Registrado";
else {
    
echo "Sin Registro"; 
    
}
?>

<?php
include_once '../rodape.php';
?>