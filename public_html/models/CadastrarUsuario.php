<?php
class CadastrarUsuario{
    public function verifica($login,$senha)
    {
        $result=Db::queryAll("SELECT * FROM usuario WHERE login=? and senha=?",array($login,$senha));
        return $result; 
    }
    public function cadastrar($nome,$login,$senha,$nivel_user)
    {
        $result = Db::queryCount("INSERT INTO usuario ( nome, login, senha, nivel_user)  VALUES (?, ?, ?, ?)", array($nome,$login,$senha,$nivel_user));
        return($result);
    }
}
?>
