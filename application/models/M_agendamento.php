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

    public function getUsuarios(){
        $sql = "SELECT cd_usuario, nome FROM usuario";
       return $this->db->query($sql);
    }

    public function getTipoVeiculo(){
        $sql = "SELECT cd_tpveiculo, tipo FROM tipo_veiculo";
       return $this->db->query($sql); 
    }

    public function getServicos($tipo_servico){
        $sql = "select s.cd_servico, servico from servico s inner join tarifa t on t.cd_servico = s.cd_servico where cd_tpveiculo = ? and ativo = 1"; 
        $results = $this->db->query($sql, $tipo_servico);
        foreach($results->result() as $result){
            $categorias[] = array(
                'cd_servico' => $result->cd_servico,
                'servico'    => $result->servico
            );
        }
       return json_encode($categorias);
    }
    

}


?>