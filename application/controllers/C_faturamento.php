<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_faturamento extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_faturamento');
    }

    public function listarFaturamentoDiario() {
        $faturamento = $this->m_faturamento->listarFaturamentoDiario();

        $dados['titulo'] = "Faturamento Diário";
        $dados['faturamento'] = $faturamento['faturamento'];
        $dados['total'] = $faturamento['total'];
//        print_r($dados);
//        die();
        $this->showTemplate('v_faturamento_diario', $dados);
    }

    public function listarFaturamentoPeriodo() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "pesquisar" )) {
            $dt_ini = inverteData($this->input->post('dt_inicio'));
            $dt_fim = inverteData($this->input->post('dt_fim'));

            $faturamento = $this->m_faturamento->listarFaturamentoPeriodo($dt_ini, $dt_fim);
            $dados['titulo'] = "Faturamentos";
            $dados['faturamento'] = $faturamento['faturamento'];
            $dados['total'] = $faturamento['total'];
            $dados['dt_inicio'] = $dt_ini;
            $dados['dt_fim'] = $dt_fim;

            $this->showAjax("v_faturamento_periodo", $dados);
        } else {
            $this->showAjax('inc/v_inc_faturamento_pesquisar');
        }
    }

}
