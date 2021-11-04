<?php
            
/**
 * Classe de visao para Planilha
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace Shepherd\custom\view;
use Shepherd\view\PlanilhaView;
use Shepherd\model\Planilha;


class PlanilhaCustomView extends PlanilhaView {

    public function showInsertForm() {
        echo '
<div class="card m-5">
  <div class="card-body">
    <form id="insert_form_planilha" class="user" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="enviar_planilha" value="1">
            
            *Obs: Arquivos que tenham nomes já utilizados serão sobrescritos.<br>
            Utilize o formulário abaixo para adicionar um arquivo CSV.<br><br>  


            <div class="custom-file">
              <input type="file" class="custom-file-input" name="arquivo" id="arquivo" accept=".csv">
              <label class="custom-file-label" for="anexo" data-browse="Anexar">Selecione Um Arquivo CSV</label>
            </div>


          </form>
        <button form="insert_form_planilha" type="submit" class="btn btn-primary m-4">Enviar</button>

  </div>
</div>
          

            
            
            
';
    }

    
    public function showList($lista){
        echo '
            
            
            
            
          <div class="card">
                <div class="card-header">
                  Lista Planilha
                </div>
                <div class="card-body">
            
            
		<div class="table-responsive">
			<table class="table table-bordered" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Rotulo</th>
						<th>Data Upload</th>
                        <th>Ações</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Rotulo</th>
                        <th>Data Upload</th>
                        <th>Ações</th>
					</tr>
				</tfoot>
				<tbody>';
        
        foreach($lista as $element){
            echo '<tr>';
            echo '<td>'.$element->getRotulo().'</td>';
            echo '<td>'.date("d/m/Y",strtotime($element->getDataUpload())).'</td>';
            echo '<td>
                        <a href="?page=planilha&select='.$element->getId().'" class="btn btn-info text-white">Selecionar</a>
                        <a href="?page=planilha&delete='.$element->getId().'" class="btn btn-danger text-white">Deletar</a>
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
    
    
    
    
    public function showSelected(Planilha $planilha){
        if(!isset($_GET['page'])){
            return;
        }
        if(!isset($_GET['select'])){
            return;
        }
        echo '
            
	<div class="card m-4 o-hidden border-0 shadow-lg">
        <div class="card">
            <div class="card-header">
                  Planilha selecionado
            </div>
            <div class="card-body">
                Id: '.$planilha->getId().'<br>
                Rotulo: '.$planilha->getRotulo().'<br>
                Arquivo: '.$planilha->getArquivo().'<br>
                Data Upload: '.$planilha->getDataUpload().'<br>';
        if(!isset($_GET['importar'])){
            if(count($planilha->getAlunos()) == 0){
                echo '<a href="?page=planilha&select='.$_GET['select'].'&importar=1" class="btn btn-primary m-4">Importar</a>';
            }
            
        }
        if(!isset($_GET['exportar'])){
            if(count($planilha->getAlunos()) != 0){
                echo '<a href="?page=planilha&select='.$_GET['select'].'&exportar=1" class="btn btn-success m-4">Exportar</a>';
            }
            
        }
        echo '
                

                
            </div>
        </div>
    </div>
                    
                    
';
    }
    
    
    
    public function showAlunos(Planilha $planilha){
        echo '
            
              <div class="card">
                <div class="card-header">
                    Lista da Base de Dados
                </div>
                <div class="card-body">
            
            
		<div class="table-responsive">
			<table class="table table-bordered" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>nome</th>
						<th>Matrícul</th>
                        <th>Código Chip</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>nome</th>
                        <th>Matrícul</th>
                        <th>Código Chip</th>
					</tr>
				</tfoot>
				<tbody>';
        
        foreach($planilha->getAlunos() as $element){
            echo '<tr>';
            echo '<td>'.$element->getNome().'</td>';
            echo '<td>'.$element->getMatricula().'</td>';
            echo '<td>'.$element->getCodigoChip().'</td>';
            echo '<tr>';
        }
        
        echo '
				</tbody>
			</table>
		</div>
            
            
            
            
      </div>
</div>
            
            
            
        ';
        
    }
    
    public function confirmDelete(Planilha $planilha) {
        echo '
            
            
            
				<div class="card m-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
            
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Deletar Planilha</h1>
									</div>
						              <form class="user" method="post">                   Tem certeza que quer remover esse registro?
            
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Delete" name="delete_planilha">
                                        <hr>
            
						              </form>
            
								</div>
							</div>
						</div>
					</div>
            
            
            
            
	</div>';
    }
    
}