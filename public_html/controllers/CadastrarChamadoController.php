<?php class CadastrarChamadoController extends Controller{
    
    public function process($params) {
           session_start();
           if (isset($_SESSION['nivel'])) {
                if (isset ($_POST['btnEnviar'])) 
                {
                    
                    
                   echo  $data = $_POST['data'];
                   echo "<br>";
                   echo $maquina= $_POST['maquina'];
            echo "<br>";
                echo    $problema= $_POST['problema'];
                 echo "<br>";
                 echo   $descricao= $_POST['descricao'];
                  echo "<br>";
                  echo  $id_user=$_POST['id_user'];
                  
                    
                     $cadastrar = new CadastrarChamado();
                     $resultado_cadastro = $cadastrar -> cadastrar ($data,$maquina,$problema,$descricao,$id_user);
                     
                    if ($resultado_cadastro != 0) 
                    {
                        $this -> redirect ('usuario-cliente?e=2');
                    } 
                    else 
                    {
                        echo "Ocorreu algum erro.";
                    }
             
                    
                }
           } 
           else 
           {
               $this -> redirect ('login');
           }
        }
        
    
    
    
}