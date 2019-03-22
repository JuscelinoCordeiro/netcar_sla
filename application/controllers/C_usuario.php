<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuario extends MY_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->logado) {
            redirect('c_login');
        }

        $this->load->model('m_usuario');
    }

    public function index() {

    }

    public function listarUsuarios() {
        $dados['usuarios'] = $this->m_usuario->getUsuarios();
        $dados['titulo'] = "Usuários";
        $this->showTemplate('v_usuario', $dados);
    }

    public function cadastrarUsuario() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "cadastrar" )) {
            $dados['nome'] = $this->input->post('nome');
            $dados['idt'] = $this->input->post('idt');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['celular'] = $this->input->post('celular');
            $dados['fixo'] = $this->input->post('fixo');
            $dados['nivel'] = $this->input->post('nivel');
//            print_r($dados);
            $retorno = $this->m_usuario->cadastrarUsuario($dados);

            unset($dados);

            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $dados['titulo'] = "teste ajax";
            $this->showAjax('inc/v_inc_usuario_adicionar', $dados);
        }
    }

    public function editarUsuario() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "editar" )) {
            $dados['nome'] = $this->input->post('nome');
            $dados['idt'] = $this->input->post('idt');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['celular'] = $this->input->post('celular');
            $dados['fixo'] = $this->input->post('fixo');
            $dados['nivel'] = $this->input->post('nivel');
            $dados['cd_usuario'] = $this->input->post('cd_usuario');
            print_r($dados);
            $valida['mensagem'] = $this->m_usuario->editarUsuario($dados);

            unset($dados);

            $this->showAjax('v_mensagem', $valida);
        } else {
            $cd_usuario = (int) $this->input->post('cd_usuario');

            $dados['usuario'] = $this->m_usuario->getUsuarioById($cd_usuario);
//        print_r($dados['usuario']);
            $dados['titulo'] = "Editar Usuário";

            if (isset($dados['usuario']) && !empty($dados['usuario'])) {
                $this->showAjax('inc/v_inc_usuario_editar', $dados);
            } else {
                $mensagem['mensagem'] = "Usuário inexistente";
                $this->showAjax('v_mensagem', $mensagem);
            }
        }
    }

    public function excluirUsuario() {
        $cd_usuario = $this->input->post('cd_usuario');

        $retorno = $this->m_usuario->excluirUsuario($cd_usuario);
        if ($retorno) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
