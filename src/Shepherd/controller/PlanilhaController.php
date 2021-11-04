<?php
            
/**
 * Classe feita para manipulação do objeto PlanilhaController
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace Shepherd\controller;
use Shepherd\dao\PlanilhaDAO;
use Shepherd\model\Planilha;
use Shepherd\view\PlanilhaView;


class PlanilhaController {

	protected  $view;
    protected $dao;

	public function __construct(){
		$this->dao = new PlanilhaDAO();
		$this->view = new PlanilhaView();
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
        if($this->dao->delete($selected))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao excluir Planilha
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar excluir Planilha
</div>

';
		}
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=planilha">';
    }



	public function fetch() 
    {
		$list = $this->dao->fetch();
		$this->view->showList($list);
	}


	public function add() {
            
        if(!isset($_POST['enviar_planilha'])){
            $this->view->showInsertForm();
		    return;
		}
		if (! ( isset ( $_POST ['rotulo'] ) && isset ( $_FILES ['arquivo'] ) && isset ( $_POST ['data_upload'] ))) {
			echo '
                <div class="alert alert-danger" role="alert">
                    Failed to register. Some field must be missing. 
                </div>

                ';
			return;
		}
		$planilha = new Planilha ();
		$planilha->setRotulo ( $_POST ['rotulo'] );

        if($_FILES['arquivo']['name'] != null){

            if(!file_exists('uploads/planilha/arquivo/')) {
    		    mkdir('uploads/planilha/arquivo/', 0777, true);
    		}
    
    		if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/planilha/arquivo/'. $_FILES['arquivo']['name']))
    		{
    		    echo '
                    <div class="alert alert-danger" role="alert">
                        Failed to send file.
                    </div>
    		        
                    ';
    		    return;
    		}
            $planilha->setArquivo ( "uploads/planilha/arquivo/".$_FILES ['arquivo']['name'] );
        }
		$planilha->setDataUpload ( $_POST ['data_upload'] );
            
		if ($this->dao->insert ($planilha ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao inserir Planilha
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar Inserir Planilha
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=planilha">';
	}



            
	public function addAjax() {
            
        if(!isset($_POST['enviar_planilha'])){
            return;    
        }
        
		    
		
		if (! ( isset ( $_POST ['rotulo'] ) && isset ( $_FILES ['arquivo'] ) && isset ( $_POST ['data_upload'] ))) {
			echo ':incompleto';
			return;
		}
            
		$planilha = new Planilha ();
		$planilha->setRotulo ( $_POST ['rotulo'] );
        if($_FILES['arquivo']['name'] != null){
    		if(!file_exists('uploads/planilha/arquivo/')) {
    		    mkdir('uploads/planilha/arquivo/', 0777, true);
    		}
    		        
    		if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/planilha/arquivo/'. $_FILES['arquivo']['name']))
    		{
    		    echo ':falha';
    		    return;
    		}
            $planilha->setArquivo ( "uploads/planilha/arquivo/".$_FILES ['arquivo']['name'] );
        }
		$planilha->setDataUpload ( $_POST ['data_upload'] );
            
		if ($this->dao->insert ( $planilha ))
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
        $selected = new Planilha();
	    $selected->setId($_GET['edit']);
	    $this->dao->fillById($selected);
	        
        if(!isset($_POST['edit_planilha'])){
            $this->view->showEditForm($selected);
            return;
        }
            
		if (! ( isset ( $_POST ['rotulo'] ) && isset ( $_POST ['arquivo'] ) && isset ( $_POST ['data_upload'] ))) {
			echo "Incompleto";
			return;
		}

		$selected->setRotulo ( $_POST ['rotulo'] );
		$selected->setArquivo ( $_POST ['arquivo'] );
		$selected->setDataUpload ( $_POST ['data_upload'] );
            
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
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=planilha">';
            
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
        $selected = new Planilha();
	    $selected->setId($_GET['select']);
	        
        $this->dao->fillById($selected);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
	    $this->view->showSelected($selected);
        echo '</div>';
            

        $this->dao->fetchAlunos($selected);
        echo '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">';
        $this->view->showAlunos($selected);
        echo '</div>';
            


            
    }
}
?>