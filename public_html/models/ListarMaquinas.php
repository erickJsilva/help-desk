<?php 
class ListarMaquinas{
    // esse metodo abaixo lista para os usuários para o Usuário Omni 
    
    public function listar()
    {
        $result = Db::queryAll("SELECT * FROM maquina limit 10 ");
        //return $result;
        foreach ($result as $value) {
        ?>
            <option value="<?php print_r($value['id_maquina']); ?>">
                <span><?php print_r($value['endereco']); ?></span>
                <span><?php print_r($value['fabricante']); ?></span>
            </option>  
        <?php  
        }
    }
    
}