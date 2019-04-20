<?php 
class ListarDepartamento{
    // esse metodo abaixo lista para os usuários para o Usuário Omni 
    public function listar()
    {
        $result = Db::queryAll("SELECT id_departamento, nome FROM departamento limit 10 ");
        //return $result;
        foreach ($result as $value) 
        {
            ?>
                <option value="<?php print_r($value['id_departamento']); ?>">
                    <?php print_r($value['nome']); ?>
                </option>
            <?php  
        }
    }
}