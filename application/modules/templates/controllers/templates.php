<?php

class Templates extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function masuk() {
        $data = '';
        $this->login($data);
    }

    function home() {
        $data = '';
        $this->public_bootstrap($data);
    }

    function about() {
        $this->load->view('about_us');
    }

    function _draw_breadcrumbs($data) {
        $this->load->view('breadcrumbs_public_bootstrap', $data);
    }

    function public_bootstrap($data) {
        // if (!isset($data['view_module'])) {
        //     $data['view_module'] = $this->uri->segment(1);
        // }
        // $this->load->module('site_security');
        // $data['customer_id'] = $this->site_security->_get_user_id();
        
        $this->load->view('public_bootstrap', $data);
    }

    function syarat_dan_ketentuan() {
        $this->load->view('syarat_dan_ketentuan');   
    }

    function kebijakan_privasi() {
        $this->load->view('kebijakan_privasi');   
    }

    function pendaftaran($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('extra', $data);   
    }

    function login($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('login_page', $data);
    }

    function public_jqm($data) {
        $this->load->view('public_jqm', $data);
    }

    function admin($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('admin', $data);
    }

}