<?php
include_once "../topo.php";
include_once 'Produto.php';

class ProdutoDao{
    
   public function inserir(Produto $produto){
        
		
         $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO produto (nombre, descripcion, tamano, imagen, precio, idcategoria) VALUES (:nombre, :descripcion, :tamano, :imagen, :precio, :idcategoria)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":nombre",$produto->nombre);
			$preparedStatment->bindValue(":descripcion",$produto->descripcion);
			$preparedStatment->bindValue(":tamano",$produto->tamano);
			$preparedStatment->bindValue(":imagen",$produto->imagen);
			$preparedStatment->bindValue(":precio",$produto->precio);
			$preparedStatment->bindValue(":idcategoria",$produto->idcategoria);
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
		$sql = "SELECT * FROM produto WHERE id = $x";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->execute();
		$printar = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
		return $printar;
		$connection->commit();
	}
        
	public function listar(){
		try{
			$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "SELECT * FROM produto";
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
	
	public function editar(Produto $produto){
		
		$connection;
		var_dump($produto);
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "UPDATE produto SET nombre = :nombre, descripcion = :descripcion, tamano = :tamano, imagen = :imagen, precio = :precio, idcategoria = :idcategoria WHERE id = :id";
			
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindParam(":id", $produto->id);
			$preparedStatment->bindParam(":nombre", $produto->nombre);
			$preparedStatment->bindParam(":descripcion", $produto->descripcion);
			$preparedStatment->bindParam(":tamano", $produto->tamano);
			$preparedStatment->bindParam(":imagen", $produto->imagen);
			$preparedStatment->bindParam(":precio", $produto->precio);
			$preparedStatment->bindParam(":idcategoria", $produto->idcategoria);
			   
            $retorno = $preparedStatment->execute();
			
            //$connection->commit();
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
		/*$retorno = mysqli_query($connection, $sql);
		
		return $retorno;*/
	}
	
		public function excluir(Produto $produto){
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
	}
}
?> <?php
include_once '../rodape.php';
?>