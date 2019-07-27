<?php
include_once '../topo.php';

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
		
			Nombre:<br>
            <input type="text" name="nome" id="nome"><br><br>
            			
			Email:<br>
            <input type="text" name="email" id="email"><br><br>
			
			Senha:<br>
            <input type="text" name="senha" id="senha"><br><br>
			
            <input type="submit" value="Enviar"><br><br>
            
        </form>
        
        
        
       
    </div>
<?php
    include'./Adm.php';
    if($_GET){
			echo "entrouu";
		$nome = $_GET['nome'];
		$email = $_GET['email'];
		$senha = $_GET['senha'];
	}
	
include_once '../rodape.php';
?>

</body>
</html>