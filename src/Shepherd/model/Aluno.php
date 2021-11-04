<?php
            
/**
 * Classe feita para manipulação do objeto Aluno
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace Shepherd\model;

class Aluno {
	private $id;
	private $nome;
	private $matricula;
	private $cpfDiscente;
	private $campusCurso;
	private $codigoCurso;
	private $nomeCurso;
	private $qtdDisciplinas2021;
	private $cidadeMoradia;
	private $estadoMoradia;
	private $cep;
	private $endereco;
	private $rendaPerCapta;
	private $faixaRenda;
	private $codigoChip;
    public function __construct(){

    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
		    
	public function getNome() {
		return $this->nome;
	}
	public function setMatricula($matricula) {
		$this->matricula = $matricula;
	}
		    
	public function getMatricula() {
		return $this->matricula;
	}
	public function setCpfDiscente($cpfDiscente) {
		$this->cpfDiscente = $cpfDiscente;
	}
		    
	public function getCpfDiscente() {
		return $this->cpfDiscente;
	}
	public function setCampusCurso($campusCurso) {
		$this->campusCurso = $campusCurso;
	}
		    
	public function getCampusCurso() {
		return $this->campusCurso;
	}
	public function setCodigoCurso($codigoCurso) {
		$this->codigoCurso = $codigoCurso;
	}
		    
	public function getCodigoCurso() {
		return $this->codigoCurso;
	}
	public function setNomeCurso($nomeCurso) {
		$this->nomeCurso = $nomeCurso;
	}
		    
	public function getNomeCurso() {
		return $this->nomeCurso;
	}
	public function setQtdDisciplinas2021($qtdDisciplinas2021) {
		$this->qtdDisciplinas2021 = $qtdDisciplinas2021;
	}
		    
	public function getQtdDisciplinas2021() {
		return $this->qtdDisciplinas2021;
	}
	public function setCidadeMoradia($cidadeMoradia) {
		$this->cidadeMoradia = $cidadeMoradia;
	}
		    
	public function getCidadeMoradia() {
		return $this->cidadeMoradia;
	}
	public function setEstadoMoradia($estadoMoradia) {
		$this->estadoMoradia = $estadoMoradia;
	}
		    
	public function getEstadoMoradia() {
		return $this->estadoMoradia;
	}
	public function setCep($cep) {
		$this->cep = $cep;
	}
		    
	public function getCep() {
		return $this->cep;
	}
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}
		    
	public function getEndereco() {
		return $this->endereco;
	}
	public function setRendaPerCapta($rendaPerCapta) {
		$this->rendaPerCapta = $rendaPerCapta;
	}
		    
	public function getRendaPerCapta() {
		return $this->rendaPerCapta;
	}
	public function setFaixaRenda($faixaRenda) {
		$this->faixaRenda = $faixaRenda;
	}
		    
	public function getFaixaRenda() {
		return $this->faixaRenda;
	}
	public function setCodigoChip($codigoChip) {
		$this->codigoChip = $codigoChip;
	}
		    
	public function getCodigoChip() {
		return $this->codigoChip;
	}
	public function __toString(){
	    return $this->id.' - '.$this->nome.' - '.$this->matricula.' - '.$this->cpfDiscente.' - '.$this->campusCurso.' - '.$this->codigoCurso.' - '.$this->nomeCurso.' - '.$this->qtdDisciplinas2021.' - '.$this->cidadeMoradia.' - '.$this->estadoMoradia.' - '.$this->cep.' - '.$this->endereco.' - '.$this->rendaPerCapta.' - '.$this->faixaRenda.' - '.$this->codigoChip;
	}
                

}
?>