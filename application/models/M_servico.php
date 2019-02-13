<?php

if (!defined('BASEPATH'))
    exit('No	direct script access allowed');

class M_servico extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getservicos() {
        $sql = " select * from servico";
        return $this->db->query($sql);
    }

    public function getServicoById($cd_servico) {
        $sql = "select * from servico where cd_servico = ?";
        return $this->db->query($sql, $cd_servico);
    }

    public function excluirServico($cd_servico) {
        $sql = "delete from servico where cd_servico = ?";
        return $this->db->query($sql, $cd_servico);
    }

    public function updateServico($cd_servico, $servico) {
        $sql = "update servico set servico = ? where cd_servico = ?";
        return $this->db->query($sql, array($servico, $cd_servico));
    }

    public function criarServico($servico) {
        $sql = "insert into servico (servico) values ?";
        return $this->db->query($sql, $servico);
    }

}
