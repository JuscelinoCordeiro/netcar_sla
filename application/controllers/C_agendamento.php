<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_agendamento extends My_Controller {

        function __construct() {
            parent::__construct();
            $this->isLogado();
            $this->load->model('m_agendamento');
            $this->loadEntidade('Agendamento');
        }

        public function index() {

        }

        public function listarAgendamentosDoDia() {
            $dtHoje = date('Y/m/d');
            $cd_usuario_logado = ($this->session->userdata('dados_usuario')->cd_usuario);
            $perfil_usuario_logado = ($this->session->userdata('dados_usuario')->nivel);

            if (validaPerfil(array(M_perfil::Cliente), $perfil_usuario_logado)) {
                $dados['agendamentos_dia'] = $this->m_agendamento->getAgendamentosDoDia($dtHoje, $cd_usuario_logado);
            } else {
                $dados['agendamentos_dia'] = $this->m_agendamento->getAgendamentosDoDia($dtHoje);
            }

            $dados['titulo'] = "Agenda do dia";
            $this->showTemplate("v_agendamento_diario", $dados);
        }

        public function listarAgendamentos() {
            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "pesquisar")) {

                $dt_ini = inverteData($this->input->post('dt_inicio'));
                $dt_fim = inverteData($this->input->post('dt_fim'));

                $cd_usuario_logado = ($this->session->userdata('dados_usuario')->cd_usuario);
                $perfil_usuario_logado = ($this->session->userdata('dados_usuario')->nivel);

                if (validaPerfil(array(M_perfil::Cliente), $perfil_usuario_logado)) {
                    $dados['agendamentos'] = $this->m_agendamento->getAgendamentoByData($dt_ini, $dt_fim, $cd_usuario_logado)->result();
                } else {
                    $dados['agendamentos'] = $this->m_agendamento->getAgendamentoByData($dt_ini, $dt_fim)->result();
                }

                $dados['dt_inicio'] = $dt_ini;
                $dados['dt_fim'] = $dt_fim;
                $dados['titulo'] = "Agendamentos";

                $this->showAjax("v_agendamento_periodo", $dados);
            } else {
                $this->showAjax('inc/v_inc_agendamento_pesquisar');
            }
        }

        public function cadastrarAgendamento() {
            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "novoAgendamento")) {
                $agendamento = new Agendamento();
                $agendamento->setUsuario($this->input->post('cd_usuario'));
                $agendamento->setTipoVeiculo($this->input->post('cd_tpveiculo'));
                $agendamento->setServico($this->input->post('cd_servico'));
                $agendamento->setPlaca($this->input->post('placa'));
                $agendamento->setData(inverteData($this->input->post('data')));
                $agendamento->setHorario($this->input->post('horario'));

                $retorno = $this->m_agendamento->cadastrarAgendamento($agendamento);

                if ($retorno) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                if (($this->input->post('valor') !== null) && ($this->input->post('valor') === "agendamento")) {
                    $this->load->model('m_usuario');
                    $this->load->model('m_veiculo');
                    $this->load->model('m_servico');
                    $this->load->model('m_tarifa');


                    $dados['titulo'] = "Agendamento de serviço";
                    $dados['usuarios'] = $this->m_usuario->getUsuarios()->result();
                    $dados['tipo_veiculos'] = $this->m_veiculo->getVeiculos()->result();
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
            if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "editar")) {
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
                $dados['agendamento'] = $this->m_agendamento->getAgendamento($cd_agend)->row();
                $dados['titulo'] = "Editar agendamento";
                $this->showAjax('inc/v_inc_agendamento_editar', $dados);
            }
        }

    }
