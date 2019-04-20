<?php
    
    class CadastrarDepartamentoController extends Controller {
        public function process($params) {
           session_start();
           if (isset($_SESSION['nivel'])) {
                $this -> head ['title'] = "Cadastrar departamento";
                $this -> view = 'cadastrardepartamento';
                
                if (isset ($_POST['nome'])) 
                {
                    
                    $nome = $_POST['nome'];
                    $descricao=$_POST['txtDescricao'];
                    $cadastrar = new CadastrarDepartamento();
                    
                    if (empty ($nome)) {
                        echo "Campo vázio!";
                    } else {
                        $verifica = $cadastrar -> verifica ($nome);
                        if (empty ($verifica)) {
                            $resultado_cadastro = $cadastrar -> cadastrar ($nome,$descricao);
                            if ($resultado_cadastro != 0) {
                                $this -> redirect ('cadastrar-departamento?e=2');
                            } else {
                                echo "Ocorreu algum erro.";
                            }
                        } else {
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
