<?php 
class ListarProblemas{
    // esse metodo abaixo lista para os usuários para o Usuário Omni 
    
    public function listar()
    {
        $result = Db::queryAll("SELECT * FROM problema limit 10 ");
        //return $result;
        foreach ($result as $value) {
        ?>
            <option value="<?php print_r($value['id_problema']); ?>">
                <?php print_r($value['nome']); ?>
                
            </option>  
        <?php  
        }
    }
    
}