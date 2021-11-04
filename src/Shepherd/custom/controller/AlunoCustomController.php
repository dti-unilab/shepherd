<?php

/**
 * Customize o controller do objeto Aluno aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */
namespace Shepherd\custom\controller;

use Shepherd\controller\AlunoController;
use Shepherd\custom\dao\AlunoCustomDAO;
use Shepherd\custom\view\AlunoCustomView;
use Shepherd\model\Aluno;

class AlunoCustomController extends AlunoController
{

    public function __construct()
    {
        $this->dao = new AlunoCustomDAO();
        $this->view = new AlunoCustomView();
    }

    public function main()
    {
        $this->select();
    }

    public function select()
    {
        $this->view->formPesquisa();
        if (! isset($_GET['select'])) {
            return;
        }
        $selected = new Aluno();
        $selected->setMatricula($_GET['select']);
        $this->dao->fillByMatricula($selected);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
        $this->view->showSelected($selected);
        echo '</div>';
    }

    public function mainAjax()
    {
        if (! isset($_POST['enviar_aluno'])) {
            return;
        }

        if (! (isset($_POST['matricula']))) {
            echo ':incompleto';
            return;
        }

        $aluno = new Aluno();
        $aluno->setMatricula($_POST['matricula']);
        $aluno->setMatricula(trim($aluno->getMatricula()));
        
        $lista = $this->dao->fetchByMatricula($aluno);
        
        if (count($lista) == 0) {
            echo ":nao_encontrado";
            return;
        } else {
            if (! isset($_POST['codigo_chip'])) {
                echo ":encontrado";
                return;
            }
            if($_POST['codigo_chip'] == ""){
                echo ":encontrado";
                return;
            }
            foreach($lista as $aluno){
                $aluno->setCodigoChip($_POST['codigo_chip']);
                if(!$this->dao->update($aluno)){
                    echo ':falha';
                    return;
                }
            }
            
            echo ':sucesso';
                
        }
    }
}
?>