<?php
    /* Classe RouterController que extende Controller,
    *  é a classe que ira redirecionar a url para poder chamar o controller apropriado
    *  Parametros:
    *   - Protected $controller, é a variavel objeto a ser guardada.
    */
    class RouterController extends Controller{
        // Variaveis
        protected $controller;
        /* process($params);
        *  Metodo publico extendido do Metodo abstrato da classe Controller,
        *  Decide que tipo de Controller vai ser chamado, recebe o parametro e o transforma 
        *  em url, Se nenhum for encontrado vai ser redirecionado para
        *  a pagina de erro, se a url for vazia vai ser redirecionado para a pagina principal
        *  depois do objeto ser criado, ele vai ser processado, recebera o cabeçalho e vai gerar
        *  o view layout antes do view especifico da pagina.
        *  Parametros:
        *   - $params, são todos parametros a serem passados para o processamento.
        */
        public function process($params){
            // Url depois de ser analisada pelo metodo parseUrl()
            $parsedUrl = $this->parseUrl($params[0]);
            // Fazendo que o navegador percorra a base | ***(Caso o sistema não esteja na raiz do servidor)***
            // while($this->base > 0){ // Comentar While caso o sistema esteja na raiz do servidor
            //     array_shift($parsedUrl);
            //     $this->base--;  
            // }
            // Se a URL passada for vazia, redireciona para a pagina principal
            if(empty($parsedUrl[0])){
            // Definindo o primeiro controller a ser chamado (Controller que chama a view inicial)
                $this->redirect('home');
                //$this->redirect('login');
            }
            // Decide qual é o nome da classe a ser usado, pegando o primeiro parametro da URL analisada
            // e removendo do array principal ja que não é mais necessario.
            $controllerClass = $this->dashesToCamel(array_shift($parsedUrl)). 'Controller';
            // Apos ver se existe url, vamos pegar a classe criada e checar se essa classe existe.
            if(file_exists("controllers/$controllerClass.php")){
                $this->controller = new $controllerClass;
            // Se não existir, é redirecionado para pagina de erro
            }else{
                $this->redirect('erro');
            }
            // Agora o novo objeto chama seu metodo de processamento interno
            $this->controller->process($parsedUrl);
            // As variaveis para serem usadas são recebidas do objeto interno
            $this->data['title'] = $this->controller->head['title'];
            $this->data['description'] = $this->controller->head['description'];
            // Coloca o template principal não interno default
            $this->view = 'layout';
        }
        /* parseUrl($url);
        *  Metodo publico para analisar uma url passada e gerar um array dos parametros
        *  passados pela url depois de cada /
        *  Parametros:
        *   - $url, é a url crua antes de ser analisada.
        */
        public function parseUrl($url){
            // usa a função nativa do php para analisar em array associativo
            $parsedUrl = parse_url($url);
            // remove / do começo do caminho da url
            $parsedUrl["path"] = ltrim($parsedUrl["path"], "/");
            // remove qualquer espaço em branco da url
            $parsedUrl["path"] = trim($parsedUrl["path"]);
            // retorna a variavel explodida da url em um array em que cada valor é separado por /
            return $explodedUrl = explode("/", $parsedUrl["path"]);   
        }
        /* dashesToCamel($text);
        *  Metodo publico para padronizar pretty url, como ao ser analisado as urls
        *  tem que ser transformadas em controllers, como por exemplo em uma url login tem que
        *  ser recebida como LoginController e uma de user-lisg tem que ser UserListController
        *  essa função transforam - em maiusculas, então -u vira U.
        *  Parametros:
        *   - $text, é o texto cru em formato com traços.
        */
        public function dashesToCamel($text){
            // Troca - com espaços
            $text = str_replace('-', ' ', $text);
            // Faz a primeira letra de cada palavra ser capital (maiuscula)
            $text = ucwords($text);
            // Remove os espaços para serem usadas como classe
            return $text = str_replace(' ', '', $text);
        }
    }
?>