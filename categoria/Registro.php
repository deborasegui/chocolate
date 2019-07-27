<?php
include_once '../topo.php';

echo "<div class='centro'>
			<h3>Registro de Categoria</h3>";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Debora Chocolateria y Reposteria</title>
    </head>
    <body>
        <form action="RegistroOk.php" name="deborachocolateriayreposteria" method="get">
            Nombre de la Categoria:<br>
            <input type="text" name="nombre" id="nombre"><br><br>
            
            <input type="submit" value="Enviar"><br><br>
            
        </form>
        
        
        
       
   
<?php
    include'./Categoria.php';
    if($_GET){
		
	$nombre = $_GET['nome'];
	}
    
	echo '</div>';
	
include_once '../rodape.php';
?>
 </body>
</html>