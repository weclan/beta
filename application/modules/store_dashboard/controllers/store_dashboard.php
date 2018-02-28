<?php
class Store_dashboard extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
}

public function index()
{
    $data['view_file'] = "manage"; // "pendaftaran";
    $this->load->module('templates');
    $this->templates->market($data);
}

function get($order_by)
{
    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_store_dashboard');
    $this->mdl_store_dashboard->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $this->mdl_store_dashboard->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_dashboard');
    $this->mdl_store_dashboard->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_store_dashboard');
    $count = $this->mdl_store_dashboard->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_store_dashboard');
    $max_id = $this->mdl_store_dashboard->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_store_dashboard');
    $query = $this->mdl_store_dashboard->_custom_query($mysql_query);
    return $query;
}

}