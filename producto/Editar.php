<?php
	include_once "../topo.php";
?>

<?php
include_once '../topo.php';
include './Produto.php';
include './ProdutoDao.php';

$debo = new  ProdutoDao();
$x= $_GET['id'];


if (isset($x)) {
    $editar = $debo->buscar($x);
	/*foreach($editar as $y){
		
		echo $y->nombre;
	}*/
}
echo "<div class='centro'>
			<h3>Editar</h3>";
?>


<html>
    <head>
        <title>DAW2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <form  name="produto" action="EditarOk.php" method="get">
            <fieldset>
                <legend></legend>
				
                
				<input type="hidden" name="id" id="id" value="<?php foreach($editar as $y){echo $y->id;}?>">
				
				<input type="hidden" name="idcategoria" id="idcategoria" value="<?php foreach($editar as $y){echo $y->idcategoria;}?>">
				Nombre:<br>
				<input type="text" name="nombre" id="nombre" required  value="<?php foreach($editar as $y){echo $y->nombre;}?>" ><br><br>
				Descripcion: <br>
				<input type="text" name="descripcion" id="descripcion" required  value="<?php foreach($editar as $y){echo $y->descripcion;}?>" ><br><br>
				Tamaño: <br>
				<input type="text" name="tamano" id="tamano" required  value="<?php foreach($editar as $y){echo $y->tamano;}?>" ><br><br>
				
				Imagen: <br>
				<input type="text" name="imagen" id="imagen" required  value="<?php foreach($editar as $y){echo $y->imagen;}?>" ><br><br>
				
				Precio: <br>
				<input type="text" name="precio" id="precio" required  value="<?php foreach($editar as $y){echo $y->precio;}?>" ><br><br>
                
				<input type="submit" value="Enviar"> <input type="reset" value="Limpiar">
            </fieldset>
        </form>

	</div>
	
    </body>
</html>
<?php
	include_once "../rodape.php";
?>
