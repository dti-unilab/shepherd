<?php
            
/**
 * Classe feita para manipulação do objeto AlunoController
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace Shepherd\controller;
use Shepherd\dao\AlunoDAO;
use Shepherd\model\Planilha;
use Shepherd\dao\PlanilhaDAO;
use Shepherd\model\Aluno;
use Shepherd\view\AlunoView;


class AlunoController {

	protected  $view;
    protected $dao;

	public function __construct(){
		$this->dao = new AlunoDAO();
		$this->view = new AlunoView();
	}


    public function delete(){
	    if(!isset($_GET['delete'])){
	        return;
	    }
        $selected = new Aluno();
	    $selected->setId($_GET['delete']);
        if(!isset($_POST['delete_aluno'])){
            $this->view->confirmDelete($selected);
            return;
        }
        if($this->dao->delete($selected))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao excluir Aluno
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar excluir Aluno
</div>

';
		}
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=aluno">';
    }



	public function fetch() 
    {
		$list = $this->dao->fetch();
		$this->view->showList($list);
	}


	public function add() {
            
        if(!isset($_POST['enviar_aluno'])){
            $planilhaDao = new PlanilhaDAO($this->dao->getConnection());
            $listPlanilha = $planilhaDao->fetch();            

            $this->view->showInsertForm($listPlanilha);
		    return;
		}
		if (! ( isset ( $_POST ['nome'] ) && isset ( $_POST ['matricula'] ) && isset ( $_POST ['cpf_discente'] ) && isset ( $_POST ['campus_curso'] ) && isset ( $_POST ['codigo_curso'] ) && isset ( $_POST ['nome_curso'] ) && isset ( $_POST ['qtd_disciplinas2021'] ) && isset ( $_POST ['cidade_moradia'] ) && isset ( $_POST ['estado_moradia'] ) && isset ( $_POST ['cep'] ) && isset ( $_POST ['endereco'] ) && isset ( $_POST ['renda_per_capta'] ) && isset ( $_POST ['faixa_renda'] ) && isset ( $_POST ['codigo_chip'] ) && isset ( $_POST ['planilha'] ))) {
			echo '
                <div class="alert alert-danger" role="alert">
                    Failed to register. Some field must be missing. 
                </div>

                ';
			return;
		}
		$aluno = new Aluno ();
		$aluno->setNome ( $_POST ['nome'] );
		$aluno->setMatricula ( $_POST ['matricula'] );
		$aluno->setCpfDiscente ( $_POST ['cpf_discente'] );
		$aluno->setCampusCurso ( $_POST ['campus_curso'] );
		$aluno->setCodigoCurso ( $_POST ['codigo_curso'] );
		$aluno->setNomeCurso ( $_POST ['nome_curso'] );
		$aluno->setQtdDisciplinas2021 ( $_POST ['qtd_disciplinas2021'] );
		$aluno->setCidadeMoradia ( $_POST ['cidade_moradia'] );
		$aluno->setEstadoMoradia ( $_POST ['estado_moradia'] );
		$aluno->setCep ( $_POST ['cep'] );
		$aluno->setEndereco ( $_POST ['endereco'] );
		$aluno->setRendaPerCapta ( $_POST ['renda_per_capta'] );
		$aluno->setFaixaRenda ( $_POST ['faixa_renda'] );
		$aluno->setCodigoChip ( $_POST ['codigo_chip'] );
        $planilha = new Planilha();
        $planilha->setId($_POST['planilha']);

            
		if ($this->dao->insert ($aluno, $planilha ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao inserir Aluno
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar Inserir Aluno
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=aluno">';
	}



            
	public function addAjax() {
            
        if(!isset($_POST['enviar_aluno'])){
            return;    
        }
        
		    
		
		if (! ( isset ( $_POST ['nome'] ) && isset ( $_POST ['matricula'] ) && isset ( $_POST ['cpf_discente'] ) && isset ( $_POST ['campus_curso'] ) && isset ( $_POST ['codigo_curso'] ) && isset ( $_POST ['nome_curso'] ) && isset ( $_POST ['qtd_disciplinas2021'] ) && isset ( $_POST ['cidade_moradia'] ) && isset ( $_POST ['estado_moradia'] ) && isset ( $_POST ['cep'] ) && isset ( $_POST ['endereco'] ) && isset ( $_POST ['renda_per_capta'] ) && isset ( $_POST ['faixa_renda'] ) && isset ( $_POST ['codigo_chip'] ) && isset ( $_POST ['planilha'] ))) {
			echo ':incompleto';
			return;
		}
            
		$aluno = new Aluno ();
		$aluno->setNome ( $_POST ['nome'] );
		$aluno->setMatricula ( $_POST ['matricula'] );
		$aluno->setCpfDiscente ( $_POST ['cpf_discente'] );
		$aluno->setCampusCurso ( $_POST ['campus_curso'] );
		$aluno->setCodigoCurso ( $_POST ['codigo_curso'] );
		$aluno->setNomeCurso ( $_POST ['nome_curso'] );
		$aluno->setQtdDisciplinas2021 ( $_POST ['qtd_disciplinas2021'] );
		$aluno->setCidadeMoradia ( $_POST ['cidade_moradia'] );
		$aluno->setEstadoMoradia ( $_POST ['estado_moradia'] );
		$aluno->setCep ( $_POST ['cep'] );
		$aluno->setEndereco ( $_POST ['endereco'] );
		$aluno->setRendaPerCapta ( $_POST ['renda_per_capta'] );
		$aluno->setFaixaRenda ( $_POST ['faixa_renda'] );
		$aluno->setCodigoChip ( $_POST ['codigo_chip'] );
        $planilha = new Planilha();
        $planilha->setId($_POST['planilha']);

            
		if ($this->dao->insert ( $aluno, $planilha ))
        {
			$id = $this->dao->getConnection()->lastInsertId();
            echo ':sucesso:'.$id;
            
		} else {
			 echo ':falha';
		}
	}
            
            

            
    public function edit(){
	    if(!isset($_GET['edit'])){
	        return;
	    }
        $selected = new Aluno();
	    $selected->setId($_GET['edit']);
	    $this->dao->fillById($selected);
	        
        if(!isset($_POST['edit_aluno'])){
            $this->view->showEditForm($selected);
            return;
        }
            
		if (! ( isset ( $_POST ['nome'] ) && isset ( $_POST ['matricula'] ) && isset ( $_POST ['cpf_discente'] ) && isset ( $_POST ['campus_curso'] ) && isset ( $_POST ['codigo_curso'] ) && isset ( $_POST ['nome_curso'] ) && isset ( $_POST ['qtd_disciplinas2021'] ) && isset ( $_POST ['cidade_moradia'] ) && isset ( $_POST ['estado_moradia'] ) && isset ( $_POST ['cep'] ) && isset ( $_POST ['endereco'] ) && isset ( $_POST ['renda_per_capta'] ) && isset ( $_POST ['faixa_renda'] ) && isset ( $_POST ['codigo_chip'] ))) {
			echo "Incompleto";
			return;
		}

		$selected->setNome ( $_POST ['nome'] );
		$selected->setMatricula ( $_POST ['matricula'] );
		$selected->setCpfDiscente ( $_POST ['cpf_discente'] );
		$selected->setCampusCurso ( $_POST ['campus_curso'] );
		$selected->setCodigoCurso ( $_POST ['codigo_curso'] );
		$selected->setNomeCurso ( $_POST ['nome_curso'] );
		$selected->setQtdDisciplinas2021 ( $_POST ['qtd_disciplinas2021'] );
		$selected->setCidadeMoradia ( $_POST ['cidade_moradia'] );
		$selected->setEstadoMoradia ( $_POST ['estado_moradia'] );
		$selected->setCep ( $_POST ['cep'] );
		$selected->setEndereco ( $_POST ['endereco'] );
		$selected->setRendaPerCapta ( $_POST ['renda_per_capta'] );
		$selected->setFaixaRenda ( $_POST ['faixa_renda'] );
		$selected->setCodigoChip ( $_POST ['codigo_chip'] );
            
		if ($this->dao->update ($selected ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso 
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha 
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=aluno">';
            
    }
        

    public function main(){
        
        if (isset($_GET['select'])){
            echo '<div class="row">';
                $this->select();
            echo '</div>';
            return;
        }
        echo '
		<div class="row">';
        echo '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">';
        
        if(isset($_GET['edit'])){
            $this->edit();
        }else if(isset($_GET['delete'])){
            $this->delete();
	    }else{
            $this->add();
        }
        $this->fetch();
        
        echo '</div>';
        echo '</div>';
            
    }
    public function mainAjax(){

        $this->addAjax();
        
            
    }


            
    public function select(){
	    if(!isset($_GET['select'])){
	        return;
	    }
        $selected = new Aluno();
	    $selected->setId($_GET['select']);
	        
        $this->dao->fillById($selected);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
	    $this->view->showSelected($selected);
        echo '</div>';
            

            
    }
}
?>