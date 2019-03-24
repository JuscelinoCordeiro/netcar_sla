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
        $dados['agendamentos_dia'] = $this->m_agendamento->getAgendamentosDoDia();
        $dados['titulo'] = "Agendamentos";
        $this->showTemplate("v_agendamento_listar", $dados);
    }

    public function listarAgendamentos() {
        $dados['agendamentos'] = $this->m_agendamento->getAgendamentos();
        $dados['titulo'] = "Agendamentos";
        $this->showTemplate("v_agendamento_todos", $dados);
    }

    public function cadastrarAgendamento() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "novoAgendamento" )) {
            $dados['cd_usuario'] = $this->input->post('cd_usuario');
            $dados['cd_tpveiculo'] = $this->input->post('tipo_veiculo');
            $dados['cd_servico'] = $this->input->post('cd_servico');
            $dados['placa'] = $this->input->post('placa');
            $dados['data'] = $this->input->post('data');
            $dados['horario'] = $this->input->post('horario');
            $dados['status'] = $this->input->post('status');
            $valida['mensagem'] = $this->m_usuario->addAgendamento($dados);

            unset($dados);

            $this->showAjax('v_mensagem', $valida);
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

}
