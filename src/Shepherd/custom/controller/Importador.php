<?php 




namespace Shepherd\custom\controller;


use Shepherd\model\Aluno;

class Importador{
    
    public function main($nomeArquivo){
        // Exemplo de scrip para exibir os nomes obtidos no arquivo CSV de exemplo
        $lista = array();
        $delimitador = ',';
        $cerca = '"';
        
        // Abrir arquivo para leitura
        $f = fopen($nomeArquivo, 'r');
        if ($f) {
            
            // Ler cabecalho do arquivo
            $cabecalho = fgetcsv($f, 0, $delimitador, $cerca);
            
            // Enquanto nao terminar o arquivo
            while (!feof($f)) {
                
                // Ler uma linha do arquivo
                $linha = fgetcsv($f, 0, $delimitador, $cerca);
                if (!$linha) {
                    continue;
                }
                
                // Montar registro com valores indexados pelo cabecalho
                $registro = array_combine($cabecalho, $linha);
                
                // Obtendo o nome
                
                
                if(!isset($registro['Nome'])){
                    $this->erro('<p>Erro na planilha, campo Nome não encontrado</p>');
                    break;
                }
                if(!isset($registro['Matrícula'])){
                    $this->erro('<p>Erro na planilha, campo Matrícula não encontrado</p>');
                    break;
                }
                if(!isset($registro['CPF_Discente'])){
                    $this->erro('<p>Erro na planilha, campo CPF_Discente não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Campus_Curso'])){
                    $this->erro('<p>Erro na planilha, campo Campus_Curso não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Codigo_Curso'])){
                    $this->erro('<p>Erro na planilha, campo Codigo_Curso não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Nome_Curso'])){
                    $this->erro('<p>Erro na planilha, campo Nome_Curso não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Qtd_Disciplinas_20201'])){
                    $this->erro('<p>Erro na planilha, campo Qtd_Disciplinas_20201 não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Cidade_Moradia'])){
                    $this->erro('<p>Erro na planilha, campo Cidade_Moradia não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Estado_Moradia'])){
                    $this->erro('<p>Erro na planilha, campo Estado_Moradia não encontrado</p>');
                    break;
                }
                if(!isset($registro['CEP'])){
                    $this->erro('<p>Erro na planilha, campo CEP não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Endereço'])){
                    $this->erro('<p>Erro na planilha, campo Endereço não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Renda_Per_Capita'])){
                    $this->erro('<p>Erro na planilha, campo Renda_Per_Capita não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Faixa_Renda'])){
                    $this->erro('<p>Erro na planilha, campo Faixa_Renda não encontrado</p>');
                    break;
                }
                
                if(!isset($registro['Codigo_Chip'])){
                    $this->erro('<p>Erro na planilha, campo Codigo_Chip não encontrado</p>');
                    break;
                }
                
                $aluno = new Aluno();
                $aluno->setNome($registro['Nome']);
                $aluno->setMatricula($registro['Matrícula']);
                $aluno->setCpfDiscente($registro['CPF_Discente']);
                $aluno->setCampusCurso($registro['Campus_Curso']);
                $aluno->setCodigoCurso($registro['Codigo_Curso']);
                $aluno->setNomeCurso($registro['Nome_Curso']);
                $aluno->setQtdDisciplinas2021($registro['Qtd_Disciplinas_20201']);
                $aluno->setCidadeMoradia($registro['Cidade_Moradia']);
                $aluno->setEstadoMoradia($registro['Estado_Moradia']);
                $aluno->setCep($registro['CEP']);
                $aluno->setEndereco($registro['Endereço']);
                $aluno->setRendaPerCapta($registro['Renda_Per_Capita']);
                $aluno->setFaixaRenda($registro['Faixa_Renda']);
                $aluno->setCodigoChip($registro['Codigo_Chip']);
                $lista[] = $aluno;
            }
            fclose($f);
        }
        return $lista;
    }
    public function erro($mensagem){
        echo '
<div class="alert alert-danger" role="alert">
'.$mensagem.'<br>
A planilha deve ser salva em CSV(Formato UTF-8) e conter os seguintes campos: <br>
Nome	Matrícula	CPF_Discente	Campus_Curso	Codigo_Curso	Nome_Curso	Qtd_Disciplinas_20201	Cidade_Moradia	Estado_Moradia	CEP	Endereço	Renda_Per_Capita	Faixa_Renda	Codigo_Chip
</div>
';
    }
    
//     public function importar(){
//         $servicoDao = new ServicoDAO();
//         $listaTipo = array();
//         $listaServicos = array();
//         if (($handle = fopen("catalogo.csv", "r")) == FALSE) {
//             echo 'Falha ao tentar abrir a planilha de metas';
//             return;
//         }
//         $i = 0; 
//         while (! feof($handle)) {
//             $line = fgets($handle);
//             if($i == 0){
//                 $i++;
//                 continue;
//             }
            
            
//             if($line == null){
//                 continue;
//             }

//             $linha = explode("|", $line);
//             $servico = new Servico();
            
//             $servico->setId($linha[0]);
//             $servico->setNome($linha[1]);
//             if($servico->getId() != null){
//                 $servicoDao->fillById($servico);
//                 $servico->setNome($linha[1]);
//             }else{
//                 $servicoDao->fillByNome($servico);
//             }
            
//             $servico->setNome($linha[1]);
//             $servico->setDescricao($linha[2]);
//             $servico->setTempoSla(intval($linha[3]));
            
            
//             $tipoAtividade = new TipoAtividade();
//             $tipoAtividade->setNome($linha[4]);
            
//             $tipoDao = new TipoAtividadeDAO($servicoDao->getConnection());
//             $tipoDao->fillByNome($tipoAtividade);
//             if($tipoAtividade->getId() == null){
//                 $tipoDao->insert($tipoAtividade);
//                 $tipoAtividade->setId($tipoDao->getConnection()->lastInsertId());
//             }
//             $servico->setTipoAtividade($tipoAtividade);
//             $servico->setVisao(1);
            
//             $grupoServico = new GrupoServico();
//             $grupoServico->setNome($linha[5]);
            
//             $grupoDao = new GrupoServicoDAO($servicoDao->getConnection());
//             $grupoDao->fillByNome($grupoServico);
//             if($grupoServico->getId() == null){
//                 $grupoDao->insert($grupoServico);
//                 $grupoServico->setId($grupoDao->getConnection()->lastInsertId());
//             }
            
            
//             $servico->setGrupoServico($grupoServico);
            
//             $areaResponsavel = new AreaResponsavel();
//             $areaResponsavel->setNome($linha[6]);
            
//             if($linha[6] == null || $linha[6] == ''){
//                 $areaResponsavel->setNome("DTI");
//                 $areaResponsavel->setId(1);
//             }else{
//                 $areaDao = new AreaResponsavelDAO($servicoDao->getConnection());
//                 $areaDao->fillByNome($areaResponsavel);
//             }
            
            
//             $servico->setAreaResponsavel($areaResponsavel);
//             $listaServicos[] = $servico;
//         }

//         foreach($listaServicos as $servico){
//             if($servico->getId() == null){
//                 $servicoDao->insert($servico);
//                 $servico->setId($servicoDao->getConnection()->lastInsertId());
//             }else{
//                 $servicoDao->update($servico);
//             }
//         }

        
        
//         $this->showList($listaServicos);
        
        
//     }
//     public function showList($lista){
//         echo '
            
            
            
            
//           <div class="card mb-4">
//                 <div class="card-header">
//                   Lista Servico
//                 </div>
//                 <div class="card-body">
            
            
// 		<div class="table-responsive">
// 			<table class="table table-bordered" id="dataTable" width="100%"
// 				cellspacing="0">
// 				<thead>
// 					<tr>
//                         <th>ID</th>
//                         <th>Nome</th>
//                         <th>Descrição</th>
//                         <th>SLA</th>
// 						<th>Tipo de Atividade</th>
//                         <th>Grupo de Serviços</th>
// 						<th>Setor Responsável</th>

// 					</tr>
// 				</thead>
// 				<tfoot>
// 					<tr>
//                         <th>ID</th>
//                         <th>Nome</th>
//                         <th>Descrição</th>
//                         <th>SLA</th>
// 						<th>Tipo de Atividade</th>
//                         <th>Grupo de Serviços</th>
// 						<th>Setor Responsável</th>

                        
// 					</tr>
// 				</tfoot>
// 				<tbody>';
        
//         foreach($lista as $element){

//             echo '<tr>';
//             echo '<td>'.$element->getId().'</td>';
//             echo '<td>'.$element->getNome().'</td>';
//             echo '<td>'.$element->getDescricao().'</td>';
//             echo '<td>'.$element->getTempoSla().'</td>';
//             echo '<td>'.$element->getTipoAtividade()->getNome().'</td>';
//             echo '<td>'.$element->getGrupoServico()->getNome().'</td>';
//             echo '<td>'.$element->getAreaResponsavel()->getNome().'</td>';
//             echo '</tr>';
//         }
        
//         echo '
// 				</tbody>
// 			</table>
// 		</div>
            
            
            
            
//   </div>
// </div>
            
// ';
//     }
    
}


?>