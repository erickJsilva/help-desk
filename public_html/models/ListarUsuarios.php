<?php 
class ListarUsuarios{
    // esse metodo abaixo lista para os usuários para o Usuário Omni 
    
    public function listar(){
        $result = Db::queryAll("SELECT * FROM usuario limit 10 ");
        //return $result;
        foreach ($result as $value) {
        ?>
                     <tr>
                        <td class="text-center"><?php print_r($value['id_usuario']);?></td>
                        <td><?php print_r($value['nome']);?></td>
                        <td><?php print_r($value['login']);?></td>
                        <td class="text-right"><?php 
                           if($value['nivel_user']==0){echo"Usuário Omni";}
                           if($value['nivel_user']==1){echo"Usuário Suporte";}
                           if($value['nivel_user']==2){echo"Usuário Cliente";}
                           if($value['nivel_user']==-1){echo"Usuário Desativado";}
                           ?></td>
                        <td class="td-actions text-right">
                           <button type="button" rel="tooltip" class="btn btn-info">
                           <i class="material-icons">person</i>
                           </button>
                           <button type="button" rel="tooltip" class="btn btn-info">
                           <a href="alterar-usuarios?id=<?php print_r($value['id_usuario']); ?>"> <i class="material-icons">edit</i></a>
                           </button>
                           <button type="button" rel="tooltip" class="btn btn-info">
                           <a href=""></a><i class="material-icons">close</i></a>
                           </button>
                        </td>
                     </tr>
                     <?php  
        }
    }
    
    // tera um listar difente para o usuário do nível suporte pois ele não poderá ver outros suportes e nem o usuário omni 
    // tera um listar difente para o usuário do nível suporte pois ele não poderá ver outros suportes e nem o usuário omni 
    public function listarUsuariosCliente(){
        $result = Db::queryAll("SELECT * FROM usuario where id_usuario=2 limit 10 ");
        return $result;
    }
    
    public function listarUsuariosOmni(){
        $result = Db::queryAll("SELECT * FROM usuario where id_usuario=0 limit 10 ");
        return $result;
    }
    
    public function listarUsuariosSuporte(){
        $result = Db::queryAll("SELECT * FROM usuario where id_usuario=1 limit 10 ");
        return $result;
    }
    
    
}