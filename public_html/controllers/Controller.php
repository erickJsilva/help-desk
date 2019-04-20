<?php
    /* Classe pai abstrata de todas controllers,
    *  ela tem o proposito de criar uma camada de abstração para todas outras classes filhas
    *  terem de onde se basear sem reuso de codigo.
    *  Parametros:
    *   - Protected $data (array), é tudo que for passado para os views para ser apresentado
    *   - Protected $view (string), é o caminho do arquivo view
    *   - Protected $head (array), é o cabeçalho de informação que toda pagina vai ter,
    *   -- contem title (titulo da pagina), description (descrição da pagina), seus valores defaut seram vazios.
    */
    abstract class Controller{
        // Variaveis
        protected  $data = array();
        protected  $view = '';
        protected  $head = array('title' => '', 'description' => '');
        // Quantidade de pastas onde o sistema se encontra | Ex. sistemas/mvc = 2 | ***(Caso o sistema não esteja na raiz do servidor)*** 
        // protected $base = 1; // Comentar essa linha caso o sistema esteja na raiz do servidor
        // // Define a URL base | Ex. sistemas/mvc | ***(Caso o sistema não esteja na raiz do servidor)*** 
        // public $baseUrl = "mvc/"; // Comentar essa linha caso o sistema esteja na raiz do servidor
        /* process($params);
        *  Metodo abstrato do processamento dos parametros,
        *  cada controller vai ter o seu proprio tipo de processamento por isso abstrato.
        *  Parametros:
        *   - $params, são todos parametros a serem passados para o processamento.
        */
        abstract function process($params);
        /* renderView();
        *  Metodo publico de renderização do view, ele extrai as variaveis para serem usadas na
        *  pagina renderizada como variaveis comuns
        */
        public function renderView(){
            // Se existir um view especificado, extrai toda data para ser usada como variavel
            // e requisita o view.phtml
            if($this->view){
                extract($this->data);
                extract($this->data, EXTR_PREFIX_ALL, "");
                require "views/$this->view.phtml";
            }
        }
        /* redirect($url);
        *  Metodo publico para redirecionamento de uma pagina para outra e termina o script
        */
        public function redirect($url){
            // Definindo o caminho como $baseUrl para a URL | ***(Caso o sistema não esteja na raiz do servidor)***
            // $url = $this->baseUrl . $url; // Comentar essa linha caso o sistema esteja na raiz do servidor
            header("Location: /$url");
            header("Connection: close");
            exit;
        }
    }
?>