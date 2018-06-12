<?php
class Vendor extends MX_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
    }

    public function index()
    {
        $this->load->library('session');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');

        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "vendor";
        $this->load->module('templates');
        $this->templates->market($data);  
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM vendor ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);

    }

    function define_cat_name($cat) {
        switch ($cat) {
            case 1:
                $kate = 'Vendor Asuransi';
                break;

            case 2:
                $kate = 'Vendor Produksi';
                break;

            default:
                $kate = 'Vendor Pengurusan & Perijinan';
                break;
        }

        return $kate;
    }

    function location($type) {
        switch ($type) {
            // foto dokumen
            case 'SIUP':
                $loc = './marketplace/vendor/SIUP/';
                break;

            case 'TDP':
                $loc = './marketplace/vendor/TDP/';
                break;
                
            case 'NPWP':
                $loc = './marketplace/vendor/NPWP/';
                break;   
  
            // akte
            default:
                $loc = './marketplace/vendor/akte/';
                break;
        }

        $path = $loc;
        return $path;
    }

    function upload_image_siup() {
        $nama_baru = str_replace(' ', '_', $_FILES['siup']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'SIUP';
        $loc = $this->location($type);

        $config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size'] = '20048'; //maksimum besar file 2M
        $config['max_width']  = '1600'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('siup')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('siup', $this->upload->display_errors());
            return FALSE;
        }

    }

    function upload_image_tdp() {
        $nama_baru = str_replace(' ', '_', $_FILES['tdp']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'TDP';
        $loc = $this->location($type);

        $config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size'] = '20048'; //maksimum besar file 2M
        $config['max_width']  = '1600'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('tdp')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('tdp', $this->upload->display_errors());
            return FALSE;
        }

    }

    function upload_image_npwp() {
        $nama_baru = str_replace(' ', '_', $_FILES['npwp']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'NPWP';
        $loc = $this->location($type);

        $config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size'] = '20048'; //maksimum besar file 2M
        $config['max_width']  = '1600'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('npwp')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('npwp', $this->upload->display_errors());
            return FALSE;
        }

    }

    function upload_image_akte() {
        $nama_baru = str_replace(' ', '_', $_FILES['akte']['name']);
                
        $nmfile = date("ymdHis").'_'.$nama_baru;
        $type = 'Akte';
        $loc = $this->location($type);

        $config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size'] = '20048'; //maksimum besar file 2M
        $config['max_width']  = '1600'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('akte')) {
            return TRUE;
        } else {
            $error_msg = $this->upload->display_errors();
            $this->form_validation->set_message('akte', $this->upload->display_errors());
            return FALSE;
        }

    }

    function add_vendor() {
        $this->load->library('session');

        // $data['nama'] = $this->input->post('nama', true);
        // $data['email'] = $this->input->post('email', true);
        // $data['alamat'] = $this->input->post('alamat', true);
        // $data['vendor_cat'] = $this->input->post('vendor_cat', true);
        // $data['telp'] = $this->input->post('telp', true);
        // $data['keuntungan'] = $this->input->post('keuntungan', true);
        // $data['siup'] = $_FILES['siup'];
        // var_dump($data);
        // die(); 

        $submit = $this->input->post('submit');

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
            $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[204]');
            $this->form_validation->set_rules('telp', 'No telpon', 'required|numeric');
            $this->form_validation->set_rules('email', 'Alamat email', 'trim|required|valid_email');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            $this->form_validation->set_rules('siup', 'SIUP', 'required|callback_upload_image_siup');
            $this->form_validation->set_rules('tdp', 'TDP', 'required|callback_upload_image_tdp');
            $this->form_validation->set_rules('npwp', 'NPWP', 'required|callback_upload_image_npwp');
            $this->form_validation->set_rules('akte', 'Akte', 'required|callback_upload_image_akte');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                $this->_insert($data);

                $flash_msg = "The vendor was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            } else {
                $flash_msg = "The vendor was failed added.";
                $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('vendor');
            }
        }
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
        if ($submit == "Delete") {
            // delete the item record from db
            $this->_delete($update_id);

            $flash_msg = "The vendor were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('vendor/manage');
        }
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('vendor/manage');
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('telp', 'Deskripsi', 'required');
            $this->form_validation->set_rules('email', 'Alamat email', 'trim|required|valid_email');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                // $data['item_url'] = url_title($data['item_title']);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The vendor were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('vendor/create/'.$update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $flash_msg = "The vendor was successfully added.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('vendor/create/'.$update_id);
                }
            }
        }

        if ((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Tambah Vendor";
        } else {
            $data['headline'] = "Update Vendor";
        }

        $data['prov'] = $this->store_provinces->get('id_prov');
        $data['city'] = $this->store_cities->get('id_kab');
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['nama'] = $this->input->post('nama', true);
        $data['pic'] = $this->input->post('pic', true);
        $data['url'] = $this->input->post('url', true);
        $data['email'] = $this->input->post('email', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['vendor_cat'] = $this->input->post('vendor_cat', true);
        $data['telp'] = $this->input->post('telp', true);
        $data['keuntungan'] = $this->input->post('keuntungan', true);
        $data['cat_prov'] = $this->input->post('cat_prov', true);
        $data['cat_city'] = $this->input->post('cat_city', true);
        $data['created_at'] = time();
        $data['status'] = $this->input->post('status', true);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['nama'] = $row->nama;
            $data['pic'] = $row->pic;
            $data['url'] = $row->url;
            $data['email'] = $row->email;
            $data['alamat'] = $row->alamat;
            $data['vendor_cat'] = $row->vendor_cat;
            $data['created_at'] = $row->created_at;
            $data['telp'] = $row->telp;
            $data['keuntungan'] = $row->keuntungan;
            $data['cat_prov'] = $row->cat_prov;
            $data['cat_city'] = $row->cat_city;
            $data['status'] = $row->status;
            $data['SIUP'] = $row->SIUP;
            $data['TDP'] = $row->TDP;
            $data['NPWP'] = $row->NPWP;
            $data['Akte'] = $row->Akte;
        }

        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function get($order_by)
    {
        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_vendor');
        $this->mdl_vendor->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $this->mdl_vendor->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_vendor');
        $this->mdl_vendor->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_vendor');
        $count = $this->mdl_vendor->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_vendor');
        $max_id = $this->mdl_vendor->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_vendor');
        $query = $this->mdl_vendor->_custom_query($mysql_query);
        return $query;
    }

}