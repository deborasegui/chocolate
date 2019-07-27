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
			Cedula de Identidad:<br>
            <input type="number" name="ci" id="ci" placeholder='00000000' pattern="\d{8}" required=""><br><br>

			Nombre:<br>
            <input type="text" name="nombre" id="nombre"><br><br>
            
			Direccion:<br>
            <input type="text" name="direccion" id="direccion"><br><br>
			
			Telefono:<br>
            <input type="tel" name="telefono" placeholder='000000000' id="telefono"><br><br>
			
			Email:<br>
            <input type="text" name="email" id="email"><br><br>

			Senha:<br>
            <input type="text" name="senha" id="senha"><br><br>
			
		 <br>
		 <div class="g-recaptcha" data-sitekey="6LfWmq4UAAAAAAz_3e4eGskTmZPPIqaPeLieVAl9"> </div>

			
            <input type="submit" value="Enviar"><br><br>
            
        </form>
        
        
       <script  src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

<?php
    include'./Cliente.php';
    if($_GET){
			echo "entrouu";
		$ci = $_GET['ci'];
		$nombre = $_GET['nome'];
		$direccion = $_GET['direccion'];
		$telefono = $_GET['telefono'];
		$email = $_GET['email'];
		$senha = $_GET['senha'];
	}

	echo '</div>';

include_once '../rodape.php';
?>
       
    </body>
</html>