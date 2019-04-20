<?php
    // Função para carregar controllers e models quando necessario ao tentar criar objeto deles.
    function autoLoadFunction($class){
        
        // Se existir o arquivo e for controller
        if(preg_match('/Controller$/', $class))
            require "controllers/$class.php";
        // Se não é um model
        else
           require "models/$class.php";
    }
    // Registro da função autoload
    spl_autoload_register("autoLoadFunction");
?>