<?php 
//   <input type="hidden"  name="url" value="chamados">
//   <input type="hidden"  name="id_chamado" value="<?php echo $id_chamado;  
// <button type="submit" class="btn btn-primary pull-right" name="btnEnviar">Fechar ticket </button>
class AlterarChamadoController extends Controller
{
   public function process($params)
   {
       session_start();
            if(isset($_SESSION['nivel']))
            {
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
           if(isset($_POST['sltStatus']))
           {
               $status=$_POST['sltStatus'];
               $id=$_POST['id_chamado'];
               $pag=$_POST['url'];
               
               $atualiza=new AtualizarChamado();
               $result=$atualiza->alterar($status,$id);
               if($result==1)
               {
                    header("location: $pag?e=3");    
               }
           }   
   }
   
}
?>