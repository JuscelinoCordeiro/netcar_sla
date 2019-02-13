<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_inicio extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $info['titulo'] = "NetCar - Home";
        if (!$this->session->logado) {
            redirect('c_login');
        }
//

        $this->load->view('header', $info);
        $this->load->view('navbar');
        $this->load->view('v_home');
        $this->load->view('footer');
    }

}
