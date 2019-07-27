<?php

include_once '../topo.php';
include './Cliente.php';
include './ClienteDao.php';

$debo = new  ClienteDao();
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

        <form  name="cliente" action="EditarOk.php" method="get">
            <fieldset>
                <legend>Editar Cliente</legend>
				
                ID:<br>
				<input type="hidden" name="id" id="id" value="<?php foreach($editar as $y){echo $y->id;}?>">
				Cedula de Identidad:<br>
				<input type="text" name="ci" id="ci" required  value="<?php foreach($editar as $y){echo $y->ci;}?>" ><br><br>
                
				<input type="text" name="nombre" id="nombre" required  value="<?php foreach($editar as $y){echo $y->nombre;}?>" ><br><br>
				
				<input type="text" name="direccion" id="direccion" required  value="<?php foreach($editar as $y){echo $y->direccion;}?>" ><br><br>
				
				<input type="text" name="telefono" id="telefono" required  value="<?php foreach($editar as $y){echo $y->telefono;}?>" ><br><br>
				
				<input type="text" name="email" id="email" required  value="<?php foreach($editar as $y){echo $y->email;}?>" ><br><br>
				
				<input type="text" name="senha" id="senha" required  value="<?php foreach($editar as $y){echo $y->senha;}?>" ><br><br>
                
				<input type="submit" value="Enviar"> <input type="reset" value="Limpiar">
            </fieldset>
        </form>


    </body>
</html>

<?php
include_once '../rodape.php';
?>