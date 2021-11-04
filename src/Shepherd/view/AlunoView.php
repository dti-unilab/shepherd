<?php
            
/**
 * Classe de visao para Aluno
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace Shepherd\view;
use Shepherd\model\Aluno;


class AlunoView {
    public function showInsertForm($listaPlanilha) {
		echo '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#modalAddAluno">
  Adicionar
</button>

<!-- Modal -->
<div class="modal fade" id="modalAddAluno" tabindex="-1" role="dialog" aria-labelledby="labelAddAluno" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelAddAluno">Adicionar Aluno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insert_form_aluno" class="user" method="post">
            <input type="hidden" name="enviar_aluno" value="1">                



                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control"  name="nome" id="nome" placeholder="Nome">
                                        </div>

                                        <div class="form-group">
                                            <label for="matricula">Matricula</label>
                                            <input type="text" class="form-control"  name="matricula" id="matricula" placeholder="Matricula">
                                        </div>

                                        <div class="form-group">
                                            <label for="cpf_discente">Cpf Discente</label>
                                            <input type="text" class="form-control"  name="cpf_discente" id="cpf_discente" placeholder="Cpf Discente">
                                        </div>

                                        <div class="form-group">
                                            <label for="campus_curso">Campus Curso</label>
                                            <input type="text" class="form-control"  name="campus_curso" id="campus_curso" placeholder="Campus Curso">
                                        </div>

                                        <div class="form-group">
                                            <label for="codigo_curso">Codigo Curso</label>
                                            <input type="text" class="form-control"  name="codigo_curso" id="codigo_curso" placeholder="Codigo Curso">
                                        </div>

                                        <div class="form-group">
                                            <label for="nome_curso">Nome Curso</label>
                                            <input type="text" class="form-control"  name="nome_curso" id="nome_curso" placeholder="Nome Curso">
                                        </div>

                                        <div class="form-group">
                                            <label for="qtd_disciplinas2021">Qtd Disciplinas2021</label>
                                            <input type="number" class="form-control"  name="qtd_disciplinas2021" id="qtd_disciplinas2021" placeholder="Qtd Disciplinas2021">
                                        </div>

                                        <div class="form-group">
                                            <label for="cidade_moradia">Cidade Moradia</label>
                                            <input type="text" class="form-control"  name="cidade_moradia" id="cidade_moradia" placeholder="Cidade Moradia">
                                        </div>

                                        <div class="form-group">
                                            <label for="estado_moradia">Estado Moradia</label>
                                            <input type="text" class="form-control"  name="estado_moradia" id="estado_moradia" placeholder="Estado Moradia">
                                        </div>

                                        <div class="form-group">
                                            <label for="cep">Cep</label>
                                            <input type="text" class="form-control"  name="cep" id="cep" placeholder="Cep">
                                        </div>

                                        <div class="form-group">
                                            <label for="endereco">Endereco</label>
                                            <input type="text" class="form-control"  name="endereco" id="endereco" placeholder="Endereco">
                                        </div>

                                        <div class="form-group">
                                            <label for="renda_per_capta">Renda Per Capta</label>
                                            <input type="number" class="form-control" step="0.01" name="renda_per_capta" id="renda_per_capta" placeholder="Renda Per Capta">
                                        </div>

                                        <div class="form-group">
                                            <label for="faixa_renda">Faixa Renda</label>
                                            <input type="text" class="form-control"  name="faixa_renda" id="faixa_renda" placeholder="Faixa Renda">
                                        </div>

                                        <div class="form-group">
                                            <label for="codigo_chip">Codigo Chip</label>
                                            <input type="text" class="form-control"  name="codigo_chip" id="codigo_chip" placeholder="Codigo Chip">
                                        </div>
                                        <div class="form-group">
                                          <label for="planilha">Planilha</label>
                						  <select class="form-control" id="planilha" name="planilha">
                                            <option value="">Selecione o Planilha</option>';
                                                
        foreach( $listaPlanilha as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
                
        echo '
                                          </select>
                						</div>

						              </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button form="insert_form_aluno" type="submit" class="btn btn-primary">Cadastrar</button>
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
                  Lista Aluno
                </div>
                <div class="card-body">
                                            
                                            
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Matricula</th>
						<th>Cpf Discente</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Matricula</th>
                        <th>Cpf Discente</th>
                        <th>Actions</th>
					</tr>
				</tfoot>
				<tbody>';
            
            foreach($lista as $element){
                echo '<tr>';
                echo '<td>'.$element->getId().'</td>';
                echo '<td>'.$element->getNome().'</td>';
                echo '<td>'.$element->getMatricula().'</td>';
                echo '<td>'.$element->getCpfDiscente().'</td>';
                echo '<td>
                        <a href="?page=aluno&select='.$element->getId().'" class="btn btn-info text-white">Select</a>
                        <a href="?page=aluno&edit='.$element->getId().'" class="btn btn-success text-white">Edit</a>
                        <a href="?page=aluno&delete='.$element->getId().'" class="btn btn-danger text-white">Delete</a>
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
            

            
	public function showEditForm(Aluno $selecionado) {
		echo '
	    
	    

<div class="card o-hidden border-0 shadow-lg mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Aluno</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" id="edit_form_aluno">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getNome().'"  name="nome" id="nome" placeholder="Nome">
                						</div>
                                        <div class="form-group">
                                            <label for="matricula">Matricula</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getMatricula().'"  name="matricula" id="matricula" placeholder="Matricula">
                						</div>
                                        <div class="form-group">
                                            <label for="cpf_discente">Cpf Discente</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getCpfDiscente().'"  name="cpf_discente" id="cpf_discente" placeholder="Cpf Discente">
                						</div>
                                        <div class="form-group">
                                            <label for="campus_curso">Campus Curso</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getCampusCurso().'"  name="campus_curso" id="campus_curso" placeholder="Campus Curso">
                						</div>
                                        <div class="form-group">
                                            <label for="codigo_curso">Codigo Curso</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getCodigoCurso().'"  name="codigo_curso" id="codigo_curso" placeholder="Codigo Curso">
                						</div>
                                        <div class="form-group">
                                            <label for="nome_curso">Nome Curso</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getNomeCurso().'"  name="nome_curso" id="nome_curso" placeholder="Nome Curso">
                						</div>
                                        <div class="form-group">
                                            <label for="qtd_disciplinas2021">Qtd Disciplinas2021</label>
                                            <input type="number" class="form-control" value="'.$selecionado->getQtdDisciplinas2021().'"  name="qtd_disciplinas2021" id="qtd_disciplinas2021" placeholder="Qtd Disciplinas2021">
                						</div>
                                        <div class="form-group">
                                            <label for="cidade_moradia">Cidade Moradia</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getCidadeMoradia().'"  name="cidade_moradia" id="cidade_moradia" placeholder="Cidade Moradia">
                						</div>
                                        <div class="form-group">
                                            <label for="estado_moradia">Estado Moradia</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getEstadoMoradia().'"  name="estado_moradia" id="estado_moradia" placeholder="Estado Moradia">
                						</div>
                                        <div class="form-group">
                                            <label for="cep">Cep</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getCep().'"  name="cep" id="cep" placeholder="Cep">
                						</div>
                                        <div class="form-group">
                                            <label for="endereco">Endereco</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getEndereco().'"  name="endereco" id="endereco" placeholder="Endereco">
                						</div>
                                        <div class="form-group">
                                            <label for="renda_per_capta">Renda Per Capta</label>
                                            <input type="number" class="form-control" value="'.$selecionado->getRendaPerCapta().'"  name="renda_per_capta" id="renda_per_capta" placeholder="Renda Per Capta">
                						</div>
                                        <div class="form-group">
                                            <label for="faixa_renda">Faixa Renda</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getFaixaRenda().'"  name="faixa_renda" id="faixa_renda" placeholder="Faixa Renda">
                						</div>
                                        <div class="form-group">
                                            <label for="codigo_chip">Codigo Chip</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getCodigoChip().'"  name="codigo_chip" id="codigo_chip" placeholder="Codigo Chip">
                						</div>
                <input type="hidden" value="1" name="edit_aluno">
                </form>

        </div>
        <div class="modal-footer">
            <button form="edit_form_aluno" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>

	    

										
						              ';
	}




            
        public function showSelected(Aluno $aluno){
            echo '
            
	<div class="card o-hidden border-0 shadow-lg">
        <div class="card">
            <div class="card-header">
                  Aluno selecionado
            </div>
            <div class="card-body">
                Id: '.$aluno->getId().'<br>
                Nome: '.$aluno->getNome().'<br>
                Matricula: '.$aluno->getMatricula().'<br>
                Cpf Discente: '.$aluno->getCpfDiscente().'<br>
                Campus Curso: '.$aluno->getCampusCurso().'<br>
                Codigo Curso: '.$aluno->getCodigoCurso().'<br>
                Nome Curso: '.$aluno->getNomeCurso().'<br>
                Qtd Disciplinas2021: '.$aluno->getQtdDisciplinas2021().'<br>
                Cidade Moradia: '.$aluno->getCidadeMoradia().'<br>
                Estado Moradia: '.$aluno->getEstadoMoradia().'<br>
                Cep: '.$aluno->getCep().'<br>
                Endereco: '.$aluno->getEndereco().'<br>
                Renda Per Capta: '.$aluno->getRendaPerCapta().'<br>
                Faixa Renda: '.$aluno->getFaixaRenda().'<br>
                Codigo Chip: '.$aluno->getCodigoChip().'<br>
            
            </div>
        </div>
    </div>
            
            
';
    }


                                            
    public function confirmDelete(Aluno $aluno) {
		echo '
        
        
        
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
        
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Delete Aluno</h1>
									</div>
						              <form class="user" method="post">                    Are you sure you want to delete this object?

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Delete" name="delete_aluno">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
                                            
	</div>';
	}
                      


}