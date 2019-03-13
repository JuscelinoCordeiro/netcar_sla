<?php 
if (!defined('BASEPATH'))
exit('No	direct script access allowed');

class M_agendamento extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function getAgendamentosDoDia(){
        $sql =  "select * from agendamento where data between '".date("Y-m-d")." 00:00:00' and '".date("Y-m-d")." 23:59:59'";
       return $this->db->query($sql);
    }

    public function getAgendamentos() {
        $sql = "select * from agendamento";
       return $this->db->query($sql);
    }
    
    public function addAgendamento(){
        $sql = "INSERT INTO agendamento (cd_usuario, cd_tpveiculo, cd_servico, placa, data, horario, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
       return $this->db->query($sql, array($dados['cd_usuario'], $dados['cd_tpveiculo'], $dados['cd_servico'], $dados['placa'], $dados['data'], $dados['horario'], $dados['status']));
    }

    

}


?>