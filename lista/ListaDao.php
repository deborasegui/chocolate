<?php
include_once 'Lista.php';

class ListaDao{
    
   public function inserir(Lista $lista){
        
         $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO pedido (valor, cantidad, idproduto, idpedido) VALUES (:valor, :cantidad, idproduto, :idpedido)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":valor",$pedido->valor);
			$preparedStatment->bindValue(":cantidad",$pedido->cantidad);
			$preparedStatment->bindValue(":idproduto",$pedido->idproduto);
			$preparedStatment->bindValue(":idpedido",$pedido->idpedido);
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
		$sql = "SELECT * FROM lista WHERE id = $x";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->execute();
		$printar = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
		return $printar;
		$connection->commit();
	}
        
	public function listar(){
		try{
			$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "SELECT * FROM lista";
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
	
	/*public function editar($nombre){
		try{
			$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "UPDATE produto SET nombre = $nombre";
			$preparedStatment = $connection->prepare($sql);
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
		//$retorno = mysqli_query($connection, $sql);
		
		//return $retorno;
	}*/
	
		/*public function excluir(Produto $produto){
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "DELETE FROM produto WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindValue(":id", $produto->id);			
			
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
	}*/
}
?> 