<?php 
class CadastrarMaquinasController extends Controller{
    public function process($params)
    {
        session_start();
        
           if (isset($_SESSION['nivel'])) 
           {
                $this -> head ['title'] = "Cadastrar Maquinas";
                $this -> view = 'cadastrarmaquina';
                
               if (isset ($_POST['btnEnviar'])) 
                {
                    $endereco = $_POST['txtEndereco'];
                    $ip=$_POST['txtIpv4'];
                    $mac=$_POST['txtMac'];
                   $fabricante=$_POST['txtFabricante'];
                    $departamento=$_POST['sltDepartamento'];
                    
                    $cadastrar = new CadastrarMaquina();
                    
                    if (empty ($endereco)) 
                    {
                        echo "Campo vazio!";
                    }
                    else 
                    {
                        $verifica = $cadastrar -> verifica ($ip,$mac,$endereco);
                        var_dump($verifica);
                        if (empty ($verifica)) 
                        {
                            $resultado_cadastro = $cadastrar -> cadastrar ($ip,$mac,$endereco, $fabricante, $departamento);
                            var_dump($resultado_cadastro);
                            if ($resultado_cadastro != 0) {
                                $this -> redirect ('cadastrar-maquinas?e=2');
                            } else {
                                echo "Ocorreu algum erro.";
                            }
                        } 
                        else 
                        {
                            echo "Já existe departamento cadastrado com este nome.";
                        } 
                    } 
                } 
           } 
           else 
           {
               $this -> redirect ('login');
           }
    }
}
?>
           