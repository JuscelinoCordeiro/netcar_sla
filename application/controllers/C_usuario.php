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
            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "atualizar" )) {
                $usuario = new Usuario();

                $usuario->setNome($this->input->post('nome'));
                $usuario->setIdentidade($this->input->post('idt'));
                $usuario->setEndereco($this->input->post('endereco'));
                $usuario->setCelular($this->input->post('celular'));
                $usuario->setFixo($this->input->post('fixo'));
                $usuario->setCodigo($this->input->post('cd_usuario'));


                $retorno = $this->m_usuario->atualizarContaUsuario($usuario);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $cd_usuario = (int) $this->input->post('cd_usuario');

                // pega um objeto usuario com os dados no banco
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
                $usuario = new Usuario();

                $usuario->setNome($this->input->post('nome'));
                $usuario->setIdentidade($this->input->post('idt'));
                $usuario->setEndereco($this->input->post('endereco'));
                $usuario->setCelular($this->input->post('celular'));
                $usuario->setFixo($this->input->post('fixo'));
                $usuario->setNivel($this->input->post('nivel'));

                $existeUsuario = $this->m_usuario->existeUsuario($usuario->identidade);

                if ($existeUsuario > 0) {
                    $retorno = -1;
                } else {
                    $retorno = $this->m_usuario->cadastrarUsuario($usuario);
                }

                if ($retorno === -1) {
                    echo -1;
                } else if ($retorno === 1) {
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
                $usuario = new Usuario();

                $usuario->setNome($this->input->post('nome'));
                $usuario->setIdentidade($this->input->post('idt'));
                $usuario->setEndereco($this->input->post('endereco'));
                $usuario->setCelular($this->input->post('celular'));
                $usuario->setFixo($this->input->post('fixo'));
                $usuario->setNivel($this->input->post('nivel'));
                $usuario->setCodigo($this->input->post('cd_usuario'));

                $retorno = $this->m_usuario->editarUsuario($usuario);

                unset($dados);
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
            $cd_usuario = $this->input->post('cd_usuario');

            $retorno = $this->m_usuario->excluirUsuario($cd_usuario);
            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        }

        public function trocarSenha() {
            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "trocar_senha" )) {
                $dados['senha_antiga'] = $this->input->post('senha_antiga');
                $dados['senha_nova'] = $this->input->post('senha_nova');
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
                $dados['titulo'] = "Trocar senha";

                if (isset($dados['usuario']) && !empty($dados['usuario'])) {
                    $this->showAjax('inc/v_inc_usuario_senha', $dados);
                }
            }
        }

    }
