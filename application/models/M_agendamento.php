<?php

if (!defined('BASEPATH'))
    exit('No	direct script access allowed');

class M_agendamento extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAgendamentosDoDia($dtHoje) {
        $sql = "select ag.*, user.nome, tp.*, sv.*, ta.preco "
                . "from agendamento as ag inner join usuario as user on ag.cd_usuario = user.cd_usuario "
                . "inner join tipo_veiculo as tp on tp.cd_tpveiculo = ag.cd_tpveiculo "
                . "inner join servico as sv on ag.cd_servico = sv.cd_servico "
                . "inner join tarifa as ta on tp.cd_tpveiculo = ta.cd_tpveiculo and sv.cd_servico = ta.cd_servico "
                . "where data = ? order by horario desc";
        return $this->db->query($sql, $dtHoje);
    }

    public function getAgendamentoByData($dt_ini, $dt_fim) {
        $sql = "select ag.*, user.nome, tp.*, sv.*, ta.preco "
                . "from agendamento as ag inner join usuario as user on ag.cd_usuario = user.cd_usuario "
                . "inner join tipo_veiculo as tp on tp.cd_tpveiculo = ag.cd_tpveiculo "
                . "inner join servico as sv on ag.cd_servico = sv.cd_servico "
                . "inner join tarifa as ta on tp.cd_tpveiculo = ta.cd_tpveiculo and sv.cd_servico = ta.cd_servico "
                . " where data between ? and ? "
                . "order by ag.data desc";
        return $this->db->query($sql, array($dt_ini, $dt_fim));
    }

    public function getAgendamento($cd_agend) {
        $sql = "select ag.*, user.nome, tp.*, sv.*, ta.preco "
                . "from agendamento as ag inner join usuario as user on ag.cd_usuario = user.cd_usuario "
                . "inner join tipo_veiculo as tp on tp.cd_tpveiculo = ag.cd_tpveiculo "
                . "inner join servico as sv on ag.cd_servico = sv.cd_servico "
                . "inner join tarifa as ta on tp.cd_tpveiculo = ta.cd_tpveiculo and sv.cd_servico = ta.cd_servico "
                . " where cd_agendamento = ?"
                . "order by ag.data desc";
        return $this->db->query($sql, $cd_agend);
    }

    public function cadastrarAgendamento($dados) {
        $sql = "INSERT INTO agendamento (cd_usuario, cd_tpveiculo, cd_servico, placa, data, horario, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, array($dados['cd_usuario'], $dados['cd_tpveiculo'], $dados['cd_servico'], $dados['placa'], $dados['data'], $dados['horario'], $dados['status']));
    }

    public function excluirAgendamento($cd_agend) {
        $sql = "delete from agendamento where cd_agendamento = ?";
        return $this->db->query($sql, $cd_agend);
    }

    public function finalizarAgendamento($cd_agend) {
        $this->load->model('m_faturalento');

        try {
            //atualiza o nome do serviço
            $sql = "update agendamento set status = 1 where cd_agendamento = ?";
            $finalizado = $this->db->query($sql, $cd_agendamento);


            if ($finalizado === FALSE) {
                throw new Exception("Erro ao editar na tabela serviço.");
            }

// cd_agendamento 	cd_usuario 	cd_tpveiculo 	cd_servico 	placa 	data 	horario 	status
            //lança o agendamento finalizado na tabela faturamento
            $sql = "insert into faturamento (cd_tpveiculo, cd_servico, data,	valor)"
                    . " values (?, ?, ?, ?,? )";

            //terminar
            $finalizado = $this->getAgendamento($cd_agend)->result();
            $faturado = $this->m_faturamento->setFaturamento(
                    $finalizado->cd_tpveiculo, $finalizado->cd_servico, $finalizado->data, $finalizado->horario, $finalizado->valor);

            //verifica se houve erros
            if ($finalizado === TRUE && $result_del_tarifa == TRUE) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return 0;
        }
    }

}
