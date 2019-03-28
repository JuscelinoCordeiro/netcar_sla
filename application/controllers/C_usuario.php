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

//conta_


    public function contaUsuario() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "atualizar" )) {
            $dados['nome'] = $this->input->post('nome');
            $dados['idt'] = $this->input->post('idt');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['celular'] = $this->input->post('celular');
            $dados['fixo'] = $this->input->post('fixo');
            $dados['cd_usuario'] = $this->input->post('cd_usuario');

            $retorno = $this->m_usuario->atualizarContaUsuario($dados);

            unset($dados);
            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $cd_usuario = (int) $this->input->post('cd_usuario');

            $dados['usuario'] = $this->m_usuario->getContaUsuario($cd_usuario);
            $dados['titulo'] = "Minha conta";

            if (isset($dados['usuario']) && !empty($dados['usuario'])) {
                $this->showAjax('inc/v_inc_usuario_conta', $dados);
            } else {
                redirect('c_login/logout');
            }
        }
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

            $retorno = $this->m_usuario->editarUsuario($dados);

            unset($dados);
            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $cd_usuario = (int) $this->input->post('cd_usuario');

            $dados['usuario'] = $this->m_usuario->getUsuarioById($cd_usuario);
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

    public function alterarSenha() {
//        $dados = $this->input->post('dados');
//
//        $retorno = $this->m_usuario->pesquisarUsuario($dados);
//        print_r($retorno);
//        if ($retorno) {
//            echo 1;
//        } else {
//            echo 0;
//        }
    }

}
