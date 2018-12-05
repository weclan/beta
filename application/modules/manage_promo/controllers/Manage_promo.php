<?php
class Manage_promo extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

// function check_availability($prod_id) {
//     $col = 'prod_id';
//     $value = $prod_id;
//     $cek = $this->get_where_custom($col, $value);

//     if ($cek->num_rows() > 0) {
//         $result = 'TRUE';
//     } else {
//         $result = 'FALSE';
//     }

//     return $result;
// }

function get($order_by)
{
    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_promo');
    $this->mdl_promo->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $this->mdl_promo->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_promo');
    $this->mdl_promo->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_promo');
    $count = $this->mdl_promo->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_promo');
    $max_id = $this->mdl_promo->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_promo');
    $query = $this->mdl_promo->_custom_query($mysql_query);
    return $query;
}

}