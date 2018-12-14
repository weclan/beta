<?php
class Manage_score extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function check_availability($order_id, $user_id) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $cek = $this->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($cek->num_rows() > 0) {
        $result = 'TRUE';
    } else {
        $result = 'FALSE';
    }

    return $result;
}

function get_score($order_id, $user_id) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $query = $this->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $visual = $row->visual;
            $penerangan = $row->penerangan;
            $view = $row->view;
            $report = $row->report;
            $konstruksi = $row->konstruksi;
            $maintenance = $row->maintenance;
        }

        $total = $visual + $penerangan + $view + $report + $konstruksi + $maintenance;
    }

    return $total;
}

function get_id($order_id, $user_id) {
    $col1 = 'order_id';
    $value1 = $order_id;
    $col2 = 'user_id';
    $value2 = $user_id;
    $query = $this->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id_score = $row->id;
        }
    }

    return $id_score;
}

function get($order_by)
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_with_limit($limit, $offset, $order_by);
    return $query;
}


function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_score');
    $this->mdl_score->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $this->mdl_score->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_score');
    $this->mdl_score->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_score');
    $count = $this->mdl_score->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_score');
    $max_id = $this->mdl_score->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_score');
    $query = $this->mdl_score->_custom_query($mysql_query);
    return $query;
}

}