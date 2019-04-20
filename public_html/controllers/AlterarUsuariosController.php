<?php 
class AlterarUsuariosController extends Controller
{
   public function process($params)
   {
       session_start();
            if(isset($_SESSION['nivel']))
            {
               // Adicionar as variaveis title e description para serem mostradas na pagina
                $this->head['title'] = "Alterar Usuário  ";
                $this->head['description'] = "Alteração de dados dos usuários ";
                // Chama o view para ser mostrado.
                $this->view = 'alterarusuario';
                if(isset($_POST['btnEnviar']))
                { 
                    $this->altera();
                }
            }
            else
            {
                $this->redirect('login');
            }
   }
   public function altera()
   {
           if(isset($_POST['sltNivelUsuario']))
           {
               $nivel_user=$_POST['sltNivelUsuario'];
               $id=$_POST['id_usuario'];
               
               $atualiza=new AtualizarUsuarios();
               $result=$atualiza->alterar($nivel_user,$id);
               print_r($result);
               if($result==1)
               {
                    header("location: omni-smart?e=3");    
               }
           }   
   }
   
}
?>