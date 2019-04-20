<?php
    
    class CadastrarDepartamento {
        public function verifica ($nome) {
            $result = Db::queryAll ("SELECT nome FROM departamento WHERE nome = ?", array ($nome));
            return ($result);
        }
        
        public function cadastrar ($nome,$descricao) {
            $result = Db::queryCount ("INSERT INTO departamento (nome, departamento_descricao) VALUES (?, ?)", array ($nome,$descricao));
            return ($result);
        }
        
    }

?>