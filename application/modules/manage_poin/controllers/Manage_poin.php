<?php
class Manage_poin extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

public function index()
{
    $this->load->view('hello');
}

function get_total_score($user_id) {
    $col = 'user_id';
    $value = $user_id;
    $cek = $this->get_where_custom($col, $value);    

    if ($cek->num_rows() > 0) {
        // get poin
        $point = $this->db->where('user_id', $user_id)->get('points')->row()->points;
    }

    if ($point >= 10) {
        $poin = $point;
    } else {
        $poin = 0;
    }
    return $poin;
}

function update_poin($user_id, $old_poin, $new_poin) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // cek available data
    if ($this->check_availability($user_id) == 'TRUE') {
        // get id
        $id_points = $this->db->where('user_id', $user_id)->get('points')->row()->id;
        // get poin
        $point = $this->db->where('user_id', $user_id)->get('points')->row()->points;
        // proses pengurangan poin
        $this->substract_poin($id_points, $user_id, $point, $old_poin);

        // current poin
        $curr_point = $this->db->where('id', $id_points)->get('points')->row()->points;

        // proses penambahan poin
        $this->add_poin($id_points, $user_id, $curr_point, $new_poin);
    }
}

function substract_poin($id, $user_id, $point, $old_poin) {
    $curr_point = $points - $old_poin;

    $this->_update($id, 
        array(
            'user_id' => $user_id,
            'points' => $curr_point,
            'modified' => time()
        )
    )
}

function add_poin($id, $user_id, $curr_point, $new_poin) {
    $curr_point = $curr_point + $new_poin;

    $this->_update($id, 
        array(
            'user_id' => $user_id,
            'points' => $curr_point,
            'modified' => time()
        )
    )
}

function check_availability($user_id) {
    $col = 'user_id';
    $value = $user_id;
    $cek = $this->get_where_custom($col, $value);

    if ($cek->num_rows() > 0) {
        $result = 'TRUE';
    } else {
        $result = 'FALSE';
    }

    return $result;
}

function get($order_by)
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_poin');
    $this->mdl_poin->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $this->mdl_poin->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_poin');
    $this->mdl_poin->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_poin');
    $count = $this->mdl_poin->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_poin');
    $max_id = $this->mdl_poin->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_poin');
    $query = $this->mdl_poin->_custom_query($mysql_query);
    return $query;
}

}