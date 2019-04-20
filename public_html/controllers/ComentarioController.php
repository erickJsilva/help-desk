<?php 
class  ComentarioController extends Controller
{
    public function process($params)
    {
        if(isset($_POST['btnEnviarComentario']))
        {
            
            
            $idUsuario=$_POST['txtUserId'];
            $idChamado=$_POST['txtIdChamado'];
            $idData=$_POST['txtData'];
            $idDescricao=$_POST['txtDescricao'];
            
            //INSERT INTO `comentario_chamado` (`id_comentario_chamado`, `id_usuario`, `id_chamado`, `data`, `comentario`) VALUES (NULL, '9', '3', '', 'teste bd');
            $cadastro=new CadastrarComentario();
            $resultado_cadastro=$cadastro->cadastrar($idUsuario,$idChamado,$idData,$idDescricao);
            
            if($resultado_cadastro != 0)
            {
                $this->redirect("chamados?id=$idChamado");
            }
            else
            {
                echo "Nao foi";
            }
        }
    }

} 

