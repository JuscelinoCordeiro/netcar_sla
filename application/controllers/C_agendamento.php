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
            $dados['titulo'] = "Agendamentos do dia";
            $this->showTemplate("v_agendamento_listar", $dados);
        }

        public function listarAgendamentos() {
            $dados['agendamentos'] = $this->m_agendamento->getAgendamentos();
            $dados['titulo'] = "Agendamentos";
            $this->showTemplate("v_agendamento_todos", $dados);
        }

        public function addAgendamento() {
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
                $dados['titulo'] = "Agendamento";
                $dados['usuarios'] = $this->m_agendamento->getUsuarios();
                $dados['tipo_veiculo'] = $this->m_agendamento->getTipoVeiculo();
                $dados['servicos'] = $this->m_agendamento->getServicos($this->input->post('tipo_servico'));
                $this->showTemplate('v_agendamento_adicionar', $dados);
                echo $this->input->post('tipo_servico');
            }
    }

}

    }

?>
