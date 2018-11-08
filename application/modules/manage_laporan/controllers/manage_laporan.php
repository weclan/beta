<?php
class Manage_laporan extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function getData() {
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $mysql_query = "SELECT * FROM laporan ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    $path = base_url().'marketplace/laporan/';
    foreach($query->result() as $row){
        $edit_laporan = base_url()."manage_laporan/view/".$row->id;
        $opened = $row->opened;
        $status = $row->status;

        if ($status == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Aktive";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Inactive";
        }

        $image1 = $row->image1;
        $image2 = $row->image2;

        $path_img1 = $path.$image1;
        $path_img2 = $path.$image2;

        // get data from store_order
        $order_id = $row->order_id;
        $order = $this->db->where('id', $order_id)->get('store_orders')->row();

        $item_id = $order->item_id;
        $lokasi = $order->item_title;

        $klien = $this->manage_daftar->_get_customer_name($row->user_id);
        $toko = $this->manage_daftar->_get_customer_name($order->shop_id);
        $tgl = $this->timedate->get_nice_date($row->created_at,'indo');

        $data_laporan[] = array(
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."manage_laporan/view/".$row->id."'><i class='la la-file-text'></i> Preview</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->id."/manage_laporan\")'><i class='la la-trash'></i> Delete</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."manage_laporan/view/".$row->id."'>".$lokasi."</a>",
            "Order" => $order->no_order,
            "Klien" => $klien,
            "Owner" => $toko,
            "Image1" => $path_img1,
            "Image2" => $path_img2,
            "Status" => "<span style='width: 110px;''><span class='m-badge <?= $status_label ?> m-badge--wide'>".$status_desc." </span></span>",
            "Tanggal" => $tgl,
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_laporan."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_laporan);
}

function open($opened) {
    return ($opened != 1)? 'seal' : '';
}

function status($status) {
    return ($status == 1)? 'Active' : 'Inactive';
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
        $data['image1'] = $row->image1;
        $data['image2'] = $row->image2;
        $data['created_at'] = $row->created_at;
        $data['status'] = $row->status;
        $data['opened'] = $row->opened;
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

        redirect('manage_laporan/manage');
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
        redirect('manage_laporan/view/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The materi were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_laporan/manage');
    }
}

function get($order_by)
{
    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_laporan');
    $this->mdl_laporan->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $this->mdl_laporan->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_laporan');
    $this->mdl_laporan->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_laporan');
    $count = $this->mdl_laporan->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_laporan');
    $max_id = $this->mdl_laporan->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_laporan');
    $query = $this->mdl_laporan->_custom_query($mysql_query);
    return $query;
}

}