<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acervo extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->data = array();

        $this->data["dados"] = $this->session->userdata("is_logged");

        $this->load->model("Acervo_model", "m_acervo");
    }

    public function index($nome = null)
	{
        $this->data["categorias"] = $this->m_acervo->get_categorias();
        $this->data["livros"] = $this->m_acervo->get_livros(urldecode($nome));

        $this->data["header"] = $this->load->view("template/header", $this->data, true);
        $this->data["navbar"] = $this->load->view("template/navbar", $this->data, true);
        $this->data["footer"] = $this->load->view("template/footer", $this->data, true);

        $this->data["content"] = $this->load->view("home/home", $this->data, true);
		$this->load->view("template/content", $this->data);
	}

    public function sair()
    {
        $this->session->unset_userdata(array("is_logged"));
        redirect(base_url());
    }

    public function autentificar()
    {
        $rst = $this->m_acervo->autentificar();
        if($rst)
            $this->session->set_userdata(array("is_logged" => true));
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function cadastro_categoria()
    {
        $rst = $this->m_acervo->cadastro_categoria();
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function cadastro_livro()
    {
        $rst = $this->m_acervo->cadastro_livro();
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function get_livro($id)
    {
        $rst = $this->m_acervo->get_livro($id);
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function editaLivro()
    {
        $rst = $this->m_acervo->editaLivro();
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function exclui_livro($id)
    {
        $rst = $this->m_acervo->exclui_livro($id);
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }
}