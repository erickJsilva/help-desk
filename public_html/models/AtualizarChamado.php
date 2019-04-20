<?php 
class AtualizarChamado{
    public function alterar($status,$id)
        {
            try{
		        $result = Db::queryCount("UPDATE chamado SET id_status=? WHERE id_chamado=?", array($status, $id));
		        return($result);
            }
            catch (Exception $e) {
                   echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            }
		}
}
