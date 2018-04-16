<?php
class Category extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }

    function _remap($method, $params = array())
    {
        $method_exists = method_exists($this, $method);
        $methodToCall = $method_exists ? $method : 'index';
        $this->$methodToCall($method_exists ? $params : $method);
    } 

    function index($cat_url = '') {
        // echo $cat_url;

        if ($cat_url[0] == '') {
            redirect('category/all');
        }

        $this->load->module('store_categories');
        $cat_id = $this->store_categories->_get_item_id_from_item_url($cat_url);
        $this->store_categories->view($cat_id);
    }

    function all() {
        $this->load->module('store_categories');
        $this->store_categories->view2();
    }

    function search() {
        $this->load->module('store_categories');
        $this->load->module('store_provinces');

        $loc = $this->uri->segment(3);
        if (!is_numeric($loc)) {
            $loc_id = $this->store_provinces->get_id_from_province_name($loc);
        }

        if ($this->input->post('cat_prod')) {
            $category_id = $this->input->post('cat_prod');
        }

        if ($this->input->post('cat_prov')) {
            $province_id = $this->input->post('cat_prov');
        } elseif ($loc) {
            $province_id = $loc_id;
        }

        if ($this->input->post('cat_city')) {
            $city_id = $this->input->post('cat_city');
        }

        $this->store_categories->search(isset($category_id) ? $category_id : null, isset($province_id) ? $province_id : null, isset($city_id) ? $city_id : null);
    }
}