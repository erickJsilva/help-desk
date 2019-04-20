<?php
class CadastrarComentario{
    
    public function cadastrar($id_user,$id_chamado,$data,$descricao)
    {
        //INSERT INTO `chamado` (`id_chamado`, `data`, `id_maquina`, `id_usuario_problema`, `id_problema`, `descricao`) VALUES (NULL, 'hoje', '2', '7', '3', 'de');
        $result = Db::queryCount("INSERT INTO comentario_chamado(id_usuario, id_chamado,data,comentario) VALUES ( ?, ?,?,?)", array($id_user,$id_chamado,$data,$descricao ));
        return($result);
    }
    
    
    public function teste()
    {
        echo "teste";

    }
}
?>
