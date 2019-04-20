<?php 
class AtualizarUsuarios{
    public function alterar($nivel_user,$id)
        {
            try{
		        $result = Db::queryCount("UPDATE usuario SET nivel_user=? WHERE id_usuario=?", array($nivel_user, $id));
		        return($result);
            }
            catch (Exception $e) {
                   echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            }
		}
}
