<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_tarifa extends MY_Controller {

        function __construct() {
            parent::__construct();
            $this->isLogado();
            $this->load->model('m_tarifa');
            $this->loadEntidade('Tarifa');
        }

        public function index() {

            $dados['tarifas'] = $this->m_tarifa->getTarifas();
            $dados['titulo'] = "Tarifas";
            $this->showTemplate('v_tarifa', $dados);
        }

        public function editarTarifa() {

            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "editar" )) {
                $tarifa = new Tarifa();

                $tarifa->setServico($this->input->post('cd_servico'));
                $tarifa->setTipoVeiculo($this->input->post('cd_tpveiculo'));
                $tarifa->setPreco($this->input->post('preco'));

                $retorno = $this->m_tarifa->editarTarifa($tarifa);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                $this->load->model('m_servico');
                $this->load->model('m_veiculo');

                $cd_servico = $this->input->post('cd_servico');
                $cd_tpveiculo = $this->input->post('cd_tpveiculo');

                $dados['servico'] = $this->m_servico->getServicoById($cd_servico)->row();
                $dados['tipo_veiculo'] = $this->m_veiculo->getVeiculoById($cd_tpveiculo)->row();
                $dados['tarifa'] = $this->m_tarifa->getTarifaServicoTpVeiculo($cd_servico, $cd_tpveiculo)->row();

                $dados['titulo'] = "Edição de tarifa";
                $this->showAjax('inc/v_inc_tarifa_editar', $dados);
            }
        }

        public function getTarifaServicoTpVeiculo() {
            $tarifa = new Tarifa();

            $tarifa->setServico($this->input->post('cd_servico'));
            $tarifa->setTipoVeiculo($this->input->post('cd_tpveiculo'));

            $tarifa = $this->m_tarifa->getTarifaServicoTpVeiculo($tarifa)->row()->preco;

            if ($tarifa != NULL) {
                echo "R$ " . $tarifa . ",00";
            } else {
                echo 'ERRO!! Serviço não tarifado.';
            }
        }

    }
