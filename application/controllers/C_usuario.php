<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_usuario extends MY_Controller {

        function __construct() {
            parent::__construct();
            $this->isLogado();
            $this->load->model('m_usuario');
            $this->loadEntidade('Usuario');
        }

        public function contaUsuario() {
            $acao = $this->security->xss_clean($this->input->post('acao'));

            if (($acao !== null) && ($acao === "atualizar" )) {
                $usuario = new Usuario();

                $usuario->setNome($this->security->xss_clean($this->input->post('nome')));
                $usuario->setIdentidade($this->security->xss_clean($this->input->post('idt')));
                $usuario->setEndereco($this->security->xss_clean($this->input->post('endereco')));
                $usuario->setCelular($this->security->xss_clean($this->input->post('celular')));
                $usuario->setFixo($this->security->xss_clean($this->input->post('fixo')));
                $usuario->setCodigo($this->session->userdata('dados_usuario')->cd_usuario);


                $retorno = $this->m_usuario->atualizarContaUsuario($usuario);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $usuario_logado = ($this->session->userdata('dados_usuario')->cd_usuario);

                $dados['usuario'] = $this->m_usuario->getContaUsuario($usuario_logado);
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
            $acao = $this->security->xss_clean($this->input->post('acao'));

            if (($acao !== null) && ($acao === "cadastrar" )) {

                $usuario = new Usuario();
                $usuario->setNome($this->security->xss_clean($this->input->post('nome')));
                $usuario->setIdentidade($this->security->xss_clean($this->input->post('idt')));
                $usuario->setEndereco($this->security->xss_clean($this->input->post('endereco')));
                $usuario->setCelular($this->security->xss_clean($this->input->post('celular')));
                $usuario->setFixo($this->security->xss_clean($this->input->post('fixo')));
                $usuario->setNivel($this->security->xss_clean($this->input->post('nivel')));

                $existeUsuario = $this->m_usuario->existeUsuario($usuario->identidade)->row();

                if ($existeUsuario->num_rows() > 0) {
                    echo 2;
                } else {
                    $retorno = $this->m_usuario->cadastrarUsuario($usuario);
                    echo $retorno;
                }
            } else {
                $dados['titulo'] = "teste ajax";
                $this->showAjax('inc/v_inc_usuario_adicionar', $dados);
            }
        }

        public function editarUsuario() {
            $acao = $this->security->xss_clean($this->input->post('acao'));

            if (($acao !== null) && ($acao === "editar" )) {
                $usuario = new Usuario();
                $usuario->setNome($this->security->xss_clean($this->input->post('nome')));
                $usuario->setIdentidade($this->security->xss_clean($this->input->post('idt')));
                $usuario->setEndereco($this->security->xss_clean($this->input->post('endereco')));
                $usuario->setCelular($this->security->xss_clean($this->input->post('celular')));
                $usuario->setFixo($this->security->xss_clean($this->input->post('fixo')));
                $usuario->setNivel($this->security->xss_clean($this->input->post('nivel')));
                $usuario->setCodigo($this->security->xss_clean($this->input->post('cd_usuario')));

                $retorno = $this->m_usuario->editarUsuario($usuario);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $cd_usuario = (int) $this->input->post('cd_usuario');

                //pega o objeto usuario com os dados pelo codigo do usuario
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
            $cd_usuario = $this->security->xss_clean($this->input->post('cd_usuario'));

            $retorno = $this->m_usuario->excluirUsuario($cd_usuario);
            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        }

        public function trocarSenha() {
            $acao = $this->security->xss_clean($this->input->post('acao'));

            if (($acao !== null) && ($acao === "trocar_senha" )) {
                $senha_atual = $this->security->xss_clean($this->input->post('senha_atual'));
                $senha_nova = $this->security->xss_clean($this->input->post('senha_nova'));
                $usuario_logado = $this->session->userdata('dados_usuario')->cd_usuario;

                $retorno = $this->m_usuario->trocarSenha($usuario_logado, $senha_atual, $senha_nova);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $dados['titulo'] = "Trocar senha";
                $this->showAjax('inc/v_inc_usuario_senha', $dados);
            }
        }

    }
