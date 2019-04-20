<?php
    class ErroController extends Controller{
        public function process($params){
            // Header para mostrar que é erro
            header("HTTP/1.0 404 Not Found");
            // Adicionar as variaveis title e description para serem mostradas na pagina de erro
            $this->head['title'] = "Erro 404";
            $this->head['description'] = "Pagina não encontrada";
            // Chama o view do error para ser mostrado.
            $this->view = 'erro';
        }
    }
?>