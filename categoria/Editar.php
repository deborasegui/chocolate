<?php
include_once '../topo.php';
include './Categoria.php';
include './CategoriaDao.php';

$objcategoria = new  CategoriaDao();
$x= $_GET['id'];


if (isset($x)) {
    $editar = $objcategoria->buscar($x);
	/*foreach($editar as $y){
		
		echo $y->nombre;
	}*/
}
echo "<div class='centro'>
			<h3>Lista de Produtos</h3>";
?>

<html>
    <head>
        <title>DAW2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <form  name="categoria" action="EditarOk.php" method="get">
            <fieldset>
                <legend></legend>
				
                Nombre:<br>
                <input type="text" name="nombre" id="nombre" required  value="<?php foreach($editar as $y){echo $y->nombre;}?>" ><br><br>
				<input type="hidden" name="id" id="id" value="<?php foreach($editar as $y){echo $y->id;}?>">
                <input type="submit" value="Enviar"> <input type="reset" value="Limpiar">
            </fieldset>
        </form>

    </body>
</html>

<?php
include_once '../rodape.php';
?>