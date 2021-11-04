<?php
            
/**
 * Classe de visao para Planilha
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace Shepherd\view;
use Shepherd\model\Planilha;


class PlanilhaView {
    public function showInsertForm() {
		echo '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#modalAddPlanilha">
  Adicionar
</button>

<!-- Modal -->
<div class="modal fade" id="modalAddPlanilha" tabindex="-1" role="dialog" aria-labelledby="labelAddPlanilha" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelAddPlanilha">Adicionar Planilha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insert_form_planilha" class="user" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="enviar_planilha" value="1">                



                                        <div class="form-group">
                                            <label for="rotulo">Rotulo</label>
                                            <input type="text" class="form-control"  name="rotulo" id="rotulo" placeholder="Rotulo">
                                        </div>

                                        <div class="form-group">
                                            <label for="arquivo">Arquivo</label>
                                            <input type="file" class="form-control"  name="arquivo" id="arquivo"  accept="image/png, image/jpeg">
                                        </div>

                                        <div class="form-group">
                                            <label for="data_upload">Data Upload</label>
                                            <input type="datetime-local" class="form-control"  name="data_upload" id="data_upload" placeholder="Data Upload">
                                        </div>

						              </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button form="insert_form_planilha" type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
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
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Rotulo</th>
						<th>Arquivo</th>
						<th>Data Upload</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Id</th>
                        <th>Rotulo</th>
                        <th>Arquivo</th>
                        <th>Data Upload</th>
                        <th>Actions</th>
					</tr>
				</tfoot>
				<tbody>';
            
            foreach($lista as $element){
                echo '<tr>';
                echo '<td>'.$element->getId().'</td>';
                echo '<td>'.$element->getRotulo().'</td>';
                echo '<td>'.$element->getArquivo().'</td>';
                echo '<td>'.$element->getDataUpload().'</td>';
                echo '<td>
                        <a href="?page=planilha&select='.$element->getId().'" class="btn btn-info text-white">Select</a>
                        <a href="?page=planilha&edit='.$element->getId().'" class="btn btn-success text-white">Edit</a>
                        <a href="?page=planilha&delete='.$element->getId().'" class="btn btn-danger text-white">Delete</a>
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
            

            
	public function showEditForm(Planilha $selecionado) {
		echo '
	    
	    

<div class="card o-hidden border-0 shadow-lg mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Planilha</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" id="edit_form_planilha">
                                        <div class="form-group">
                                            <label for="rotulo">Rotulo</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getRotulo().'"  name="rotulo" id="rotulo" placeholder="Rotulo">
                						</div>
                                        <div class="form-group">
                                            <label for="arquivo">Arquivo</label>
                                            <input type="file" class="form-control" value="'.$selecionado->getArquivo().'"  name="arquivo" id="arquivo" placeholder="Arquivo">
                						</div>
                                        <div class="form-group">
                                            <label for="data_upload">Data Upload</label>
                                            <input type="datetime-local" class="form-control" value="'.$selecionado->getDataUpload().'"  name="data_upload" id="data_upload" placeholder="Data Upload">
                						</div>
                <input type="hidden" value="1" name="edit_planilha">
                </form>

        </div>
        <div class="modal-footer">
            <button form="edit_form_planilha" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>

	    

										
						              ';
	}




            
        public function showSelected(Planilha $planilha){
            echo '
            
	<div class="card o-hidden border-0 shadow-lg">
        <div class="card">
            <div class="card-header">
                  Planilha selecionado
            </div>
            <div class="card-body">
                Id: '.$planilha->getId().'<br>
                Rotulo: '.$planilha->getRotulo().'<br>
                Arquivo: '.$planilha->getArquivo().'<br>
                Data Upload: '.$planilha->getDataUpload().'<br>
            
            </div>
        </div>
    </div>
            
            
';
    }


                                            
    public function confirmDelete(Planilha $planilha) {
		echo '
        
        
        
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
        
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Delete Planilha</h1>
									</div>
						              <form class="user" method="post">                    Are you sure you want to delete this object?

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Delete" name="delete_planilha">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
                                            
	</div>';
	}
                      


    public function showAlunos(Planilha $planilha){
        echo '
        
    	<div class="card o-hidden border-0 shadow-lg">
              <div class="card">
                <div class="card-header">
                  Aluno do Planilha
                </div>
                <div class="card-body">
                      
                      
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>id</th>
						<th>nome</th>
						<th>matricula</th><th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>matricula</th><th>Actions</th>
					</tr>
				</tfoot>
				<tbody>';
                
            foreach($planilha->getAlunos() as $element){
                echo '<tr>';
                echo '<td>'.$element->getId().'</td>';
                echo '<td>'.$element->getNome().'</td>';
                echo '<td>'.$element->getMatricula().'</td>';echo '<td>
                        <a href="?page=aluno&select='.$element->getId().'" class="btn btn-info">Selecionar</a>
                        <a href="?page=planilha&select='.$planilha->getId().'&remover_aluno='.$element->getId().'" class="btn btn-danger">Remover</a>
                      </td>';
                echo '<tr>';
            }
                
        echo '
				</tbody>
			</table>
		</div>
                
                
                
                
      </div>
  </div>
</div>
                
                
                
        ';
                
    }
                

}