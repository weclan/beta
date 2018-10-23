<?php
class Manage_materi extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

function show_archived() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // $mysql_query = "SELECT * FROM komplain WHERE archive = 1 ORDER BY id DESC";
    // $data['query'] = $this->_custom_query($mysql_query);

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "archived";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function getDataArchive() {
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $mysql_query = "SELECT * FROM materi WHERE archive = 1 ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $edit_materi = base_url()."manage_materi/view/".$row->id;
        $status = $row->status;
        $opened = $row->opened;
        $selected = $row->selected;
        $download = $row->download;

        if ($status == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Resolve";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Unsolved";
        }

        // get data from store_order
        $order_id = $row->order_id;
        $order = $this->db->where('id', $order_id)->get('store_orders')->row();

        $item_id = $order->item_id;
        $lokasi = $order->item_title;

        $klien = $this->manage_daftar->_get_customer_name($row->user_id);
        $toko = $this->manage_daftar->_get_customer_name($order->shop_id);
        $tgl = $this->timedate->get_nice_date($row->created_at,'indo');

        $data_archive[] = array(
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."manage_materi/view/".$row->id."'><i class='la la-file-text'></i> Preview</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/set_selected/".$row->id."/manage_materi\")'><i class='la la-check-circle-o'></i> Set resolve</a> 
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->id."/manage_materi\")'><i class='la la-trash'></i> Delete</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/archive/".$row->id."/manage_materi\")'><i class='la la-briefcase'></i> Archive</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."manage_materi/view/".$row->id."'>".$lokasi."</a>",
            "Order" => $order->no_order,
            "Klien" => $klien,
            "Owner" => $toko,
            "Materi" => $row->materi,
            "Select" => $this->statuta($row->selected),
            "Status" => "<span style='width: 110px;''><span class='m-badge <?= $status_label ?> m-badge--wide'>".$status_desc." </span></span>",
            "Tanggal" => $tgl,
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_materi."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_archive);
}

function getData() {
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $mysql_query = "SELECT * FROM materi ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $edit_materi = base_url()."manage_materi/view/".$row->id;
        $status = $row->status;
        $opened = $row->opened;
        $selected = $row->selected;
        $download = $row->download;

        if ($status == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Resolve";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Unsolved";
        }

        // get data from store_order
        $order_id = $row->order_id;
        $order = $this->db->where('id', $order_id)->get('store_orders')->row();

        $item_id = $order->item_id;
        $lokasi = $order->item_title;

        $klien = $this->manage_daftar->_get_customer_name($row->user_id);
        $toko = $this->manage_daftar->_get_customer_name($order->shop_id);
        $tgl = $this->timedate->get_nice_date($row->created_at,'indo');

        $data_materi[] = array(
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."manage_materi/view/".$row->id."'><i class='la la-file-text'></i> Preview</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/set_selected/".$row->id."/manage_materi\")'><i class='la la-check-circle-o'></i> Set resolve</a> 
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->id."/manage_materi\")'><i class='la la-trash'></i> Delete</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/archive/".$row->id."/manage_materi\")'><i class='la la-briefcase'></i> Archive</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."manage_materi/view/".$row->id."'>".$lokasi."</a>",
            "Order" => $order->no_order,
            "Klien" => $klien,
            "Owner" => $toko,
            "Materi" => $row->materi,
            "Select" => $this->statuta($row->selected),
            "Status" => "<span style='width: 110px;''><span class='m-badge <?= $status_label ?> m-badge--wide'>".$status_desc." </span></span>",
            "Tanggal" => $tgl,
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_materi."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_materi);
}


function open($opened) {
    return ($opened != 1)? 'seal' : '';
}

function statuta($status) {
    return ($status == 1)? 'Selected' : 'Unselected';
}

function _set_to_opened($update_id) {
    $data['opened'] = 1;
    $this->_update($update_id, $data);
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_materi/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('materi', 'Komplain', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            // $data['item_url'] = url_title($data['item_title']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The materi were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_materi/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The materi was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_materi/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Task";
    } else {
        $data['headline'] = "Update Task";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function view($materi_id = null) {
    $this->load->module('site_security');
    $this->load->module('site_settings');
    $this->load->module('timedate');
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->site_security->_make_sure_is_admin();

    $query = $this->get_where($materi_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $order_id = $row->order_id;
        $user_id = $row->user_id;
        $data['judul'] = $row->headline;
        $data['komplain_body'] = $row->komplain_body;
        $data['image'] = $row->image;
        $data['status'] = $this->statuta($row->status);
        $created_at = $row->created_at;
    }

    // get data from store_order
    $order = $this->db->where('id', $order_id)->get('store_orders')->row();

    $data['id_order'] = $order->no_order;
    $data['lokasi'] = $order->item_title;
    $data['klien'] = $this->manage_daftar->_get_customer_name($user_id);
    $data['owner'] = $this->manage_daftar->_get_customer_name($order->shop_id);
    $data['tgl_komplain'] = $this->timedate->get_nice_date($created_at, 'indo');

    $this->_set_to_opened($materi_id);

    $data['headline'] = 'Komplain Detail';

    $data['update_id'] = $materi_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

}

function fetch_data_from_post() {
    $data['order_id'] = $this->input->post('order_id', true);
    $data['user_id'] = $this->input->post('user_id', true);
    $data['item_id'] = $this->input->post('item_id', true);
    // $data['materi'] = $this->input->post('materi', true);
    $data['created_at'] = time();
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['order_id'] = $row->order_id;
        $data['user_id'] = $row->user_id;
        $data['item_id'] = $row->item_id;
        $data['materi'] = $row->materi;
        $data['created_at'] = $row->created_at;
        $data['status'] = $row->status;
        $data['opened'] = $row->opened;
        $data['selected'] = $row->selected;
        $data['download'] = $row->download;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function archive() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->input->post('materi_id');
    $submit = $this->input->post('submit', TRUE);

     if ($submit == "Submit") {
        $data = array(
            'archive' => 1
        );

        $this->_update($update_id, $data);

        $flash_msg = "The materi were successfully archived.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_materi/manage');
    }
}

function set_to_selected() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // cari semua materi yg terkait

    $update_id = $this->input->post('materi_id');
    $submit = $this->input->post('submit', TRUE);

    if ($submit == "Submit") {
        $data = array(
            'selected' => 1
        );

        $this->_update($update_id, $data);

        $flash_msg = "The materi were successfully selected.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_materi/manage');
    }
}

function delete($update_id = null)
{
    if (!is_numeric($update_id)) {
        $update_id = $this->input->post('materi_id');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('manage_materi/view/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The materi were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_materi/manage');
    }
}

function get($order_by)
{
    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_materi');
    $this->mdl_materi->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $this->mdl_materi->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_materi');
    $this->mdl_materi->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_materi');
    $count = $this->mdl_materi->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_materi');
    $max_id = $this->mdl_materi->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_materi');
    $query = $this->mdl_materi->_custom_query($mysql_query);
    return $query;
}

}