<?php
    /* Classe do banco de dados, crud wrapper
    *  ela tem o proposito de criar uma conexão que possa ser usada por toda aplicação
    *  e ter funções de crud para extrair e enviar informação para o banco
    *  Parametros:
    *   - Private static $conn (pdo), é a conexão ligada com o banco para ser usada pela aplicação e seu crud
    *   - Private static $settings (array), uma simples forma de setar algumas informações na conexão
    */
    class Db{
        // para que a conexão seja disponivel por qualquer lugar é preciso ser estatica.
        private static $conn;
        // apenas informação pra ser passada pra conexão
        private static $settings = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_EMULATE_PREPARES => false,);
        /* connect($host, $user, $password, $database);
        *  Metodo para conexão ao banco de dados
        *  Parametros:
        *   - $host, é o ip da sua hospedagem
        *   - $user, é o usuario do banco
        *   - $password, é a senha do banco
        *   - $database, é o banco de dados a ser usado para se conectar
        */
        public static function connect($host, $user, $password, $database){
            // se não existir uma conexão ja estabelecida ele se conecta
            if(!isset(self::$conn)){
                // @ simbolo significa deixar qualquer erro de conexão do banco ser ignorada
                self::$conn = @new PDO(
                    "mysql:host=$host;dbname=$database",
                    $user,
                    $password,
                    self::$settings
                );
            }
        }      
        /* queryOne($query, $params = array());
        *  Metodo para pegar uma unica informação da query
        *  Parametros:
        *   - $query, é a query a ser passada pro banco
        *   - $params, são os parametros a serem passados para a query como variavel
        */
        public static function queryOne($query, $params = array()){
            $result = self::$conn->prepare($query);
            $result->execute($params);
            return $result->fetch();
        }
        /* queryAll($query, $params = array());
        *  Metodo para pegar todas as informações de uma determinada query
        *  Parametros:
        *   - $query, é a query a ser passada pro banco
        *   - $params, são os parametros a serem passados para a query como variavel
        */
        public static function queryAll($query, $params = array()){
            $result = self::$conn->prepare($query);
            $result->execute($params);
            return $result->fetchAll();
        }
        /* queryCount($query, $params = array());
        *  Metodo para pegar a quantidade de colunas modificadas pela query
        *  Parametros:
        *   - $query, é a query a ser passada pro banco
        *   - $params, são os parametros a serem passados para a query como variavel
        */
        public static function queryCount($query, $params = array()){
            $result = self::$conn->prepare($query);
            $result->execute($params);
            return $result->rowCount();
        }
    }
?>