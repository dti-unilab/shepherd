<?php
            
/**
 * Classe feita para manipulação do objeto Planilha
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace Shepherd\dao;
use PDO;
use PDOException;
use Shepherd\model\Planilha;
use Shepherd\model\Aluno;



class PlanilhaDAO extends DAO {
    
    

            
            
    public function update(Planilha $planilha)
    {
        $id = $planilha->getId();
            
            
        $sql = "UPDATE planilha
                SET
                rotulo = :rotulo,
                arquivo = :arquivo,
                data_upload = :dataUpload
                WHERE planilha.id = :id;";
			$rotulo = $planilha->getRotulo();
			$arquivo = $planilha->getArquivo();
			$dataUpload = $planilha->getDataUpload();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":rotulo", $rotulo, PDO::PARAM_STR);
			$stmt->bindParam(":arquivo", $arquivo, PDO::PARAM_STR);
			$stmt->bindParam(":dataUpload", $dataUpload, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Planilha $planilha){
        $sql = "INSERT INTO planilha(rotulo, arquivo, data_upload) VALUES (:rotulo, :arquivo, :dataUpload);";
		$rotulo = $planilha->getRotulo();
		$arquivo = $planilha->getArquivo();
		$dataUpload = $planilha->getDataUpload();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":rotulo", $rotulo, PDO::PARAM_STR);
			$stmt->bindParam(":arquivo", $arquivo, PDO::PARAM_STR);
			$stmt->bindParam(":dataUpload", $dataUpload, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Planilha $planilha){
        $sql = "INSERT INTO planilha(id, rotulo, arquivo, data_upload) VALUES (:id, :rotulo, :arquivo, :dataUpload);";
		$id = $planilha->getId();
		$rotulo = $planilha->getRotulo();
		$arquivo = $planilha->getArquivo();
		$dataUpload = $planilha->getDataUpload();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":rotulo", $rotulo, PDO::PARAM_STR);
			$stmt->bindParam(":arquivo", $arquivo, PDO::PARAM_STR);
			$stmt->bindParam(":dataUpload", $dataUpload, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Planilha $planilha){
		$id = $planilha->getId();
		$sql = "DELETE FROM planilha WHERE id = :id";
		    
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			return $stmt->execute();
			    
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}


	public function fetch() {
		$list = array ();
		$sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha LIMIT 1000";

        try {
            $stmt = $this->connection->prepare($sql);
            
		    if(!$stmt){   
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		        return $list;
		    }
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row) 
            {
		        $planilha = new Planilha();
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                $list [] = $planilha;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Planilha $planilha) {
        $lista = array();
	    $id = $planilha->getId();
                
        $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
            WHERE planilha.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $planilha = new Planilha();
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                $lista [] = $planilha;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByRotulo(Planilha $planilha) {
        $lista = array();
	    $rotulo = $planilha->getRotulo();
                
        $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
            WHERE planilha.rotulo like :rotulo";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":rotulo", $rotulo, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $planilha = new Planilha();
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                $lista [] = $planilha;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByArquivo(Planilha $planilha) {
        $lista = array();
	    $arquivo = $planilha->getArquivo();
                
        $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
            WHERE planilha.arquivo like :arquivo";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":arquivo", $arquivo, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $planilha = new Planilha();
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                $lista [] = $planilha;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByDataUpload(Planilha $planilha) {
        $lista = array();
	    $dataUpload = $planilha->getDataUpload();
                
        $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
            WHERE planilha.data_upload like :dataUpload";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":dataUpload", $dataUpload, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $planilha = new Planilha();
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                $lista [] = $planilha;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Planilha $planilha) {
        
	    $id = $planilha->getId();
	    $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
                WHERE planilha.id = :id
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $planilha;
    }
                
    public function fillByRotulo(Planilha $planilha) {
        
	    $rotulo = $planilha->getRotulo();
	    $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
                WHERE planilha.rotulo = :rotulo
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":rotulo", $rotulo, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $planilha;
    }
                
    public function fillByArquivo(Planilha $planilha) {
        
	    $arquivo = $planilha->getArquivo();
	    $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
                WHERE planilha.arquivo = :arquivo
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":arquivo", $arquivo, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $planilha;
    }
                
    public function fillByDataUpload(Planilha $planilha) {
        
	    $dataUpload = $planilha->getDataUpload();
	    $sql = "SELECT planilha.id, planilha.rotulo, planilha.arquivo, planilha.data_upload FROM planilha
                WHERE planilha.data_upload = :dataUpload
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":dataUpload", $dataUpload, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $planilha->setId( $row ['id'] );
                $planilha->setRotulo( $row ['rotulo'] );
                $planilha->setArquivo( $row ['arquivo'] );
                $planilha->setDataUpload( $row ['data_upload'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $planilha;
    }
                
    public function fetchAlunos(Planilha $planilha){
	    $id = $planilha->getId();
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE id_planilha = :id
            ORDER BY aluno.id ASC;";
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
                
                $aluno = new Aluno();

                $aluno->setId( $row ['id'] );
                $aluno->setNome( $row ['nome'] );
                $aluno->setMatricula( $row ['matricula'] );
                $aluno->setCpfDiscente( $row ['cpf_discente'] );
                $aluno->setCampusCurso( $row ['campus_curso'] );
                $aluno->setCodigoCurso( $row ['codigo_curso'] );
                $aluno->setNomeCurso( $row ['nome_curso'] );
                $aluno->setQtdDisciplinas2021( $row ['qtd_disciplinas2021'] );
                $aluno->setCidadeMoradia( $row ['cidade_moradia'] );
                $aluno->setEstadoMoradia( $row ['estado_moradia'] );
                $aluno->setCep( $row ['cep'] );
                $aluno->setEndereco( $row ['endereco'] );
                $aluno->setRendaPerCapta( $row ['renda_per_capta'] );
                $aluno->setFaixaRenda( $row ['faixa_renda'] );
                $aluno->setCodigoChip( $row ['codigo_chip'] );
                $planilha->addAluno($aluno);
            }
                    
        } catch(PDOException $e) {
            echo $e->getMessage();
                    
        }
                    

                
                
    }
                
                

                
    public function belogAluno(Planilha $planilha, Aluno $aluno){
	    $idPlanilha = $planilha->getId();
        $idAluno = $aluno->getId();
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.id_planilha = :idPlanilha
            AND aluno.id  = :idAluno;";
        try {
            
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":idPlanilha", $idPlanilha, PDO::PARAM_INT);
            $stmt->bindParam(":idAluno", $idAluno, PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->fetchColumn() > 0){
                return true;
            }
            return false;
         
            
        } catch(PDOException $e) {
            echo $e->getMessage();
            
        }
        return false;

    }
                
                

}