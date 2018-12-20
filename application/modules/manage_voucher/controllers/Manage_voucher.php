<?php
class Manage_voucher extends MX_Controller 
{

function __construct() {
parent::__construct();
}

    function hapus_gambar($image) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        // lokasi folder image
        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';
        //lokasi gambar secara spesifik
        $image1 = $path_real.$image;
        $image2 = $path_compress.$image;
        //hapus image
        unlink($image1);
        unlink($image2);
    }

    function create() {
        error_reporting(0);
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('manage_voucher/manage');
        }

        if ($submit == "Submit") {

            // var_dump($_FILES['featured_image']['name'] == '');
            // die();

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('voucher_title', 'Judul Voucher', 'trim|required');
            // $this->form_validation->set_rules('body', 'Isi Artikel', 'required');
            // $this->form_validation->set_rules('featured_image', 'Gambar', 'required|callback_upload_image');

            if ($this->form_validation->run() == TRUE) {
                // $data = $this->fetch_data_from_post();

                // ganti titik dengan _
                $filename = $_FILES['featured_image']['name'];
                $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
                $nama_baru = str_replace(' ', '_', $new_filename);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $loc = './marketplace/voucher/';

                $config['upload_path']   = $loc;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '0';
                $config['max_size'] = '0';
                $config['max_size'] = '0';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_name'] = $nmfile;

                $this->load->library('upload');
                $this->upload->initialize($config);

                $start =  $this->input->post('start', true);
                $end = $this->input->post('end', true);
                //fix start date
                $start_date = explode('/', $start);
                $awal = strtotime($start_date[2].'-'.$start_date[1].'-'.$start_date[0]);

                //fix end date
                $end_date = explode('/', $end);
                $akhir = strtotime($end_date[2].'-'.$end_date[1].'-'.$end_date[0]);

                // jika ada file yg di upload
                if ($_FILES['featured_image']['name'] != '') {
                    if($_FILES['featured_image']['name'])
                    {
                        if ($this->upload->do_upload('featured_image'))
                        {
                            $data = array(
                                'voucher_title' => $this->input->post('voucher_title', true),
                                'voucher_slug' => strtolower(url_title($this->input->post('voucher_slug', true))),
                                'ketentuan' => $this->input->post('ketentuan', true),
                                'cara_pakai' => $this->input->post('cara_pakai', true),
                                'featured_image' => $nmfile,
                                'num_voucher' =>  $this->input->post('num_voucher', true),
                                'min_transaction' => $this->input->post('min_transaction', true),
                                'point_use' =>  $this->input->post('point_use', true),
                                'start' =>  $awal,
                                'end' => $akhir,
                                'status' => $this->input->post('status', true),
                                'created' => time(),
                                'modified' => time(),
                            );

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $featured_image = $data_old['featured_image'];

                                // hapus gambar
                                $this->hapus_gambar($featured_image);

                                $this->_update($update_id, $data);

                                $flash_msg = "The voucher were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('manage_voucher/create/'.$update_id);

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The voucher was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('manage_voucher/create/'.$update_id);
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('manage_voucher/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'voucher_title' => $this->input->post('voucher_title', true),
                        'voucher_slug' => strtolower(url_title($this->input->post('voucher_slug', true))),
                        'ketentuan' => $this->input->post('ketentuan', true),
                        'cara_pakai' => $this->input->post('cara_pakai', true),
                        'num_voucher' =>  $this->input->post('num_voucher', true),
                        'min_transaction' => $this->input->post('min_transaction', true),
                        'point_use' =>  $this->input->post('point_use', true),
                        'start' =>  $awal,
                        'end' => $akhir,
                        'status' => $this->input->post('status', true),
                        'created' => time(),
                        'modified' => time(),
                    );

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The voucher were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('manage_voucher/create/'.$update_id);
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The voucher was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('manage_voucher/create/'.$update_id);
                    }

                }

            }
        }

        if ((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Tambah Voucher";
        } else {
            $data['headline'] = "Update Voucher";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function _compress_image($file_name) {
        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_real.$file_name;
        $config['new_image'] = $path_compress.$file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = 870;
        $config['height']       = 342;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
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
            redirect('manage_voucher/create/'.$update_id);
        } elseif ($submit == "Delete") {
            // delete featured image
            $this->_process_delete($update_id);

            // delete the item record from db
            $this->_delete($update_id); 
            
            $flash_msg = "The voucher were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('manage_voucher/manage');
        }
    }

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['featured_image'];
        $small_pic = $big_pic;

        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';

        $big_pic_path = $path_real.$big_pic;
        $small_pic_path = $path_compress.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['featured_image'] = "";
        $this->_update($update_id, $data);
    }


    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $image = $data['featured_image'];

        $path_real = './marketplace/voucher/';
        $path_compress = $path_real.'compress/';
        $big_pic_path = $path_real.$image;
        $small_pic_path = $path_compress.$image;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['featured_image'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The voucher image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_voucher/create/'.$update_id);
    } 

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM voucher ORDER BY id DESC";

        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

     function fetch_data_from_post() {
        $data['voucher_title'] = $this->input->post('voucher_title', true);
        $data['voucher_slug'] = url_title($this->input->post('voucher_slug', true));
        $data['ketentuan'] = $this->input->post('ketentuan', true);
        $data['cara_pakai'] = $this->input->post('cara_pakai', true);
        $data['point_use'] = $this->input->post('point_use', true);
        $data['min_transaction'] =  $this->input->post('min_transaction', true);
        $data['num_voucher'] = $this->input->post('num_voucher', true);
        $start =  $this->input->post('start', true);
        $end = $this->input->post('end', true);
        //fix start date
        $start_date = explode('/', $start);
        $awal = strtotime($start_date[2].'-'.$start_date[1].'-'.$start_date[0]);

        //fix end date
        $end_date = explode('/', $end);
        $akhir = strtotime($end_date[2].'-'.$end_date[1].'-'.$end_date[0]);
        $data['start'] =  $awal;
        $data['end'] = $akhir;
        $data['status'] = $this->input->post('status', true);
        $data['created'] = time();
        $data['modified'] = time();
        return $data;
    }

    function fetch_data_from_db($updated_id) {
        $query = $this->get_where($updated_id);
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['voucher_title'] = $row->voucher_title;
            $data['voucher_slug'] = $row->voucher_slug;
            $data['ketentuan'] = $row->ketentuan;
            $data['cara_pakai'] = $row->cara_pakai;
            $data['featured_image'] = $row->featured_image;
            $data['num_voucher'] = $row->num_voucher;
            $data['min_transaction'] = $row->min_transaction;
            $data['point_use'] = $row->point_use;
            $data['start'] = $row->start;
            $data['end'] = $row->end;
            $data['status'] = $row->status;
            $data['created'] = $row->created;
            $data['modified'] = $row->modified;
        }
            
        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

function get($order_by)
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_voucher');
    $this->mdl_voucher->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $this->mdl_voucher->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_voucher');
    $this->mdl_voucher->_delete($id);
}

function num_voucher_where($column, $value) 
{
    $this->load->model('mdl_voucher');
    $num_voucher = $this->mdl_voucher->num_voucher_where($column, $value);
    return $num_voucher;
}

function get_max() 
{
    $this->load->model('mdl_voucher');
    $max_id = $this->mdl_voucher->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_voucher');
    $query = $this->mdl_voucher->_custom_query($mysql_query);
    return $query;
}

}