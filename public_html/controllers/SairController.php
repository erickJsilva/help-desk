<?php
    class SairController extends Controller{
        public function process($params){
            $usuario = new UsuarioLogin();
            $usuario->sair();
            $this->redirect('login');
        }
    }
?>