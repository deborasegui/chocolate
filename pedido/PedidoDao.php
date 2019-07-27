<?php
include_once '../topo.php';
date_default_timezone_set("Brazil/East");
include_once 'Pedido.php';


class PedidoDao{
   
   public function debo(Pedido $pedido){
        $connection;
        try {
		
            $connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO pedido (fecha, hora, fechaentrega, horaentrega, direccion, valortotal, estado, idcliente, idproduto, cantidad, observacion) VALUES (:fecha, :hora, :fechaentrega, :horaentrega, :direccion, :valortotal, :estado, :idcliente, :idproduto, :cantidad, :observacion)";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindParam(":fecha",$pedido->fecha);
			$preparedStatment->bindParam(":hora",$pedido->hora);
			$preparedStatment->bindParam(":fechaentrega",$pedido->fechaentrega);
			$preparedStatment->bindParam(":horaentrega",$pedido->horaentrega);
			$preparedStatment->bindParam(":direccion",$pedido->direccion);
			$preparedStatment->bindParam(":valortotal",$pedido->valortotal);
			$preparedStatment->bindParam(":estado",$pedido->estado);
			$preparedStatment->bindParam(":idcliente",$pedido->idcliente);
			$preparedStatment->bindParam(":idproduto",$pedido->idproduto);
			$preparedStatment->bindParam(":cantidad",$pedido->cantidad);
			$preparedStatment->bindParam(":observacion",$pedido->observacion);	
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
		$sql = "SELECT * FROM pedido WHERE id = $x";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->execute();
		$printar = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
		return $printar;
		$connection->commit();
	}
        
	public function listar(){
		try{
			$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "SELECT * FROM pedido";
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
	
	public function editar(Pedido $pedido){
		
		$connection;
		
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "UPDATE pedido SET fechaentrega = :fechaentrega, horaentrega = :horaentrega, direccion = :direccion, estado = :estado, cantidad = :cantidad, observacion = :observacion WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindParam(":id",$pedido->id);
			$preparedStatment->bindParam(":fechaentrega",$pedido->fechaentrega);
			$preparedStatment->bindParam(":horaentrega",$pedido->horaentrega);
			$preparedStatment->bindParam(":direccion",$pedido->direccion);
			$preparedStatment->bindParam(":estado",$pedido->estado);
			$preparedStatment->bindParam(":cantidad",$pedido->cantidad);
			$preparedStatment->bindParam(":observacion",$pedido->observacion);
            
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
	
	public function excluir(Pedido $pedido){
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "DELETE FROM pedido WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindValue(":id", $pedido->id);			
			
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