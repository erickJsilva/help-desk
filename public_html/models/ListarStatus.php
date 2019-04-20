<?php 
class ListarStatus{
    // esse metodo abaixo lista para os usuários para o Usuário Omni 
    public function listar()
    {
        $result = Db::queryAll("SELECT * FROM status_chamado limit 10 ");
        foreach ($result as $value) {
        ?>
            <option value="<?php print_r($value['id_status']); ?>">
                <?php print_r($value['nome']); ?>
            </option>  
        <?php  
        }
    }
    public function listarStatusSuporte()
    {
        $result = Db::queryAll("SELECT * FROM status_chamado limit 10 ");
        foreach ($result as $value) {
        ?>
            <option value="<?php print_r($value['id_status']); ?>">
                <?php print_r($value['nome']); ?>
            </option>  
        <?php  
        }
    }
}