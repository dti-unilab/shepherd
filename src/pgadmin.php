<?php 

use SimplesAdminPG\AdminPG;
use Shepherd\dao\DAO;
use Shepherd\util\Sessao;
include_once "SimplesAdminPG/AdminPG.php";

define("DB_INI", "../../../3s/shepherd_db.ini");
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

$sessao = new Sessao();
if($sessao->getIdUsuario() == 3375){
    
    $dao = new DAO();
    $conexao = $dao->getConnection();
    AdminPG::main($conexao);
    
}

?>