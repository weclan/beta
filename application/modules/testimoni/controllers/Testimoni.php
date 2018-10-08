<?php
class Testimoni extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index()
    {   
        $this->load->library('session');
        $data['view_file'] = "testi";
        $this->load->module('templates');
        $this->templates->market($data);
    }

}