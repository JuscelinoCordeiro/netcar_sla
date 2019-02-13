<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->isLogado();
    }

//    private static $instance;

    public function isLogado() {
        if (!$this->session->logado) {
            redirect('c_login');
        }
    }

    public function showTemplate($view = null, $dados = null) {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view($view, $dados);
        $this->load->view('footer');
    }

//    public static function &get_instance() {
//        return self::$instance;
//    }
}
