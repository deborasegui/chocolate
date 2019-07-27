<?php
include_once '../topo.php';
include './Adm.php';
include './AdmDao.php';

$debo = new  AdmDao();
$x= $_GET['id'];


if (isset($x)) {
    $editar = $debo->buscar($x);
	/*foreach($editar as $y){
		
		echo $y->nombre;
	}*/
}
echo "<div class='centro'>
			<h3>Editado</h3>";
?>

<html>
    <head>
        <title>DAW2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <form  name="adm" action="EditarOk.php" method="get">
            <fieldset>
                <legend></legend>
				
                ID:<br>
				<input type="hidden" name="id" id="id" value="<?php foreach($editar as $y){echo $y->id;}?>">
				Nombre:<br>
				<input type="text" name="nome" id="nome" required  value="<?php foreach($editar as $y){echo $y->nome;}?>" ><br><br>
				Email: <br>
				<input type="text" name="email" id="email" required  value="<?php foreach($editar as $y){echo $y->email;}?>" ><br><br>
				Senha: <br>
				<input type="text" name="senha" id="senha" required  value="<?php foreach($editar as $y){echo $y->senha;}?>" ><br><br>
                
				<input type="submit" value="Enviar"> <input type="reset" value="Limpiar">
            </fieldset>
        </form>


    </body>
</html>

<?php
include_once '../rodape.php';
?>