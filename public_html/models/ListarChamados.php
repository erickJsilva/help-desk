<?php 
class ListarChamados{
    // esse metodo abaixo lista para os usuários para o Usuário Omni 
    public function listarChamadosCLiente($id)
    {
        $result = Db::queryAll("SELECT c.data, c.id_chamado, c.descricao, m.endereco, m.fabricante, u.nome, u.nivel_user, p.nome, s.nome FROM chamado as c, maquina as m, usuario as u, problema as p, status_chamado as s where m.id_maquina=c.id_maquina and p.id_problema=c.id_problema and s.id_status=c.id_status and c.id_usuario_problema=u.id_usuario and c.id_usuario_problema=? order by c.data limit 20 ",array($id));
          foreach ($result as $value) {
        ?>
                     <tr>
                        <td class="text-center">
                            <?php print_r($value[1]);?>
                        </td>
                        <td>
                            <?php $data= $value[0]; echo date('d/m/Y',strtotime($data));?>
                        </td>
                        <td>
                            <span>
                                <?php print_r($value[3]);?>
                            </span>
                            <span>
                                <?php print_r($value[4]);?>
                            </span>
                        </td>
                        <td>
                            <span><?php print_r($value[7]);?></span>
                        </td>
                        <td>
                            <span><?php print_r($value[2]);?></span>
                        </td>
                        <td>
                            <span><?php print_r($value[8]);?></span>
                        </td>
                        <td>
                            <span>
                                <a href="chamados?id=<?php print_r($value[1])?>">
                                    <i class="material-icons md-18">pageview</i>
                                </a> 
                            </span>
                        </td>
                     </tr>
                     <?php  
        }
    }
    
    
    
    
    public function listarChamadosSuporte()
    {
        $result = Db::queryAll("SELECT c.data, c.id_chamado, c.descricao, m.endereco, m.fabricante, u.nome, u.nivel_user, p.nome, s.nome FROM chamado as c, maquina as m, usuario as u, problema as p, status_chamado as s where m.id_maquina=c.id_maquina and p.id_problema=c.id_problema and s.id_status=c.id_status and c.id_usuario_problema=u.id_usuario order by c.data limit 10 ");
          foreach ($result as $value) {
        ?>
                     <tr>
                        <td class="text-center">
                            <?php print_r($value[1]);?>
                        </td>
                        <td>
                            <span><?php print_r($value[5]);?></span>
                        </td>
                        <td>
                            <?php $data= $value[0]; echo date('d/m/Y',strtotime($data));?>
                        </td>
                        <td>
                            <span>
                                <?php print_r($value[3]);?>
                            </span>
                            <span>
                                <?php print_r($value[4]);?>
                            </span>
                        </td>
                        <td>
                            <span><?php print_r($value[7]);?></span>
                        </td>
                        <td>
                            <span><?php print_r($value[8]);?></span>
                        </td>
                        <td>
                            <span>
                                <a href="chamados?id=<?php print_r($value[1])?>">
                                    <i class="material-icons md-18">pageview</i>
                                </a> 
                            </span>
                        </td>
                     </tr>
                     <?php  
        }
    }
    public function listarChamadoEspecifico($id_chamado,$id)
    {
        $result = Db::queryAll("SELECT c.data, c.id_chamado, c.descricao, m.endereco, m.fabricante, u.nome, u.nivel_user, p.nome, s.nome FROM chamado as c, maquina as m, usuario as u, problema as p, status_chamado as s where m.id_maquina=c.id_maquina and p.id_problema=c.id_problema and s.id_status=c.id_status and u.id_usuario=? and c.id_chamado=? limit 20 ",array($id,$id_chamado));
        return($result);
    }
    
    
    
}