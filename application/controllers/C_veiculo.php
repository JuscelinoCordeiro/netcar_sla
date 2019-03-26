<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_veiculo extends MY_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->logado) {
            redirect('c_login');
        }

        $this->load->model('m_servico');
    }

    public function index() {

        $info['titulo'] = "Serviços";
        $dados['servicos'] = $this->m_servico->getservicos();
        $this->load->view('header', $info);
        $this->load->view('navbar');
        $this->load->view('v_servico', $dados);
        $this->load->view('footer');
    }

    public function getTipoVeiculos() {

        if (isset($dados['servico']) && !empty($dados['servico'])) {
            $this->load->view('inc/v_inc_servico_editar', $dados);
        }
    }

    public function editarServico() {

        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "editar" )) {
            $cd_servico = $this->input->post('cd_servico');
            $servico = $this->input->post('servico');
            $tipo_veiculos = $this->input->post('tipo_veiculos');

            //editar
            $retorno = $this->m_servico->editarServico($cd_servico, $servico, $tipo_veiculos);

            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->load->model('m_veiculo');
            $this->load->model('m_tarifa');

            $cd_servico = $this->input->post('cd_servico');
            $dados['servico'] = $this->m_servico->getServicoById($cd_servico)->row();
            $dados['tipo_veiculos'] = $this->m_veiculo->getTpVeiculos()->result();
            $dados['tarifas'] = $this->m_tarifa->getTarifaServico($cd_servico)->result();

            $dados['titulo'] = "Edição de Serviço";
            $this->showAjax('inc/v_inc_servico_editar', $dados);
        }
    }

    public function cadastrarServico() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "cadastrar" )) {
            $servico = $this->input->post('servico');
            $tipo_veiculos = $this->input->post('tipo_veiculos');

            $retorno = $this->m_servico->cadastrarServico($servico, $tipo_veiculos);

            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->load->model('m_veiculo');
            $dados['tipo_veiculos'] = $this->m_veiculo->getTpVeiculos()->result();

            $dados['titulo'] = "Cadastro de Serviço";
            $this->showAjax('inc/v_inc_servico_adicionar', $dados);
        }
    }

    public function excluirServico() {
        $cd_servico = $this->input->post('cd_servico');

        $retorno = $this->m_servico->excluirServico($cd_servico);

        if ($retorno) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function mudarStatus() {
        $cd_servico = $this->input->post('cd_servico');
        $status = $this->input->post('status');

        $retorno = $this->m_servico->mudarStatus($cd_servico, $status);

        if ($retorno) {
            echo 1;
        } else {
            echo 0;
        }
    }

}