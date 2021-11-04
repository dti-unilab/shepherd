<?php
            
/**
 * Classe feita para manipulação do objeto Aluno
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace Shepherd\dao;
use PDO;
use PDOException;
use Shepherd\model\Aluno;
use Shepherd\model\Planilha;

class AlunoDAO extends DAO {
    
    

            
            
    public function update(Aluno $aluno)
    {
        $id = $aluno->getId();
            
            
        $sql = "UPDATE aluno
                SET
                nome = :nome,
                matricula = :matricula,
                cpf_discente = :cpfDiscente,
                campus_curso = :campusCurso,
                codigo_curso = :codigoCurso,
                nome_curso = :nomeCurso,
                qtd_disciplinas2021 = :qtdDisciplinas2021,
                cidade_moradia = :cidadeMoradia,
                estado_moradia = :estadoMoradia,
                cep = :cep,
                endereco = :endereco,
                renda_per_capta = :rendaPerCapta,
                faixa_renda = :faixaRenda,
                codigo_chip = :codigoChip
                WHERE aluno.id = :id;";
			$nome = $aluno->getNome();
			$matricula = $aluno->getMatricula();
			$cpfDiscente = $aluno->getCpfDiscente();
			$campusCurso = $aluno->getCampusCurso();
			$codigoCurso = $aluno->getCodigoCurso();
			$nomeCurso = $aluno->getNomeCurso();
			$qtdDisciplinas2021 = $aluno->getQtdDisciplinas2021();
			$cidadeMoradia = $aluno->getCidadeMoradia();
			$estadoMoradia = $aluno->getEstadoMoradia();
			$cep = $aluno->getCep();
			$endereco = $aluno->getEndereco();
			$rendaPerCapta = $aluno->getRendaPerCapta();
			$faixaRenda = $aluno->getFaixaRenda();
			$codigoChip = $aluno->getCodigoChip();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":matricula", $matricula, PDO::PARAM_STR);
			$stmt->bindParam(":cpfDiscente", $cpfDiscente, PDO::PARAM_STR);
			$stmt->bindParam(":campusCurso", $campusCurso, PDO::PARAM_STR);
			$stmt->bindParam(":codigoCurso", $codigoCurso, PDO::PARAM_STR);
			$stmt->bindParam(":nomeCurso", $nomeCurso, PDO::PARAM_STR);
			$stmt->bindParam(":qtdDisciplinas2021", $qtdDisciplinas2021, PDO::PARAM_INT);
			$stmt->bindParam(":cidadeMoradia", $cidadeMoradia, PDO::PARAM_STR);
			$stmt->bindParam(":estadoMoradia", $estadoMoradia, PDO::PARAM_STR);
			$stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
			$stmt->bindParam(":endereco", $endereco, PDO::PARAM_STR);
			$stmt->bindParam(":rendaPerCapta", $rendaPerCapta, PDO::PARAM_STR);
			$stmt->bindParam(":faixaRenda", $faixaRenda, PDO::PARAM_STR);
			$stmt->bindParam(":codigoChip", $codigoChip, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Aluno $aluno, Planilha $planilha){
        $sql = "INSERT INTO aluno(nome, matricula, cpf_discente, campus_curso, codigo_curso, nome_curso, qtd_disciplinas2021, cidade_moradia, estado_moradia, cep, endereco, renda_per_capta, faixa_renda, codigo_chip, id_planilha) VALUES (:nome, :matricula, :cpfDiscente, :campusCurso, :codigoCurso, :nomeCurso, :qtdDisciplinas2021, :cidadeMoradia, :estadoMoradia, :cep, :endereco, :rendaPerCapta, :faixaRenda, :codigoChip, :idPlanilha);";
		$nome = $aluno->getNome();
		$matricula = $aluno->getMatricula();
		$cpfDiscente = $aluno->getCpfDiscente();
		$campusCurso = $aluno->getCampusCurso();
		$codigoCurso = $aluno->getCodigoCurso();
		$nomeCurso = $aluno->getNomeCurso();
		$qtdDisciplinas2021 = $aluno->getQtdDisciplinas2021();
		$cidadeMoradia = $aluno->getCidadeMoradia();
		$estadoMoradia = $aluno->getEstadoMoradia();
		$cep = $aluno->getCep();
		$endereco = $aluno->getEndereco();
		$rendaPerCapta = $aluno->getRendaPerCapta();
		$faixaRenda = $aluno->getFaixaRenda();
		$codigoChip = $aluno->getCodigoChip();
        $idPlanilha = $planilha->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":matricula", $matricula, PDO::PARAM_STR);
			$stmt->bindParam(":cpfDiscente", $cpfDiscente, PDO::PARAM_STR);
			$stmt->bindParam(":campusCurso", $campusCurso, PDO::PARAM_STR);
			$stmt->bindParam(":codigoCurso", $codigoCurso, PDO::PARAM_STR);
			$stmt->bindParam(":nomeCurso", $nomeCurso, PDO::PARAM_STR);
			$stmt->bindParam(":qtdDisciplinas2021", $qtdDisciplinas2021, PDO::PARAM_INT);
			$stmt->bindParam(":cidadeMoradia", $cidadeMoradia, PDO::PARAM_STR);
			$stmt->bindParam(":estadoMoradia", $estadoMoradia, PDO::PARAM_STR);
			$stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
			$stmt->bindParam(":endereco", $endereco, PDO::PARAM_STR);
			$stmt->bindParam(":rendaPerCapta", $rendaPerCapta, PDO::PARAM_STR);
			$stmt->bindParam(":faixaRenda", $faixaRenda, PDO::PARAM_STR);
			$stmt->bindParam(":codigoChip", $codigoChip, PDO::PARAM_STR);
			$stmt->bindParam(":idPlanilha", $idPlanilha, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Aluno $aluno, Planilha $planilha){
        $sql = "INSERT INTO aluno(id, nome, matricula, cpf_discente, campus_curso, codigo_curso, nome_curso, qtd_disciplinas2021, cidade_moradia, estado_moradia, cep, endereco, renda_per_capta, faixa_renda, codigo_chip, id_planilha) VALUES (:id, :nome, :matricula, :cpfDiscente, :campusCurso, :codigoCurso, :nomeCurso, :qtdDisciplinas2021, :cidadeMoradia, :estadoMoradia, :cep, :endereco, :rendaPerCapta, :faixaRenda, :codigoChip, :idPlanilha);";
		$id = $aluno->getId();
		$nome = $aluno->getNome();
		$matricula = $aluno->getMatricula();
		$cpfDiscente = $aluno->getCpfDiscente();
		$campusCurso = $aluno->getCampusCurso();
		$codigoCurso = $aluno->getCodigoCurso();
		$nomeCurso = $aluno->getNomeCurso();
		$qtdDisciplinas2021 = $aluno->getQtdDisciplinas2021();
		$cidadeMoradia = $aluno->getCidadeMoradia();
		$estadoMoradia = $aluno->getEstadoMoradia();
		$cep = $aluno->getCep();
		$endereco = $aluno->getEndereco();
		$rendaPerCapta = $aluno->getRendaPerCapta();
		$faixaRenda = $aluno->getFaixaRenda();
		$codigoChip = $aluno->getCodigoChip();
        $idPlanilha = $planilha->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":matricula", $matricula, PDO::PARAM_STR);
			$stmt->bindParam(":cpfDiscente", $cpfDiscente, PDO::PARAM_STR);
			$stmt->bindParam(":campusCurso", $campusCurso, PDO::PARAM_STR);
			$stmt->bindParam(":codigoCurso", $codigoCurso, PDO::PARAM_STR);
			$stmt->bindParam(":nomeCurso", $nomeCurso, PDO::PARAM_STR);
			$stmt->bindParam(":qtdDisciplinas2021", $qtdDisciplinas2021, PDO::PARAM_INT);
			$stmt->bindParam(":cidadeMoradia", $cidadeMoradia, PDO::PARAM_STR);
			$stmt->bindParam(":estadoMoradia", $estadoMoradia, PDO::PARAM_STR);
			$stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
			$stmt->bindParam(":endereco", $endereco, PDO::PARAM_STR);
			$stmt->bindParam(":rendaPerCapta", $rendaPerCapta, PDO::PARAM_STR);
			$stmt->bindParam(":faixaRenda", $faixaRenda, PDO::PARAM_STR);
			$stmt->bindParam(":codigoChip", $codigoChip, PDO::PARAM_STR);
			$stmt->bindParam(":idPlanilha", $idPlanilha, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Aluno $aluno){
		$id = $aluno->getId();
		$sql = "DELETE FROM aluno WHERE id = :id";
		    
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
		$sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno 
            ORDER BY aluno.id ASC
            LIMIT 1000";

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
                $list [] = $aluno;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Aluno $aluno) {
        $lista = array();
	    $id = $aluno->getId();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.id = :id";
                
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNome(Aluno $aluno) {
        $lista = array();
	    $nome = $aluno->getNome();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.nome like :nome";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByMatricula(Aluno $aluno) {
        $lista = array();
	    $matricula = $aluno->getMatricula();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.matricula like :matricula";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":matricula", $matricula, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByCpfDiscente(Aluno $aluno) {
        $lista = array();
	    $cpfDiscente = $aluno->getCpfDiscente();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.cpf_discente like :cpfDiscente";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":cpfDiscente", $cpfDiscente, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByCampusCurso(Aluno $aluno) {
        $lista = array();
	    $campusCurso = $aluno->getCampusCurso();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.campus_curso like :campusCurso";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":campusCurso", $campusCurso, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByCodigoCurso(Aluno $aluno) {
        $lista = array();
	    $codigoCurso = $aluno->getCodigoCurso();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.codigo_curso like :codigoCurso";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":codigoCurso", $codigoCurso, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNomeCurso(Aluno $aluno) {
        $lista = array();
	    $nomeCurso = $aluno->getNomeCurso();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.nome_curso like :nomeCurso";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nomeCurso", $nomeCurso, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByQtdDisciplinas2021(Aluno $aluno) {
        $lista = array();
	    $qtdDisciplinas2021 = $aluno->getQtdDisciplinas2021();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.qtd_disciplinas2021 = :qtdDisciplinas2021";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":qtdDisciplinas2021", $qtdDisciplinas2021, PDO::PARAM_INT);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByCidadeMoradia(Aluno $aluno) {
        $lista = array();
	    $cidadeMoradia = $aluno->getCidadeMoradia();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.cidade_moradia like :cidadeMoradia";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":cidadeMoradia", $cidadeMoradia, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByEstadoMoradia(Aluno $aluno) {
        $lista = array();
	    $estadoMoradia = $aluno->getEstadoMoradia();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.estado_moradia like :estadoMoradia";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":estadoMoradia", $estadoMoradia, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByCep(Aluno $aluno) {
        $lista = array();
	    $cep = $aluno->getCep();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.cep like :cep";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByEndereco(Aluno $aluno) {
        $lista = array();
	    $endereco = $aluno->getEndereco();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.endereco like :endereco";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":endereco", $endereco, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByRendaPerCapta(Aluno $aluno) {
        $lista = array();
	    $rendaPerCapta = $aluno->getRendaPerCapta();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.renda_per_capta = :rendaPerCapta";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":rendaPerCapta", $rendaPerCapta, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByFaixaRenda(Aluno $aluno) {
        $lista = array();
	    $faixaRenda = $aluno->getFaixaRenda();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.faixa_renda like :faixaRenda";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":faixaRenda", $faixaRenda, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByCodigoChip(Aluno $aluno) {
        $lista = array();
	    $codigoChip = $aluno->getCodigoChip();
                
        $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
            WHERE aluno.codigo_chip like :codigoChip";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":codigoChip", $codigoChip, PDO::PARAM_STR);
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
                $lista [] = $aluno;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Aluno $aluno) {
        
	    $id = $aluno->getId();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.id = :id
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByNome(Aluno $aluno) {
        
	    $nome = $aluno->getNome();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.nome = :nome
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByMatricula(Aluno $aluno) {
        
	    $matricula = $aluno->getMatricula();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.matricula = :matricula
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":matricula", $matricula, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByCpfDiscente(Aluno $aluno) {
        
	    $cpfDiscente = $aluno->getCpfDiscente();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.cpf_discente = :cpfDiscente
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":cpfDiscente", $cpfDiscente, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByCampusCurso(Aluno $aluno) {
        
	    $campusCurso = $aluno->getCampusCurso();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.campus_curso = :campusCurso
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":campusCurso", $campusCurso, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByCodigoCurso(Aluno $aluno) {
        
	    $codigoCurso = $aluno->getCodigoCurso();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.codigo_curso = :codigoCurso
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":codigoCurso", $codigoCurso, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByNomeCurso(Aluno $aluno) {
        
	    $nomeCurso = $aluno->getNomeCurso();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.nome_curso = :nomeCurso
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":nomeCurso", $nomeCurso, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByQtdDisciplinas2021(Aluno $aluno) {
        
	    $qtdDisciplinas2021 = $aluno->getQtdDisciplinas2021();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.qtd_disciplinas2021 = :qtdDisciplinas2021
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":qtdDisciplinas2021", $qtdDisciplinas2021, PDO::PARAM_INT);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByCidadeMoradia(Aluno $aluno) {
        
	    $cidadeMoradia = $aluno->getCidadeMoradia();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.cidade_moradia = :cidadeMoradia
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":cidadeMoradia", $cidadeMoradia, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByEstadoMoradia(Aluno $aluno) {
        
	    $estadoMoradia = $aluno->getEstadoMoradia();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.estado_moradia = :estadoMoradia
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":estadoMoradia", $estadoMoradia, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByCep(Aluno $aluno) {
        
	    $cep = $aluno->getCep();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.cep = :cep
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByEndereco(Aluno $aluno) {
        
	    $endereco = $aluno->getEndereco();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.endereco = :endereco
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":endereco", $endereco, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByRendaPerCapta(Aluno $aluno) {
        
	    $rendaPerCapta = $aluno->getRendaPerCapta();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.renda_per_capta = :rendaPerCapta
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":rendaPerCapta", $rendaPerCapta, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByFaixaRenda(Aluno $aluno) {
        
	    $faixaRenda = $aluno->getFaixaRenda();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.faixa_renda = :faixaRenda
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":faixaRenda", $faixaRenda, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
                
    public function fillByCodigoChip(Aluno $aluno) {
        
	    $codigoChip = $aluno->getCodigoChip();
	    $sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                WHERE aluno.codigo_chip = :codigoChip
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":codigoChip", $codigoChip, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
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
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $aluno;
    }
	public function fetchByNN(Planilha $planilha) {
		$list = array ();
        $idPlanilha = $planilha->getId();
		$sql = "SELECT aluno.id, aluno.nome, aluno.matricula, aluno.cpf_discente, aluno.campus_curso, aluno.codigo_curso, aluno.nome_curso, aluno.qtd_disciplinas2021, aluno.cidade_moradia, aluno.estado_moradia, aluno.cep, aluno.endereco, aluno.renda_per_capta, aluno.faixa_renda, aluno.codigo_chip FROM aluno
                    WHERE aluno.id_planilha = :idPlanilha LIMIT 1000";
            
        try {
            $stmt = $this->connection->prepare($sql);
            
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		        return $list;
		    }
            $stmt->bindParam(":idPlanilha", $idPlanilha, PDO::PARAM_INT);

            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row)
            {
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
                $list [] = $aluno;
            
            
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;
    }
        
}