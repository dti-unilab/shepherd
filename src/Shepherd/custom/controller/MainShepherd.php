<?php
namespace Shepherd\custom\controller;

use Shepherd\util\Sessao;

class MainShepherd
{

    public function mainAjax()
    {
        $sessao = new Sessao();
        if ($sessao->getNivelAcesso() == Sessao::NIVEL_DESLOGADO) {
            return;
        } else if ($sessao->getNivelAcesso() == Sessao::NIVEL_COMUM) {
            $this->mainAjaxComum();
        } else if ($sessao->getNivelAcesso() == Sessao::NIVEL_ADM) {
            $this->mainAjaxAdmin();
        }
        
    }
    public function mainAjaxComum(){
        if(!isset($_GET['ajax'])){
            return;
        }
        if($_GET['ajax'] ==  'aluno'){
            $controller = new AlunoCustomController();
            $controller->mainAjax();
        }
    }
    public function mainAjaxAdmin(){
        if(!isset($_GET['ajax'])){
            return;
        }
        switch ($_GET['ajax']) {
            case 'planilha':
                $controller = new PlanilhaCustomController();
                $controller->mainAjax();
                break;
            case 'aluno':
                $controller = new AlunoCustomController();
                $controller->mainAjax();
                break;
            case 'usuario':
                $controller = new UsuarioCustomController();
                $controller->mainAjax();
                break;
            default:
                echo '<p>Página solicitada não encontrada.</p>';
                break;
        }
    }

    public function main()
    {
        $sessao = new Sessao();
        if ($sessao->getNivelAcesso() == Sessao::NIVEL_DESLOGADO) {
            $usuarioController = new UsuarioCustomController();
            $usuarioController->telaLogin();
            return;
        } else if ($sessao->getNivelAcesso() == Sessao::NIVEL_COMUM) {
            $this->comumApp();
        } else if ($sessao->getNivelAcesso() == Sessao::NIVEL_ADM) {
            $this->adminApp();
        }
    }

    public function comumApp()
    {
        $alunoController = new AlunoCustomController();
        $alunoController->main();
    }

    public function adminApp()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'planilha':
                    $controller = new PlanilhaCustomController();
                    $controller->main();
                    break;
                case 'aluno':
                    $controller = new AlunoCustomController();
                    $controller->main();
                    break;
                case 'usuario':
                    $controller = new UsuarioCustomController();
                    $controller->main();
                    break;
                default:
                    echo '<p>Página solicitada não encontrada.</p>';
                    break;
            }
        } else {
            $controller = new PlanilhaCustomController();
            $controller->main();
        }
    }
}