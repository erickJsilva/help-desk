<?php 
class CadastrarUsuarioController extends Controller{
   public function process($params)
   {
        session_start();
        if (isset($_SESSION['nivel'])) 
        {
            $this -> head ['title'] = "Cadastrar usuários";
            $cadastrar=new CadastrarUsuario();
            if($_SESSION['nivel']==1){
                $this -> view = 'cadastrarusuario';
            }
            if($_SESSION['nivel']==0){
                $this -> view = 'cadastrarusuario';
            }
            if(isset($_POST['txtNome']))
            {
                $nome= $_POST['txtNome'];
                $login=$_POST['txtLogin'];
                $senha=$_POST['txtSenha'];
                $nivel_user=$_POST['sltNivel'];
                $pag=$_POST['url'];
                
                if(empty($nome))
                {
                    echo $nome;
                    echo "algum campo está vazios"; 
                }
                else
                {
                 $verifica=$cadastrar->verifica($login,$senha);   
                    if(empty($verifica))
                    {
                        $resultado_cadastro=$cadastrar->cadastrar($nome,$login,$senha,$nivel_user);
                        var_dump($resultado_cadastro);
                        if($resultado_cadastro != 0)
                        {
                            echo"cadastrou o usuario ! HUHU ";
                            $this->redirect("cadastrar-usuario?e=2");
                        }
                        else
                        {
                            echo "Nao foi";
                        }
                    }
                    else
                    {
                        echo "ja tem alguém cadastrado com esse login e senha. ! Verifique ";
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
