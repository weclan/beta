<?php

class Templates extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function test() {
        $data = '';
        $this->signup($data);
    }

    function home() {
        $data = '';
        $this->public_bootstrap($data);
    }

    function about() {
        $this->load->view('about_us');
    }

    function faq() {
        $this->load->module('manage_faq');
        $data['query'] = $this->manage_faq->get('id');
        $this->load->view('faq', $data);
    }

    function galeri() {
        $this->load->module('manage_galeri');
        $data['query'] = $this->manage_galeri->get('id');
        $this->load->view('galeri', $data);
    }

    function testimoni() {
        $this->load->module('manage_testimoni');
        $data['query'] = $this->manage_testimoni->get('id');
        $this->load->view('testimoni', $data);
    }

    function client() {
        $this->load->module('manage_ourClient');
        $this->db->where('status', 1);
        $query=$this->db->get('clients');
        $data['query'] = $query; //$this->manage_ourClient->get_where_custom('status', 1);
        $this->load->view('klien', $data);
    }

    function banner() {
        $this->load->module('manage_banner');
        $data['query'] = $this->manage_banner->get('id');
        $this->load->view('banner', $data);
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
        $this->load->view('account', $data);   
    }

    function login($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('login_page', $data);
        // $this->load->view('account', $data);
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

    function market($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('market', $data);
    }

    function signup($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('signup', $data);
    }

    function signin($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('signin', $data);
    }

}