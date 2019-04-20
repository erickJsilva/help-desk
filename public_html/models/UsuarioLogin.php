<?php
    class UsuarioLogin{
        public function login($login, $senha){
            $result = Db::queryOne("SELECT id_usuario, login, senha, nivel_user, nome FROM usuario WHERE login = ?", array($login));
            if($result['senha'] == $senha){
                session_start();
                $_SESSION['id'] = $result['id_usuario'];
                $_SESSION['login'] = $result['login'];
                $_SESSION['senha'] = $result['senha'];
                $_SESSION['nivel'] = $result['nivel_user'];
                return true;
            }else{
                return false;
            }
        }
        public function estaLogado($dentroDoSistema, $nivel = null, $params = null){
           // 0 esse vai para o usuário omni 
           // 1 esse redireciona para o usuario suporte   
           // 2 esse redireciona para o usuario problema 
           
            if(isset($_SESSION['id']) || isset($_SESSION['senha']) || isset($_SESSION['nivel']) )
            {
                if($dentroDoSistema)
                {
                    if($nivel == $_SESSION['nivel'])
                    {
                        if(($nivel == 0) && $params[0] == 'professor')
                        {
                            return true;
                        }
                        else if(($nivel == 1) && $params[0] == 'aluno')
                        {
                            return true;
                        }
                        else
                        {
                            if($nivel == 0){
                                $this->redirect("professor/$params[0]");
                            }else if($nivel == 1){
                                $this->redirect("aluno/$params[0]");
                            }
                        }
                    }
                    else
                    {
                        $this->redirect('login?e=1');
                    }
                }
                else
                {
                    if($_SESSION['nivel'] == 0){
                        $this->redirect("professor");
                    }else if($_SESSION['nivel'] == 1){
                        $this->redirect("menu");
                    }
                }
            }
        }
        public function sair(){
            session_start();
            session_destroy();
        }
        public function redirect($url){
            $url = $this->baseUrl . $url;
            header("Location: /$url");
            header("Connection: close");
            exit;
        }
    }
?>