<?php
            
/**
 * Classe de visao para Usuario
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace Shepherd\custom\view;
use Shepherd\view\UsuarioView;
use Shepherd\model\Usuario;
use Shepherd\util\Sessao;


class UsuarioCustomView extends UsuarioView {
    
    
    
    public function showEditForm(Usuario $selecionado) {
        echo '
            
            
            
<div class="card o-hidden border-0 shadow-lg mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Alterar Nível De Acesso</h6>
        </div>
        <div class="card-body">
            
            <form class="user" method="post" id="edit_form_usuario">
                
                <div class="form-group">
                    <select name="nivel" class="form-control"  required>
                        ';
        if($selecionado->getNivel() == Sessao::NIVEL_ADM){
            echo '    
                        <option value="">Selecione o nível de acesso</option>
                        <option value="'.Sessao::NIVEL_ADM.'" selected>Nível Administrador</option>
                        <option value="'.Sessao::NIVEL_COMUM.'">Nível Padrão</option>

';
        }else if($selecionado->getNivel() == Sessao::NIVEL_COMUM){
            echo '
                        <option value="">Selecione o nível de acesso</option>
                        <option value="'.Sessao::NIVEL_ADM.'" >Nível Administrador</option>
                        <option value="'.Sessao::NIVEL_COMUM.'" selected>Nível Padrão</option>
                            
';
        }else{
            echo '
                        <option value="" selected>Selecione o nível de acesso</option>
                        <option value="'.Sessao::NIVEL_ADM.'" >Nível Administrador</option>
                        <option value="'.Sessao::NIVEL_COMUM.'" >Nível Padrão</option>
                            
';
        }
        
        echo '
                      
                      
            
                      
                    </select>
				</div>
                <input type="hidden" value="1" name="edit_usuario">
                </form>
                                                
        </div>
        <div class="modal-footer">
            <button form="edit_form_usuario" type="submit" class="btn btn-primary">Alterar</button>
        </div>
    </div>
</div>
                                                
                                                
                                                
                                                
						              ';
    }
    
    
    public function showList($lista){
        echo '
            
            
            
            
          <div class="card">
                <div class="card-header">
                  Lista Usuario
                </div>
                <div class="card-body">
            
            
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Login</th>
                        <th>Ações</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Login</th>
                        <th>Ações</th>
					</tr>
				</tfoot>
				<tbody>';
        
        foreach($lista as $element){
            echo '<tr>';
            echo '<td>'.$element->getId().'</td>';
            echo '<td>'.$element->getNome().'</td>';
            echo '<td>'.$element->getEmail().'</td>';
            echo '<td>'.$element->getLogin().'</td>';
            echo '<td>
                        <a href="?page=usuario&edit='.$element->getId().'" class="btn btn-success text-white">Editar Nível</a>
                        
                      </td>';
            echo '</tr>';
        }
        
        echo '
				</tbody>
			</table>
		</div>
            
            
            
            
  </div>
</div>
            
';
    }
    
    
    public function formLogin(){
        echo '
            
 <div id="login">
        <h3 class="text-center text-info pt-5">Entrar no Shepherd. </h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post" action=".">
                            <div class="form-group">
                                <label for="usuario" class="text-info">Usuario:</label><br>
                                <input type="text" id="usuario"  class="form-control" size="350" name="usuario" autofocus="autofocus">
                            </div>
                            <div class="form-group">
                                <label for="senha" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" size="100" id="senha" class="form-control" autocomplete="on">
                            </div>
                            <div class="form-group">
                                <br>
                                <input type="submit" class="btn btn-info btn-md" name="logar" value="Entrar">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="https://dti.unilab.edu.br" class="text-info">Visitar a página da DTI</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
                ';
    }
    


}