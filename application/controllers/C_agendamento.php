<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_agendamento extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_agendamento');
    }

    public function index() {

    }

    public function listarAgendamentosDoDia() {
        $dtHoje = date('Y/m/d');
        $dados['agendamentos_dia'] = $this->m_agendamento->getAgendamentosDoDia($dtHoje);

        $dados['titulo'] = "Agenda do dia";
        $this->showTemplate("v_agendamento_diario", $dados);
    }

    public function listarAgendamentos() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "pesquisar" )) {

            $dt_ini = inverteData($this->input->post('dt_inicio'));
            $dt_fim = inverteData($this->input->post('dt_fim'));

            $dados['agendamentos'] = $this->m_agendamento->getAgendamentoByData($dt_ini, $dt_fim)->result();
            $dados['dt_inicio'] = $dt_ini;
            $dados['dt_fim'] = $dt_fim;
            $dados['titulo'] = "Agendamentos";

            $this->showAjax("v_agendamento_periodo", $dados);
        } else {
            $this->showAjax('inc/v_inc_agendamento_pesquisar');
        }
    }

    public function cadastrarAgendamento() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "novoAgendamento" )) {
            $dados['cd_usuario'] = $this->input->post('cd_usuario');
            $dados['cd_tpveiculo'] = $this->input->post('cd_tpveiculo');
            $dados['cd_servico'] = $this->input->post('cd_servico');
            $dados['placa'] = $this->input->post('placa');
            $dados['data'] = inverteData($this->input->post('data'));
            $dados['horario'] = $this->input->post('horario');
//            print_r($dados);
//            die();
            $retorno = $this->m_agendamento->cadastrarAgendamento($dados);

            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            if (($this->input->post('valor') !== null) && ($this->input->post('valor') === "agendamento" )) {
                $this->load->model('m_usuario');
                $this->load->model('m_veiculo');
                $this->load->model('m_servico');
                $this->load->model('m_tarifa');


                $dados['titulo'] = "Agendamento de serviço";
                $dados['usuarios'] = $this->m_usuario->getUsuarios()->result();
                $dados['tipo_veiculos'] = $this->m_veiculo->getTpVeiculos()->result();
                $dados['servicos'] = $this->m_servico->getServicosAtivos()->result();
                $dados['tarifas'] = $this->m_tarifa->getTarifas()->result();
                $this->showAjax('inc/v_inc_agendamento_adicionar', $dados);
            }
        }
    }

    public function excluirAgendamento() {
        $cd_agend = $this->input->post('cd_agend');

        $retorno = $this->m_agendamento->excluirAgendamento($cd_agend);
        if ($retorno) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function finalizarAgendamento() {
        $cd_agend = $this->input->post('cd_agend');

        $retorno = $this->m_agendamento->finalizarAgendamento($cd_agend);

        if ($retorno) {
            echo 1;
        } else {
            echo 0;
        }
    }

    //PERCISA COMBOBOX
    public function editarAgendamento() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "editar" )) {
            $cd_agend = $this->input->post('cd_agend');

            //editar
            $retorno = $this->m_agendamento->editarAgendamento($cd_servico, $servico, $tipo_veiculos);

            if ($retorno) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $cd_agend = $this->input->post('cd_agend');

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

}
