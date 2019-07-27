<?php
include_once '../topo.php';
	include_once '../producto/ProdutoDao.php';
    include_once 'PedidoDao.php';
	
	echo "<div class='centro'>
			<h3>Registro</h3>";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Debora Chocolateria y Reposteria</title>
    </head>
    <body>
        <form action="RegistroOk.php" name="deborachocolateriayreposteria" method="get">
			
			 <select name="produto">
                <?php
               		$c = new ProdutoDao();
					$listar = $c->listar();
					
                    echo "<option value=''>Selecione un Producto</option>";
                    foreach ($listar as $value) {
                       echo "<option value='".$value["id"]."'>".$value["nombre"]."</option>" ;
                    }
                ?>
            </select><br><br>
            
			Cantidad:<br>
            <input type="number" name="cantidad" id="cantidad"><br><br>
			
			Observacion:<br>
            <input type="text" name="observacion" id="observacion"><br><br>
			
			Fecha de entrega:<br>
            <input type="date" name="fechaentrega" id="fechaentrega"><br><br>

			Hora de entrega:<br>
            <input type="time" name="horaentrega" id="horaentrega"><br><br>
            
			Direccion:<br>
            <input type="text" name="direccion" id="direccion"><br><br>
			
			
            <input type="submit" value="Enviar"><br><br>
            
        </form>
        
        
        
       
    </body>
</html>

<?php
include_once '../rodape.php';
?>