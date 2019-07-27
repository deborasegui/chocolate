<?php
include_once '../topo.php';
include_once 'Cliente.php';


class ClienteDao{
   
   public function debo(Cliente $cliente){
        $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO cliente (ci, nombre, direccion, telefono, email, senha ) VALUES (:ci, :nombre, :direccion, :telefono, :email, :senha)";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindValue(":ci",$cliente->ci);
            $preparedStatment->bindValue(":nombre",$cliente->nombre);
			$preparedStatment->bindValue(":direccion",$cliente->direccion);
			$preparedStatment->bindValue(":telefono",$cliente->telefono);
			$preparedStatment->bindValue(":email",$cliente->email);
			$preparedStatment->bindValue(":senha",$cliente->senha);
            $preparedStatment->execute();
			var_dump($preparedStatment);
            $connection->commit();
            RETURN TRUE;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }   
    }
	
	public function buscar($x) {
		$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
		$connection->beginTransaction();
		$sql = "SELECT * FROM cliente WHERE id = $x";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->execute();
		$printar = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
		return $printar;
		$connection->commit();
	}
        
	public function listar(){
		try{
			$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "SELECT * FROM cliente";
			$preparedStatment = $connection->prepare($sql);
			
			if ($preparedStatment->execute() == TRUE) {
				return $preparedStatment->fetchAll();
			}
			else {
				return array();
			}
		
		} catch (PDOException $ex) {
			if ((isset($connection)) && ($connection->inTransaction())) {
				$connection->rollBack();
			}
			print $ex->getMessage();
		}finally {
			if (isset($connection)) {
				unset($connection);
			}
		}
		
		$retorno = mysqli_query($connection, $sql);
		
		return $retorno;
		
	}
	
	public function editar(Cliente $cliente){
		
		$connection;

		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "UPDATE cliente SET ci = :ci, nombre = :nombre, direccion = :direccion, telefono = :telefono, email = :email, senha = :senha WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindParam(":id",$cliente->id);
			$preparedStatment->bindParam(":ci",$cliente->ci);
			$preparedStatment->bindParam(":nombre",$cliente->nombre);
			$preparedStatment->bindParam(":direccion",$cliente->direccion);
			$preparedStatment->bindParam(":telefono",$cliente->telefono);
			$preparedStatment->bindParam(":email",$cliente->email);
			$preparedStatment->bindParam(":senha",$cliente->senha);
			
			$retorno = $preparedStatment->execute();
            //$connection->commit(););
			var_dump($retorno);		
            return $retorno;
			
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        } 		
		
		
	}
	
	public function excluir(Cliente $cliente){
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "DELETE FROM cliente WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindValue(":id", $cliente->id);			
			
			$retorno = $preparedStatment->execute();
		            //$connection->commit(););
            return $retorno;
			
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        } 	
	}
}
?> 
<?php
include_once '../rodape.php';
?>


