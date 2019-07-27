<?php
include_once '../topo.php';
include_once 'Categoria.php';

class CategoriaDao{
    
   public function inserir(Categoria $categoria){
        
         $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO categoria (nombre) VALUES (:nombre)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindParam(":nombre",$categoria->nombre);
            $preparedStatment->execute();
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
		$sql = "SELECT * FROM categoria WHERE id = $x";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->execute();
		$printar = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
		return $printar;
		$connection->commit();
	}
        
	public function listar(){
		try{
			$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "SELECT * FROM categoria";
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
	
	public function editar(Categoria $categoria){
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "UPDATE categoria SET nombre = :nombre WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindParam(":id", $categoria->id);
			$preparedStatment->bindParam(":nombre", $categoria->nombre);
			
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
		//$retorno = mysqli_query($connection, $sql);
		var_dump($retorno);
		//return $retorno;
		
		
	}
	
	public function excluir(Categoria $categoria){
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "DELETE FROM categoria WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindValue(":id", $categoria->id);			
			
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

include_once '../rodape.php';
?>

