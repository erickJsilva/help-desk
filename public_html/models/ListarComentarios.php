<?php 
class ListarComentarios
{
    public function listar($id_usuario,$id_chamado)
    {
        $result = Db::queryAll("SELECT c.id_chamado, cc.id_usuario,u.nome, cc.data,cc.comentario FROM chamado as c, comentario_chamado as cc, usuario as u WHERE c.id_chamado=cc.id_chamado AND cc.id_usuario=u.id_usuario and c.id_chamado=? limit 20 ",array($id_chamado));
        //SELECT c.id_chamado, cc.id_usuario,u.nome, cc.data,cc.comentario FROM chamado as c, comentario_chamado as cc, usuario as u WHERE c.id_chamado=cc.id_chamado AND cc.id_usuario=u.id_usuario and cc.id_usuario=9 and c.id_chamado=5
        
        foreach ($result as $value) {
        ?>
                     <tr>
                        <?php 
                            if($value['id_usuario']==$id_usuario){ ?>
                                <td align="left">
                            <?php }else{?>
                                <td align="right">
                            <?php }?>
                            <span>
                                <?php print_r($value['nome']);?>
                            </span>
                            <br>
                            <span>
                                <?php print_r($value['comentario']);?>
                            </span>
                            <br>
                            <span>
                                <sup><?php print_r($value['data']); ?></sup>
                            </span>    
                        </td>
                    </tr>
                <?php 
        }
    }
    
 //$lista->listar($id_usuario,$id_chamado);   
}