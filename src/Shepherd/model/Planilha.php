<?php
            
/**
 * Classe feita para manipulação do objeto Planilha
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace Shepherd\model;

class Planilha {
	private $id;
	private $rotulo;
	private $arquivo;
	private $dataUpload;
	private $alunos;
    public function __construct(){

        $this->alunos = array();
    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setRotulo($rotulo) {
		$this->rotulo = $rotulo;
	}
		    
	public function getRotulo() {
		return $this->rotulo;
	}
	public function setArquivo($arquivo) {
		$this->arquivo = $arquivo;
	}
		    
	public function getArquivo() {
		return $this->arquivo;
	}
	public function setDataUpload($dataUpload) {
		$this->dataUpload = $dataUpload;
	}
		    
	public function getDataUpload() {
		return $this->dataUpload;
	}

	public function setAlunos($alunos) {
		$this->alunos = $alunos;
	}
         
    public function addAluno(Aluno $aluno){
        $this->alunos[] = $aluno;
            
    }
	public function getAlunos() {
		return $this->alunos;
	}
	public function __toString(){
	    return $this->id.' - '.$this->rotulo.' - '.$this->arquivo.' - '.$this->dataUpload.' - '.'Lista: '.implode(", ", $this->alunos);
	}
                

}
?>