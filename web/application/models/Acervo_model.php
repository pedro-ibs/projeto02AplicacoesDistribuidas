<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acervo_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        $this->dados = $this->session->userdata("dados" . APPNAME);
    }

    // apenas para testes
    public function autentificar()
    {
        $data = (object)$this->input->post();

        if($data->login == "Admin" && $data->senha == "12345678")
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //Inicio Categoria

    public function get_categorias()
    {

        $url       = 'http://localhost:8080/api/category/v1';
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');
        // $campos    = json_encode(array('status' => 'paused'));

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     null);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'GET');

        $json = json_decode(curl_exec($ch));

        $organiza = array();
        foreach($json as $item)
        {
            $organiza[] = $item->category;
        }
        sort($organiza);
        
        $result = array();
        foreach($organiza as $item)
        {
            foreach($json as $value)
            {
                if($value->category == $item)
                    $result[] = $value;
            }
        }

        return $result;
    }

    public function get_categoria($id)
    {
        $url       = 'http://localhost:8080/api/category/v1/'.$id;
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');
        // $campos    = json_encode(array('status' => 'paused'));

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     null);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'GET');

        $json2 = json_decode(curl_exec($ch));

        curl_close($ch);

        return $json2;
    }

    public function cadastro_categoria()
    {
        $rst = (object)array("rst" => true, "msg" => "");
        $data = (object)$this->input->post();

        $url       = 'http://localhost:8080/api/category/v1/';
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');
        $campos    = json_encode(array("category" => $data->titulo));

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $campos);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');

        $json = json_decode(curl_exec($ch));

        if($json == false)
        {
            $rst->rst = false;
            $rst->msg = "Não foi possivel salvar a categoria";
        }
        else
        {
            $rst->msg = "Categoria salva com sucesso";
        }

        return $rst;
    }

    //Fim Categoria

    //Inicio Livros

    public function get_livros($nome)
    {
        $url       = 'http://localhost:8080/api/book/v1/';
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     null);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'GET');

        $json = json_decode(curl_exec($ch));

        curl_close($ch);

        $result = array();

        foreach($json as $item)
        {
            $json2 = $this->get_categoria($item->idCategory);
            
            
            $item->category = $json2;
            
            if($nome != null)
            {               
                if(strcmp($nome, $json2->category) == 0)
                {
                    $result[] = $item;
                }
                    
            }
            else
                $result[] = $item;
        }

        return $result;
    }

    public function get_livro($id)
    {
        $url       = 'http://localhost:8080/api/book/v1/'.$id;
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');
        // $campos    = json_encode(array('status' => 'paused'));

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     null);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'GET');

        $json = json_decode(curl_exec($ch));

        curl_close($ch);

        $json->category = $this->get_categoria($json->idCategory);
        
        return $json;
    }

    public function cadastro_livro()
    {
        $rst = (object)array("rst" => true, "msg" => "");
        $data = (object)$this->input->post();        

        move_uploaded_file($_FILES["imagem"]["tmp_name"], APPPATH."..\assets\uploads"."\\".$_FILES["imagem"]["name"]);

        $path = $_FILES["imagem"]["name"];

        $url       = 'http://localhost:8080/api/book/v1/';
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');
        $campos    = json_encode(
            array(
                "title" => $data->titulo,
                "author" => $data->autor,
                "year" => $data->ano,
                "idCategory" => $data->categoria,
                "pages" => $data->pagina,
                "description" => $data->descricao,
                "image" => $path,
                "date" => "".date('d/m/Y H:i:s')
            )
        );

        

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $campos);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');

        $json = json_decode(curl_exec($ch));

        

        if($json == false)
        {
            $rst->rst = false;
            $rst->msg = "Não foi possivel salvar o livro";
        }
        else
        {
            $rst->msg = "Livro salva com sucesso";
        }

        return $rst;
    }

    public function editaLivro()
    {
        $rst = (object)array("rst" => true, "msg" => "");
        $data = (object)$this->input->post();

        if($_FILES["imagem"]["name"] != null)
        {
            move_uploaded_file($_FILES["imagem"]["tmp_name"], APPPATH."..\assets\uploads"."\\".$_FILES["imagem"]["name"]);

            $path = $_FILES["imagem"]["name"];
        }
        else
        {
            $path = $data->imagem_hidden;
        }
        $url       = 'http://localhost:8080/api/book/v1/';
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');
        $campos    = json_encode(
            array(
                "key" => $data->id,
                "title" => $data->titulo,
                "author" => $data->autor,
                "year" => $data->ano,
                "idCategory" => $data->categoria,
                "pages" => $data->pagina,
                "description" => $data->descricao,
                "image" => $path,
                "date" => "".date('d/m/Y H:i:s')
            )
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $campos);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'PUT');

        $json = json_decode(curl_exec($ch));

        if($json == false)
        {
            $rst->rst = false;
            $rst->msg = "Não foi possivel editar o livro";
        }
        else
        {
            $rst->msg = "Livro editado com sucesso";
        }

        return $rst;
    }

    public function exclui_livro($id)
    {
        $rst = (object)array("rst" => true, "msg" => "");

        $url       = 'http://localhost:8080/api/book/v1/'.$id;
        $cabecalho = array('Content-Type: application/json', 'Accept: application/json');
        // $campos    = json_encode(array('status' => 'paused'));

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     null);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'DELETE');

        $json = json_decode(curl_exec($ch));

        curl_close($ch);

        if(!empty($json))
        {
            $rst->rst = false;
            $rst->msg = "Não foi possivel excluir o livro";
        }
        else
        {
            $rst->msg = "Livro excluido com sucesso";
        }
        
        return $rst;
    }

    //Fim Livros
}