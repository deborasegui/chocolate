<?php
include_once '../topo.php';
include './Pedido.php';
include './PedidoDao.php';

$debo = new  PedidoDao();
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

        <form  name="cliente" action="EditarAdmOk.php" method="get">
            <fieldset>
                <legend></legend>
				
                <br>
				<input type="hidden" name="id" id="id" value="<?php foreach($editar as $y){echo $y->id;}?>">
				Fecha de entrega:<br>
				<input type="text" name="fechaentrega" id="fechaentrega" required  value="<?php foreach($editar as $y){echo $y->fechaentrega;}?>" ><br><br>
                Hora de entrega:<br>
				<input type="text" name="horaentrega" id="horaentrega" required  value="<?php foreach($editar as $y){echo $y->horaentrega;}?>" ><br><br>
				Direccion:
				<input type="text" name="direccion" id="direccion" required  value="<?php foreach($editar as $y){echo $y->direccion;}?>" ><br><br>
				Estado:
				<input type="text" name="estado" id="estado" required  value="<?php foreach($editar as $y){echo $y->estado;}?>" ><br><br>
				Cantidad
				<input type="text" name="cantidad" id="cantidad" required  value="<?php foreach($editar as $y){echo $y->cantidad;}?>" ><br><br>
				Observacion:
				<input type="text" name="observacion" id="observacion" required  value="<?php foreach($editar as $y){echo $y->observacion;}?>" ><br><br>
                
				<input type="submit" value="Enviar"> <input type="reset" value="Limpiar">
            </fieldset>
        </form>

	</div>
	
    </body>
</html>

<?php
include_once '../rodape.php';
?>
