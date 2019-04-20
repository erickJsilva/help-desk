<?php
    class OmniSmartController extends Controller
    {
        public function process($params)
        {
            session_start();
            if(isset($_SESSION['nivel']))
            {
               // Adicionar as variaveis title e description para serem mostradas na pagina
                $this->head['title'] = "Omni Smart ";
                $this->head['description'] = "Bem vindo usuário Omni ! ";
                // Chama o view para ser mostrado.
                $this->view = 'omnismart';   
                

                //isso sairá daqui é só para atualizar os dados por enquanto 
               
               /* if($testeExibicao['nivel_user']==1)
                {
                    echo "suporte";      
                }
                else if($testeExibicao['nivel_user']==0)
                {
                        echo "OMNI DESK ! HUHU";      
                }
                else if($testeExibicao['nivel_user']==2)
                {
                        echo "Usuário problema ! vamos que vamos problema ";      
                } */
            }
            else
            {
                $this->redirect('login');
            }
        }
    }
?>
