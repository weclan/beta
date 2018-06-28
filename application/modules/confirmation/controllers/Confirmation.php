<?php
class Confirmation extends MX_Controller 
{

    var $path_image = './marketplace/konfirmasi/';
    function __construct() {
        parent::__construct();
    }

function add_confirm() {
    $this->load->library('session');

    $submit = $this->input->post('submit');

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('order_id', 'Order ID', 'trim|required');
        $this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('no_rek', 'No Rekening', 'trim|required');
        $this->form_validation->set_rules('jml_transfer', 'Nominal Transfer', 'trim|required');
        $this->form_validation->set_rules('bank', 'Bank', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            // jika ada gambar
            if ($_FILES['name_field']['name']) {

                $nama_baru = str_replace(' ', '_', $_FILES['bukti']['name']);       
                $nmfile = date("ymdHis").'_'.$nama_baru;

                $config['upload_path']          = $this->path_image;
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name'] = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                // check upload berhasil ato tidak
                if ( ! $this->upload->do_upload('bukti'))
                {
                    $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
                    $data['view_file'] = "payment_confirmation";
                    $this->load->module('templates');
                    $this->templates->market($data);
                }
                else
                {
                    // insert other data to db
                    $confirm_data = $this->fetch_data_from_post();
                    $this->_insert($confirm_data);
                    $update_id = $this->get_max();

                    $data = array('upload_data' => $this->upload->data());

                    $upload_data = $data['upload_data'];
                    $file_name = $upload_data['file_name'];
                    $this->_generate_thumbnail($file_name);

                    //update database
                    $update_data['pic_evidance'] = $$nmfile;
                    $this->_update($update_id, $update_data);

                    $flash_msg = "The image were successfully uploaded.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                }

            } else {  // jika tanpa gambar
                $data = $this->fetch_data_from_post();
                $this->_insert($data);

                $$flash_msg = "The payment confirmation was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('confirmation');
            }
            
        } else {
            $flash_msg = "The payment confirmation added was failed.";
            $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('confirmation');
        }
    }
}

function _compress_report($file_name, $type) {
    $this->load->module('manage_product');
    $loc = $this->manage_product->location($type);
    // create thumbnail

    $config['image_library'] = 'gd2';
    $config['source_image'] = $loc.$file_name;
    $config['new_image'] = $loc.'300x160/'.$file_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 300;
    $config['height']       = 160;

    // $this->image_lib->initialize($config);
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
}

function add_image() {
    $nama_baru = str_replace(' ', '_', $_FILES['userfile']['name']);
                
    $nmfile = date("ymdHis").'_'.$nama_baru;

    $config['upload_path']          = $loc; //$this->path;
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size'] = '50048'; //maksimum besar file 5 mb
    $config['max_width']  = '1600'; //lebar maksimum 1288 px
    $config['max_height']  = '768'; //tinggi maksimu 768 px    
    $config['file_name'] = $nmfile; //nama yang terupload nantinya

    $location = base_url().$loc.$nmfile;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
        $error_msg = $this->upload->display_errors();
        $flash_msg = "The file were could not be added.";
        $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_product/maintenance/'.$update_id);
    }
    else
    {
        $this->_compress_report($nmfile, $type);

        $this->db->insert('maintain_report', array('prod_id' => $prod_id, 'image' => $nmfile, 'type' => $type, 'token' => $token, 'created_at' => time()));

        $flash_msg = "The file were successfully added.";
        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_product/maintenance/'.$update_id);
    }    
}

public function index()
{
    $this->load->library('session');
    $this->load->module('bank');
    $data['flash'] = $this->session->flashdata('item');
    $data['banks'] = $this->bank->get('id');
    $data['view_file'] = "payment_confirmation";
    $this->load->module('templates');
    $this->templates->market($data);  
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('bank');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);

    if ((is_numeric($update_id))) {
        $data = $this->fetch_data_from_db($update_id);
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Konfirmasi Pembayaran";
    } else {
        $data['headline'] = "Lihat Konfirmasi Pembayaran";
    }

    $data['banks'] = $this->bank->get('id');
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function fetch_data_from_post() {
    $data['order_id'] = $this->input->post('order_id', true);
    $data['no_rek'] = $this->input->post('no_rek', true);

    $tgl_transaksi = $this->input->post('tgl_transaksi', true);
    //fix start date
    $transaksi_date = explode('/', $tgl_transaksi);
    $transaction_date = strtotime($transaksi_date[2].'-'.$transaksi_date[0].'-'.$transaksi_date[1]);

    $data['tgl_transaksi'] = $transaction_date;
    $data['customer'] = $this->input->post('customer', true);
    $data['jml_transfer'] = $this->input->post('jml_transfer', true);
    $data['nama_bank'] = $this->input->post('nama_bank', true);
    $data['email'] = $this->input->post('email', true);
    // $data['pic_evidance'] = $this->input->post('pic_evidance', true);   
    $data['status'] = $this->input->post('status', true);
    $data['created_at'] = time();
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['order_id'] = $row->order_id;
        $data['no_rek'] = $row->no_rek;
        $data['tgl_transaksi'] = $row->tgl_transaksi;
        $data['customer'] = $row->customer;
        $data['jml_transfer'] = $row->jml_transfer;
        $data['nama_bank'] = $row->nama_bank;
        $data['email'] = $row->email;
        $data['pic_evidance'] = $row->pic_evidance;
        $data['status'] = $row->status;
        $data['created_at'] = $row->created_at;
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
        redirect('manage_faq/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The faq were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_faq/manage');
    }
}

function get($order_by)
{
    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_confirmation');
    $this->mdl_confirmation->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $this->mdl_confirmation->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $this->mdl_confirmation->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_confirmation');
    $count = $this->mdl_confirmation->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_confirmation');
    $max_id = $this->mdl_confirmation->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->_custom_query($mysql_query);
    return $query;
}

}