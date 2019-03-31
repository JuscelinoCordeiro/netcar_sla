<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_veiculo extends MY_Controller {

        function __construct() {
            parent::__construct();

            if (!$this->session->logado) {
                redirect('c_login');
            }

            $this->load->model('m_veiculo');
        }

        public function index() {

            $info['titulo'] = "Veículos";
            $dados['veiculos'] = $this->m_veiculo->getVeiculos();
            $this->load->view('header', $info);
            $this->load->view('navbar');
            $this->load->view('v_veiculo', $dados);
            $this->load->view('footer');
        }

        public function getVeiculoById() {
            $dados['veiculo'] = $this->m_veiculo->getVeiculoById($cd_tpveiculo);

            if (isset($dados['veiculo']) && !empty($dados['veiculo'])) {
                $this->load->view('inc/v_inc_veiculo_editar', $dados);
            }
        }

        public function editarVeiculo() {
            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "editar" )) {
                $cd_tpveiculo = $this->input->post('cd_tpveiculo');
                $tipo_veiculo = $this->input->post('tipo_veiculo');

                $retorno = $this->m_veiculo->editarVeiculo($cd_tpveiculo, $tipo_veiculo);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $cd_tpveiculo = $this->input->post('cd_tpveiculo');
                $dados['veiculo'] = $this->m_veiculo->getVeiculoById($cd_tpveiculo)->row();
                $dados['titulo'] = "Editar Veículo";
                $this->showAjax('inc/v_inc_veiculo_editar', $dados);
            }
        }

        public function cadastrarVeiculo() {
            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "cadastrar" )) {
                $tipo_veiculo = $this->input->post('tipo_veiculo');

                $retorno = $this->m_veiculo->cadastrarVeiculo($tipo_veiculo);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $dados['titulo'] = "Cadastro de Veículo";
                $this->showAjax('inc/v_inc_veiculo_adicionar');
            }
        }

        public function excluirVeiculo() {
            $cd_tpveiculo = $this->input->post('cd_tpveiculo');

            $retorno = $this->m_veiculo->excluirVeiculo($cd_tpveiculo);

            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        }

    }
