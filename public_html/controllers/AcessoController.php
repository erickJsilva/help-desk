<?php
//essa pagina recebe os dados de envio do formulário
//redirecionamento de usuários 
// 0 = omnismart 
// 1 = suporte 
// 2 = usuario problema
    class AcessoController extends Controller
    {
        public function process($params)
        {
            $objLogin = new UsuarioLogin();
           //$login->estaLogado(false);
            $this->head['title'] = "Acesso";
            if(isset($_POST['email']) && isset($_POST['senha']))
            {
                $login = $_POST['email'];
                $senha = $_POST['senha'];
                $result = $objLogin->login($login, $senha);
                if($result == true)
                {
                    if($_SESSION['nivel'] == 0)
                    {
                        $this->redirect("omni-smart");
                    }
                    elseif($_SESSION['nivel'] == 1)
                    {
                        $this->redirect("suporte");
                    }
                    else
                    {
                        $this->redirect("usuario-cliente");
                    }
                }
                else
                {
                    // esse else é caso não encontre nem um login ou senha no banco, então redireciona para a página de login com o código de erro 1 
                    $this->redirect("login?e=1");
                }
            }
        }
    }
?>