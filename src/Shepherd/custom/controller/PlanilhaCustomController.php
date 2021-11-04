<?php
            
/**
 * Customize o controller do objeto Planilha aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace Shepherd\custom\controller;
use Shepherd\controller\PlanilhaController;
use Shepherd\custom\dao\PlanilhaCustomDAO;
use Shepherd\custom\view\PlanilhaCustomView;
use Shepherd\model\Planilha;
use Shepherd\custom\view\AlunoCustomView;
use Shepherd\dao\AlunoDAO;

class PlanilhaCustomController  extends PlanilhaController {
    

	public function __construct(){
		$this->dao = new PlanilhaCustomDAO();
		$this->view = new PlanilhaCustomView();
	}

	
	
	public function exportar(){
	    if(!isset($_GET['select'])){
	        return;
	    }
	    if(!isset($_GET['exportar'])){
	        return;
	    }
	    $selected = new Planilha();
	    $selected->setId($_GET['select']);
	    $this->dao->fillById($selected);
	    $this->dao->fetchAlunos($selected);
	    
	    
	    $cabecalho = array(
	        'Nome',
	        'Matrícula',
	        'CPF_Discente',
	        'Campus_Curso',
	        'Codigo_Curso',
	        'Nome_Curso',
	        'Qtd_Disciplinas_20201',
	        'Cidade_Moradia',
	        'Estado_Moradia',
	        'CEP',
	        'Endereço',
	        'Renda_Per_Capita',
	        'Faixa_Renda',
    	    'Codigo_Chip');
	    $listaAlunos = $selected->getAlunos();
	    $dados = array();
	    foreach($listaAlunos as $aluno){
	        
	        $dados[] = array(
	            $aluno->getNome(),
	            $aluno->getMatricula(),
	            $aluno->getCpfDiscente(),
	            $aluno->getCampusCurso(),
	            $aluno->getCodigoCurso(),
	            $aluno->getNomeCurso(),
	            $aluno->getQtdDisciplinas2021(),
	            $aluno->getCidadeMoradia(),
	            $aluno->getEstadoMoradia(),
	            $aluno->getCep(),
	            $aluno->getEndereco(),
	            $aluno->getRendaPerCapta(),
	            $aluno->getFaixaRenda(),
	            $aluno->getCodigoChip()
	        );
	        
	    }
	    
	    $nomeArquivo =  $selected->getRotulo();
	    
	    
	    $f = fopen('php://output', 'w');
	    if(!$f){
	        return;
	    }
	    header('Content-Type: text/csv; charset=UTF-8; header=present');
	    header('Content-Disposition: inline; filename="'.$nomeArquivo.'"');
        
	    fputcsv($f, $cabecalho, ',', '"');
        foreach ($dados as $linha) {
            fputcsv($f, $linha, ',', '"');
        }
        fclose($f);
	    
	}
	
	
	public function select(){
	    if(!isset($_GET['select'])){
	        return;
	    }
	    $selected = new Planilha();
	    $selected->setId($_GET['select']);
	    
	    $this->dao->fillById($selected);
	    $this->dao->fetchAlunos($selected);
	    $lista = array();
	    
	    echo '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">';
	    $this->view->showSelected($selected);
	    
	    
	    
	    $importador = new Importador();
	    $lista = $importador->main($selected->getArquivo());
	    
	    $alunoDao = new AlunoDAO($this->dao->getConnection());
	    $this->dao->getConnection()->beginTransaction();
	    if(isset($_GET['importar'])){
	        foreach($lista as $aluno){
	            if(!$alunoDao->insert($aluno, $selected)){
	                $this->dao->getConnection()->rollBack();
	                break;
	            }
	            
	        }
	        $this->dao->getConnection()->commit();
	        echo '
<div class="alert alert-success" role="alert">
  Planilha Inserida Com Sucesso
</div>
';
	        echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=planilha&select='.$_GET['select'].'">';
	    }
	    
	    
	    

	    echo '</div>';
	    $alunoView = new AlunoCustomView();
	    
	    echo '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">';
	    $alunoView->showList($lista);
	    echo '</div>';
	    
	    echo '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">';
	    $this->view->showAlunos($selected);
	    echo '</div>';
	    
	    
	    
	    
	}
	public function addAjax() {
	    
	    if(!isset($_POST['enviar_planilha'])){
	        return;
	    }
	    
	    
	    
	    if (! ( isset ( $_FILES ['arquivo'] ))) {
	        echo ':incompleto';
	        return;
	    }
	    
	    $planilha = new Planilha();
	    
	    if($_FILES['arquivo']['name'] == null){
	        echo ':falha';
	        return;
	    }
	    
	    $nomeArquivo = $_FILES['arquivo']['name'];
	    
	    if(!file_exists('../../../3s/shepherd/uploads/planilha/arquivo/')) {
	        mkdir('../../../3s/shepherd/uploads/planilha/arquivo/', 0777, true);
	    }
	    
	    if(file_exists('../../../3s/shepherd/uploads/planilha/arquivo/'.$nomeArquivo)) {
	        $nomeArquivo = explode(".", $nomeArquivo)[0].'_'.uniqid().'.csv';
	    }
	    
	    if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], '../../../3s/shepherd/uploads/planilha/arquivo/'.$nomeArquivo))
	    {
	        echo ':falha';
	        return;
	    }
	    $planilha->setArquivo ( '../../../3s/shepherd/uploads/planilha/arquivo/'.$nomeArquivo );
	    $planilha->setRotulo ( $_FILES ['arquivo']['name'] );
	    
	    $planilha->setDataUpload (date("Y-m-d G:i:s") );
	    
	    if ($this->dao->insert ( $planilha ))
	    {
	        $id = $this->dao->getConnection()->lastInsertId();
	        echo ':sucesso:'.$id;
	        
	    } else {
	        echo ':falha';
	    }
	}
	
	
	
	public function delete(){
	    if(!isset($_GET['delete'])){
	        return;
	    }
	    $selected = new Planilha();
	    $selected->setId($_GET['delete']);
	    if(!isset($_POST['delete_planilha'])){
	        $this->view->confirmDelete($selected);
	        return;
	    }
	    $this->dao->fetchById($selected);
	    $this->dao->fetchAlunos($selected);
	    $lista = $selected->getAlunos();
	    $alunoDao = new AlunoDAO($this->dao->getConnection());
	    $this->dao->getConnection()->beginTransaction();
	    
	    foreach($lista as $aluno){
	        if(!$alunoDao->delete($aluno)){
	           echo 'Falha ao tentar Eliminar Alunos';
	           $this->dao->getConnection()->rollBack();
	           return;
	        }
	    }
	    if(!$this->dao->delete($selected))
	    {
	        $this->dao->getConnection()->rollBack();
	        echo '
	            
<div class="alert alert-danger" role="alert">
  Falha ao tentar excluir Planilha
</div>
	            
';
	        return;
	    } 
	    $this->dao->getConnection()->commit();
	    echo '
	        
<div class="alert alert-success" role="alert">
  Sucesso ao excluir Planilha
</div>
	        
';
	    
	    
	    echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=planilha">';
	}
	
	
	        
}
?>