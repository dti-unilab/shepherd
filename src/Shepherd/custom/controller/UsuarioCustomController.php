<?php
            
/**
 * Customize o controller do objeto Usuario aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace Shepherd\custom\controller;
use Shepherd\controller\UsuarioController;
use Shepherd\custom\dao\UsuarioCustomDAO;
use Shepherd\custom\view\UsuarioCustomView;
use Shepherd\model\Usuario;
use Shepherd\util\Sessao;

class UsuarioCustomController  extends UsuarioController {
    
    public function main(){

        echo '
		<div class="row">';
        echo '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">';
        
        if(isset($_GET['edit'])){
            $this->edit();
        }
//         $this->add();
        $this->fetch();
        
        echo '</div>';
        echo '</div>';
        
    }
    
    
    
    public function edit(){
        if(!isset($_GET['edit'])){
            return;
        }
        $selected = new Usuario();
        $selected->setId($_GET['edit']);
        $this->dao->fillById($selected);
        
        if(!isset($_POST['edit_usuario'])){
            $this->view->showEditForm($selected);
            return;
        }
        
        if (! (isset ( $_POST ['nivel'] ))) {
            echo "Incompleto";
            return;
        }
        
        $selected->setNivel ( $_POST ['nivel'] );
        
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
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=usuario">';
        
    }

	public function __construct(){
		$this->dao = new UsuarioCustomDAO();
		$this->view = new UsuarioCustomView();
	}
	
	public function fazerLogin(){
	    if (!isset($_POST['logar'])) {
	        return;
	    }
	    
	    $usuario = new Usuario();
	    $usuario->setLogin($_POST['usuario']);
	    $usuario->setSenha(md5($_POST['senha']));
	    
	    if ($this->dao->autenticar($usuario)) {
	        
	        $sessao = new Sessao();
	        $sessao->criaSessao($usuario->getId(), $usuario->getNivel(), $usuario->getLogin(), $usuario->getNome(), $usuario->getEmail());
	        
	        echo '
<div class="alert alert-success" role="alert">
  Login realizado com Sucesso
</div>
';
	        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php">';
	    } else {
	        echo '
<div class="alert alert-danger" role="alert">
  Você errou a senha! Tente novamente!
</div>
	            
';
	    }
	}
	public function telaLogin(){
	    echo '
	        
<div class="card mb-4">
    <div class="card-body">';
	    $this->fazerLogin();
	    $this->view->formLogin();
	    echo '<br><br><br><br><br><br><br><br><br>
    </div>
</div>';
	}
	
	

	        
}
?>