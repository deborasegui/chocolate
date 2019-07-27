<?php
include_once 'Adm.php';

class AdmDao{
    
   public function inserir(Adm $adm){
        
         $connection;
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO adm (id,nome, email, senha) VALUES (:id, :nome, :email, :senha)";
            $preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindValue(":id",$adm->id);
            $preparedStatment->bindValue(":nome",$adm->nome);
			$preparedStatment->bindValue(":email",$adm->email);
			$preparedStatment->bindValue(":senha",$adm->senha);
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
		$sql = "SELECT * FROM adm WHERE id = $x";
		$preparedStatment = $connection->prepare($sql);
		$preparedStatment->execute();
		$printar = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
		return $printar;
		$connection->commit();
	}
        
	public function listar(){
		try{
			$connection = new PDO('mysql:host=127.0.0.1;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "SELECT * FROM adm";
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
	
	public function editar(Adm $adm){
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "UPDATE adm SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindParam(":id", $id);
			$preparedStatment->bindParam(":nome", $nome);
			$preparedStatment->bindParam(":email", $email);
			$preparedStatment->bindParam(":senha", $senha);
			
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
		//var_dump($retorno);
		//return $retorno;
		
		
	}
	
	public function excluir(Adm $adm){
		try{
			$connection = new PDO('mysql:host=localhost;dbname=deborachocolateriayreposteria', 'root', '');
			$sql = "DELETE FROM adm WHERE id = :id";
			$preparedStatment = $connection->prepare($sql);
			$preparedStatment->bindValue(":id", $adm->id);			
			
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