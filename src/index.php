<?php
date_default_timezone_set('America/Fortaleza');
setlocale(LC_ALL, 'pt_BR');

error_reporting(E_ALL);
ini_set('display_errors', 1);
            
define("DB_INI", "../../../3s/shepherd_db.ini");
define("DB_AUTENTICACAO", "../../../3s/3s_autenticacao_bd.ini");

             
function autoload($classe) {

    $prefix = 'Shepherd';
    $base_dir = 'Shepherd';
    $len = strlen($prefix);
    if (strncmp($prefix, $classe, $len) !== 0) {
        return;
    }
    $relative_class = substr($classe, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }

}
spl_autoload_register('autoload');


use Shepherd\custom\controller\MainShepherd;
use Shepherd\custom\controller\PlanilhaCustomController;
use Shepherd\custom\controller\MainNavbar;
use Shepherd\util\Sessao;

$sessao = new Sessao();
if (isset($_GET["sair"])) {
    $sessao->mataSessao();
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php">';
    
}
$shepherd = new MainShepherd();
if(isset($_GET['ajax'])){
    $shepherd->mainAjax();
    exit(0);
}
if(isset($_GET['exportar'])){
    $controller = new PlanilhaCustomController();
    $controller->exportar();
    exit(0);
}

?>
            
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Shepherd</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>
<?php 

$mainNavBar = new MainNavbar();
$mainNavBar->main();

?>
<br><br><br><br>
	<main role="main">
            

              
        <div class="album py-5 bg-light">
            <div class="container">
            
            
            
<?php

$shepherd->main();
					    
?>
            
            
              </div>
            
            </div>
            
     </main>
            
            
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Voltar ao topo</a>
        </p>
        <p>Software desenvolvido pela DTI.</p>
        
      </div>
    </footer>
            


<!-- Modal -->
<div class="modal fade" id="modalResposta" tabindex="-1" role="dialog" aria-labelledby="labelModalResposta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModalResposta">Resposta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="textoModalResposta"></span>
      </div>
      <div class="modal-footer">
        <button type="button" id="botao-modal-resposta" class="btn btn-primary" data-dismiss="modal">Continuar</button>
      </div>
    </div>
  </div>
</div>



        <script src="vendor/js/jquery-3.5.1.min.js" ></script>
        <script src="vendor/js/popper.min.js" ></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        

        <script src="js/planilha.js" ></script>
        <script src="js/aluno.js?a=12" ></script>
        <script src="js/usuario.js" ></script>
	</body>
</html>