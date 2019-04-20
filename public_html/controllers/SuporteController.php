<?php
class SuporteController extends Controller{
     public function process($params)
        {
            session_start();
            if(isset($_SESSION['nivel']))
            {
               // Adicionar as variaveis title e description para serem mostradas na pagina
                $this->head['title'] = "Suporte da Omni Desk ";
                $this->head['description'] = "Seja Bem vindo ! ";
                // Chama o view para ser mostrado.
                $this->view = 'usuariosuporte';   
            }
            else
            {
                $this->redirect('login');
            }
        }
    
}
