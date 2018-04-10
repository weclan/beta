<?php
class Selling_points extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

function fetch_data_from_post() {
    $data['prod_id'] = $this->input->post('prod_id', true);
    $data['desc'] = $this->input->post('desc', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['prod_id'] = $row->prod_id;
        $data['desc'] = $row->desc;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}


function delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('store_roads/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The road were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('store_roads/manage');
    }
}


function get($order_by)
{
    $this->load->model('mdl_selling_points');
    $query = $this->mdl_selling_points->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_selling_points');
    $query = $this->mdl_selling_points->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_selling_points');
    $query = $this->mdl_selling_points->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_selling_points');
    $query = $this->mdl_selling_points->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_selling_points');
    $this->mdl_selling_points->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_selling_points');
    $this->mdl_selling_points->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_selling_points');
    $this->mdl_selling_points->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_selling_points');
    $count = $this->mdl_selling_points->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_selling_points');
    $max_id = $this->mdl_selling_points->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_selling_points');
    $query = $this->mdl_selling_points->_custom_query($mysql_query);
    return $query;
}

}