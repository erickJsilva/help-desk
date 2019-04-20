<?php
    class  UsuarioClienteController extends Controller{
        public function process($params)
        {   session_start();
            if(isset($_SESSION['nivel']))
            {
                // Adicionar as variaveis title e description para serem mostradas na pagina
                $this->head['title'] = "Omni Smart";
                $this->head['description'] = "Pagina inicial";
                // Chama o view para ser mostrado.
                $this->view = 'usuariocliente';
            }
            else
            {
                $this->redirect('login');
            }
        }
    }
?>
