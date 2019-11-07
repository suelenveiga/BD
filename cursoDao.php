<?php

class CursoDAO{

	private function criaConexao(){
		$con = new PDO("pgsql:host=localhost;dbname=academico;port=5432",
			"postgres", "postgres"); 
		return $con;
    }
    
	public function inserir($cli){
		$con = $this->criaConexao();
		$sql ="INSERT INTO Curso (nome, area, cargaHoraria, dataFundacao) 
			VALUES (?,?,?,?) RETURNING id"; 
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cli->getNome());
		$stm->bindValue(2,$cli->getArea());
        $stm->bindValue(3,$cli->getcargaHoraria());
        $stm->bindValue(4,$cli->getdataFundacao());
		
		$res = $stm->execute();
		if($res ){	
			$linha = $res->fetch(PDO::FETCH_ASSOC);
			$cli->setId(intval($linha['id']));
		}
		else{
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		//$cli->setCod($con->lastInsertId());		
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
    }

    public function alterar($cli){
		$con = $this->criaConexao();
		$sql="UPDATE Curso SET nome = ?, area = ?, 
		  cargaHoraria = ?, dataFundacao = ? WHERE id = ? ";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cli->getNome());
		$stm->bindValue(2,$cli->getArea());
        $stm->bindValue(3,$cli->getcargaHoraria());
        $stm->bindValue(4,$cli->getdataFundacao());
		$stm->bindValue(5,$cli->getId(),PDO::PARAM_INT);
		$res = $stm->execute();
		if(!$res){
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
    }
    
    public function listar($limit, $offset){
		$con = $this->criaConexao();
		$sql = "SELECT * FROM Curso LIMIT ? OFFSET ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$limit);
		$stm->bindValue(2,$offset);
		$res=$stm->execute();
		$listCli = array();
		if($res){	
			while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
				$cli = new Curso($linha['nome'],$linha['area'],$linha['cargaHoraria'],$linha['dataFundacao']);
				$cli->setId(intval($linha['id']));
				array_push($listCli,$cli);
			}
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $listCli;
	}

	public function buscar($cod){
		$con = $this->criaConexao();
		$sql = "SELECT * FROM Curso WHERE id = ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cod);

		$res = $stm->execute();
		if($res ){	
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			$cli = new Curso($linha['nome'],$linha['area'],$linha['cargaHoraria'],$linha['dataFundacao']);
			$cli->setId(intval($linha['id']));
		}
		else{
			$cli=$res;
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm=NULL;
		$con = NULL;
		return $cli;
    } 

    public function deletar($cod){
		$con = $this->criaConexao();
		$sql = "DELETE FROM Curso WHERE id = ?";
		$stm = $con->prepare($sql);
		$stm->bindValue(1,$cod);
		$res = $stm->execute();
		if(!$res){
			echo $stm->queryString;
			var_dump($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = NULL;
		$con = NULL;
		return $res;
	}
    
}

?>
