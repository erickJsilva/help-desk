<?php 
class CadastrarMaquina{
    public function verifica($ip,$mac,$endereco)
    {
        $result=Db::queryAll("SELECT * FROM maquina WHERE ipv4=? or mac=? or endereco=? ",array($ip,$mac,$endereco));
        return $result; 
    }
    public function cadastrar($ip,$mac,$endereco, $fabricante, $departamento)
    {
        
        $result = Db::queryCount("INSERT INTO maquina (ipv4,mac,endereco, fabricante, id_departamento)  VALUES (?, ?, ?, ?,?)", array($ip,$mac,$endereco, $fabricante, $departamento));
        return($result);
    }
}

?>








