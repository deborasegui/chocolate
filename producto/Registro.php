<?php
include_once "../topo.php";
	include_once '../categoria/CategoriaDao.php';
        include_once 'ProdutoDao.php';
		

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Debora Chocolateria y Reposteria</title>
    </head>
    <body>
	<h2>Registro de Productos</h2><br>
        <form action="RegistroOk.php" name="deborachocolateriayreposteria" method="get">
            
            <select name="categoria">
                <?php
               		$c = new CategoriaDao();
					$listar = $c->listar();
					
                    echo "<option value=''>Selecione una Categoria</option>";
                    foreach ($listar as $value) {
                       echo "<option value='".$value["id"]."'>".$value["nombre"]."</option>" ;
                    }
                ?>
            </select><br><br>
            
            
            Nombre:<br>
            <input type="text" name="nombre" id="nombre"><br><br>
            
            Descripcion:<br>
            <input type="text" name="descripcion" id="descripcion"><br><br>
            
            Tamanho:<br>
            <input type="text" name="tamano" id="tamano"><br><br>
            
            Imagen:<br>
            <input type="text" name="imagen" id="imagen"><br><br>
            
            Precio:<br>
            <input type="text" name="precio" id="precio"><br><br>
            
            <input type="submit" value="Enviar"><br><br>
            
        </form>
        
        
        
       
    </body>
</html>


<?php
include_once '../rodape.php';
?>