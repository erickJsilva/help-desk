<?php
    class LoginController extends Controller{
        public function process($params){
            // Adicionar as variaveis title e description para serem mostradas na pagina
            $this->head['title'] = "Omni Smart";
            $this->head['description'] = "Pagina inicial";
            // Chama o view para ser mostrado.
            $this->view = 'login';
        }
    }
?>