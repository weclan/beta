<?php
class Filter_nav extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('hello');
    }

    function _draw_filter_top() {
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('store_categories');
        
        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['jenis'] = $this->store_categories->get('id');
        $this->load->view('filter_top_nav', $data);
    }

    function _draw_filter_cat() {
        $this->load->view('filter_cat_page');
    }

    function _draw_filter_loc() {
        $this->load->module('store_provinces');

        $mysql_query = "select * from provinsi where big_pic != ''";
        // $data['prov'] = $this->store_provinces->get('id_prov');
        $data['prov'] = $this->store_provinces->_custom_query($mysql_query);
        $this->load->view('filter_location', $data);
    }

}