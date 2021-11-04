<?php
            
/**
 * Classe de visao para Aluno
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace Shepherd\custom\view;
use Shepherd\view\AlunoView;


class AlunoCustomView extends AlunoView {

    public function formPesquisa(){
        echo '
<div class="card m-5">
  <div class="card-body">

<div id="alerta_sucesso" class="alert alert-success collapse" role="alert">
    Mensagem de Sucesso
</div>
<div id="alerta_erro" class="alert alert-danger collapse" role="alert">
  Erro
</div>


      <form id="insert_form_aluno" class="user" method="post">
        <input type="hidden" name="enviar_aluno" value="1">        
            
            Passe o leitor para identificar a matrícula do discente.
            
            <div class="form-group">
                <label for="matricula">Selecionar Matrícula:</label>
                <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Matrícula" onKeyDown="bloquear_ctrl_j()">
              </div>
            <div class="form-group collapse" id="campo_codigo_chip">
                <label for="codigo_chip">Matrícula Encontrada Digite o Código do Chip:</label>
                <input type="text" name="codigo_chip" class="form-control" id="codigo_chip" placeholder="Código do Chip" onKeyDown="bloquear_ctrl_j()">
              </div>
            
          </form>
         <button form="insert_form_aluno" type="submit" class="btn btn-primary">Cadastrar</button>
            
  </div>
</div>
            
            
            
            
            
';
    }
    
    
    public function showList($lista){
        echo '
            
            
            
            
          <div class="card">
                <div class="card-header">
                  Listar do Arquivo
                </div>
                <div class="card-body">
            
            
		<div class="table-responsive">
			<table class="table table-bordered" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Matricula</th>
						<th>Código Chip</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Nome</th>
                        <th>Matricula</th>
                        <th>Código Chip</th>
					</tr>
				</tfoot>
				<tbody>';
        
        foreach($lista as $element){
            echo '<tr>';
            echo '<td>'.$element->getNome().'</td>';
            echo '<td>'.$element->getMatricula().'</td>';
            echo '<td>'.$element->getCodigoChip().'</td>';
            
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


}