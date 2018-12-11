<?php
class Manage_promo extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper('text');
}
    
    function hapus_gambar($image) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        // lokasi folder image
        $path_real = './marketplace/promo/';
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
            redirect('manage_promo/manage');
        }

        if ($submit == "Submit") {

            // var_dump($_FILES['featured_image']['name'] == '');
            // die();

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('promo_title', 'Judul Promo', 'trim|required');
            // $this->form_validation->set_rules('body', 'Isi Artikel', 'required');
            // $this->form_validation->set_rules('featured_image', 'Gambar', 'required|callback_upload_image');

            if ($this->form_validation->run() == TRUE) {
                // $data = $this->fetch_data_from_post();

                // ganti titik dengan _
                $filename = $_FILES['featured_image']['name'];
                $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
                $nama_baru = str_replace(' ', '_', $new_filename);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $loc = './marketplace/promo/';

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

                // jika ada file yg di upload
                if ($_FILES['featured_image']['name'] != '') {
                    if($_FILES['featured_image']['name'])
                    {
                        if ($this->upload->do_upload('featured_image'))
                        {
                            $data = array(
                                'promo_title' => $this->input->post('promo_title', true),
                                'promo_slug' => url_title($this->input->post('promo_title', true)),
                                'promo_desc' => $this->input->post('promo_desc', true),
                                'term_condition' => $this->input->post('term_condition', true),
                                'featured_image' => $nmfile,
                                'voucher_code' => $this->input->post('voucher_code', true),
                                'min_basket_cost' =>  $this->input->post('min_basket_cost', true),
                                'discount_operator' => $this->input->post('discount_operator', true),
                                'discount_amount' =>  $this->input->post('discount_amount', true),
                                'num_voucher' => $this->input->post('num_voucher', true),
                                'start' =>  $this->input->post('start', true),
                                'end' => $this->input->post('end', true),
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

                                $flash_msg = "The promo were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('manage_promo/create/'.$update_id);

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The promo was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('manage_promo/create/'.$update_id);
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('manage_promo/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'promo_title' => $this->input->post('promo_title', true),
                        'promo_slug' => url_title($this->input->post('promo_title', true)),
                        'promo_desc' => $this->input->post('promo_desc', true),
                        'term_condition' => $this->input->post('term_condition', true),
                        'voucher_code' => $this->input->post('voucher_code', true),
                        'min_basket_cost' =>  $this->input->post('min_basket_cost', true),
                        'discount_operator' => $this->input->post('discount_operator', true),
                        'discount_amount' =>  $this->input->post('discount_amount', true),
                        'num_voucher' => $this->input->post('num_voucher', true),
                        'start' =>  $this->input->post('start', true),
                        'end' => $this->input->post('end', true),
                        'status' => $this->input->post('status', true),
                        'created' => time(),
                        'modified' => time(),
                    );

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The promo were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('manage_promo/create/'.$update_id);
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The promo was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('manage_promo/create/'.$update_id);
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
            $data['headline'] = "Tambah Promo";
        } else {
            $data['headline'] = "Update Promo";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function _compress_image($file_name) {
        $path_real = './marketplace/promo/';
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
            redirect('manage_promo/create/'.$update_id);
        } elseif ($submit == "Delete") {
            // delete featured image
            $this->_process_delete($update_id);

            // delete the item record from db
            $this->_delete($update_id); 
            
            $flash_msg = "The promo were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('manage_promo/manage');
        }
    }

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['featured_image'];
        $small_pic = $big_pic;

        $path_real = './marketplace/promo/';
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

        $path_real = './marketplace/promo/';
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

        $flash_msg = "The promo image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_promo/create/'.$update_id);
    } 

    // function upload_image() {
    //     $nama_baru = str_replace(' ', '_', $_FILES['featured_image']['name']);
                
    //     $nmfile = date("ymdHis").'_'.$nama_baru;
    //     $loc = './marketplace/promo/';

    //     $config['upload_path']          = $loc; //$this->path;
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['max_size'] = '20048'; //maksimum besar file 2M
    //     $config['max_width']  = '1600'; //lebar maksimum 1288 px
    //     $config['max_height']  = '768'; //tinggi maksimu 768 px    
    //     $config['file_name'] = $nmfile; //nama yang terupload nantinya

    //     $location = base_url().$loc.$nmfile;

    //     $this->load->library('upload', $config);

    //     // update database
    //     $this->db->update('vendor', array('SIUP' => $nmfile), array('id' => $id));

    //     if ($this->upload->do_upload('featured_image')) {
    //         return TRUE;
    //     } else {
    //         $error_msg = $this->upload->display_errors();
    //         $this->form_validation->set_message('featured_image', $this->upload->display_errors());
    //         return FALSE;
    //     }

    // }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM promo ORDER BY id DESC";

        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['promo_title'] = $this->input->post('promo_title', true);
        $data['promo_slug'] = url_title($this->input->post('promo_title', true));
        $data['promo_desc'] = $this->input->post('promo_desc', true);
        $data['term_condition'] = $this->input->post('term_condition', true);
        $data['voucher_code'] = $this->input->post('voucher_code', true);
        $data['min_basket_cost'] =  $this->input->post('min_basket_cost', true);
        $data['discount_operator'] = $this->input->post('discount_operator', true);
        $data['discount_amount'] =  $this->input->post('discount_amount', true);
        $data['num_voucher'] = $this->input->post('num_voucher', true);
        $data['start'] =  $this->input->post('start', true);
        $data['end'] = $this->input->post('end', true);
        $data['status'] = $this->input->post('status', true);
        $data['created'] = time();
        $data['modified'] = time();
        return $data;
    }

    function fetch_data_from_db($updated_id) {
        $query = $this->get_where($updated_id);
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['promo_title'] = $row->promo_title;
            $data['promo_slug'] = $row->promo_slug;
            $data['promo_desc'] = $row->promo_desc;
            $data['term_condition'] = $row->term_condition;
            $data['featured_image'] = $row->featured_image;
            $data['voucher_code'] = $row->voucher_code;
            $data['min_basket_cost'] = $row->min_basket_cost;
            $data['discount_operator'] = $row->discount_operator;
            $data['discount_amount'] = $row->discount_amount;
            $data['num_voucher'] = $row->num_voucher;
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