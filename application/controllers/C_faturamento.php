<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_faturamento extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_faturamento');
    }

    public function getFaturamentoDiario() {
        $dados['titulo'] = "Faturamento Diário";
        $dados['faturamento_diario'] = $this->m_faturamento->getFaturamentoDiario();
        $this->showTemplate('v_faturamento_diario', $dados);
    }

    public function getFaturamentoMensal() {

        $dados['titulo'] = "Faturamento Mensal";
        $dados['faturamento_mensal'] = $this->m_faturamento->getFaturamentoMensal();
        $this->showTemplate('v_faturamento_mensal', $dados);
    }

}

?>