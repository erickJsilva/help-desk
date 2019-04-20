
<?php
    class  ChamadosController extends Controller{
        public function process($params){
            session_start();
            // Adicionar as variaveis title e description para serem mostradas na pagina
            if($_SESSION['nivel'])
            {
                $this->head['title'] = "Omni Smart";
                $this->head['description'] = "Chamados";
                if($_SESSION['nivel']==2)
                {
                    if(!isset($_GET['id']))
                    {
                        $this->view = 'chamados';
                    }
                    else
                    {
                        $this->view = 'chamadoespecifico';
                    }
                    
                }
                if($_SESSION['nivel']==1)
                {
                    if(!isset($_GET['id']))
                    {
                        $this->view = 'chamadossuporte';
                    }
                    else
                    {
                        $this->view = 'chamadoespecificosuporte';
                    }
                    
                }
            }
            else
            {
                $this->redirect('login');
            }
            
        }
    }
?>
