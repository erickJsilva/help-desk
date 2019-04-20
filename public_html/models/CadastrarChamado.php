<?php
class CadastrarChamado{
    /*public function verifica($login,$senha)
    {
        $result=Db::queryAll("SELECT * FROM usuario WHERE login=? and senha=?",array($login,$senha));
        return $result; 
    } */
    public function cadastrar($data,$maquina,$problema,$descricao,$id_user)
    {
        $id_status=1;
        //INSERT INTO `chamado` (`id_chamado`, `data`, `id_maquina`, `id_usuario_problema`, `id_problema`, `descricao`) VALUES (NULL, 'hoje', '2', '7', '3', 'de');
        $result = Db::queryCount("INSERT INTO chamado (data,id_maquina,id_usuario_problema, id_problema,descricao,id_status)  VALUES (?, ?, ?, ?,?,?)", array($data,$maquina,$id_user,$problema,$descricao,$id_status));
        return($result);
        
    }
     public function teste()
    {
        echo "teste";

    }
}
?>
