<?php
class Manage_kontak extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_kontak/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subjek', 'Subjek', 'trim|required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The contact were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_kontak/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The contact was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_kontak/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Kontak";
    } else {
        $data['headline'] = "Update Kontak";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_kontak";
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_kontak";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    $data['nama'] = $this->input->post('nama', true);
    $data['email'] = $this->input->post('email', true);
    $data['subjek'] = $this->input->post('subjek', true);
    $data['pesan'] = $this->input->post('pesan', true);
    $data['waktu_dibuat'] = date('Y-m-d H:i:s');
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
    // $data['status'] = $this->input->post('status', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['nama'] = $row->nama;
        $data['email'] = $row->email;
        $data['subjek'] = $row->subjek;
        $data['pesan'] = $row->pesan;
        // $data['status'] = $row->status;
        $data['waktu_dibuat'] = $row->waktu_dibuat;
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
        redirect('manage_kontak/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The contact were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_kontak/manage');
    }
}

public function index()
    {
        $this->load->view('hello');
    }

function get($order_by)
{
    $this->load->model('mdl_manage_kontak');
    $query = $this->mdl_manage_kontak->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_kontak');
    $query = $this->mdl_manage_kontak->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_kontak');
    $query = $this->mdl_manage_kontak->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_manage_kontak');
    $query = $this->mdl_manage_kontak->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_manage_kontak');
    $this->mdl_manage_kontak->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_kontak');
    $this->mdl_manage_kontak->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_manage_kontak');
    $this->mdl_manage_kontak->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_manage_kontak');
    $count = $this->mdl_manage_kontak->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_manage_kontak');
    $max_id = $this->mdl_manage_kontak->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_manage_kontak');
    $query = $this->mdl_manage_kontak->_custom_query($mysql_query);
    return $query;
}

}