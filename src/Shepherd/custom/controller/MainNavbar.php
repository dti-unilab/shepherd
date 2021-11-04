<?php


namespace Shepherd\custom\controller;
use Shepherd\util\Sessao;

class MainNavbar{
    
    public function main(){
        $sessao = new Sessao();
        if($sessao->getNivelAcesso() == Sessao::NIVEL_ADM){
            echo '

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="./">Shepherd</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?page=planilha">Planilha</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="?page=usuario">Usuário</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="?page=aluno">Gravar Chips</a>
            </li>            
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <a href="./?sair=1" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sair</a>
          </form>
        </div>
</nav>



';
        }
        else if($sessao->getNivelAcesso() == Sessao::NIVEL_COMUM)
        {
            echo '

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="./">Shepherd</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./">Gravar Chips</a>
            </li>            
          </ul>
            <a href="./?sair=1" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sair</a>
        </div>
</nav>




                
';
        }
    }
    
 
    
}