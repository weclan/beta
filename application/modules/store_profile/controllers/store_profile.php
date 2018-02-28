<?php
class Store_profile extends MX_Controller 
{

var $path_big = './marketplace/photo_profil/';
function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
    $this->load->helper(array('text', 'tgl_indo_helper'));
}

    function do_upload()
    {
        $user_id = $this->session->userdata('user_id');
        if (!is_numeric($user_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('store_profile');
        }

        $config['upload_path']          = $this->path_big; //'./landingPageFiles/big_pics/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
            $data['headline'] = "Upload error";
            $data['update_id'] = $user_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_banner";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->market($data);
        }
        else
        {
    
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            //update database
            $update_data['pic'] = $file_name;
            $this->manage_daftar->_update($user_id, $update_data);

            $flash_msg = "The image were successfully uploaded.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $user_id;
            $data['flash'] = $this->session->flashdata('item');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->market($data);
        }
    }

    function upload_image() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $user_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_banner";
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->market($data);   
    }

    function update_pword() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');
        $submit = $this->input->post('submit');

        if (!is_numeric($user_id)) {
            redirect('store_profile');
        } elseif ($submit == "Cancel") {
            redirect('store_profile');
        }
        
        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[7]|max_length[35]');
            $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'trim|required|matches[pword]');

            if ($this->form_validation->run() == TRUE) {
                $pword = $this->input->post('pword', TRUE);
                $this->load->module('site_security');
                $data['pword'] = $this->site_security->_hash_string($pword);

                $this->manage_daftar->_update($user_id, $data);
                $flash_msg = "The account password was successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_profile');
                
            }
        }

        $data['headline'] = "Update Akun Password";
        $data['update_id'] = $user_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "update_pword";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function update_profil() {
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_logged_in();
        $user_id = $this->session->userdata('user_id');
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('store_profile');
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Nama', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('no_telp', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($user_id)) {

                    $this->manage_daftar->_update($user_id, $data);
                    $flash_msg = "The client were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_profile');
                }
            }
        }
    }

function fetch_data_from_post() {

    $data['username'] = $this->input->post('username', true);
    $data['email'] = $this->input->post('email', true);
    $data['no_telp'] = $this->input->post('no_telp', true);
    $data['alamat'] = $this->input->post('alamat', true);
    $data['gender'] = $this->input->post('gender', true);
    $tgl = $this->input->post('tgl_mulai', true);
    $bulan = $this->input->post('bln_mulai', true);
    $tahun = $this->input->post('thn_mulai', true);
    $data['tgl_lahir'] = $tahun.':'.$bulan.':'.$tgl;
    return $data;
}

public function index()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $this->load->module('manage_daftar');
    $query = $this->manage_daftar->get_where($user_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['username'] = $row->username;
        $data['email'] = $row->email;
        $data['no_telp'] = $row->no_telp;
        $data['alamat'] = $row->alamat;
        $data['gender'] = $row->gender;
        $data['tgl_lahir'] = $row->tgl_lahir;
        $data['status'] = $row->status;
        $data['waktu_dibuat'] = $row->waktu_dibuat;
        $data['pic'] = $row->pic;
    }

    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->market($data);
}
 

// function get($order_by)
// {
//     $this->load->model('mdl_perfectcontroller');
//     $query = $this->mdl_perfectcontroller->get($order_by);
//     return $query;
// }

// function get_with_limit($limit, $offset, $order_by) 
// {
//     if ((!is_numeric($limit)) || (!is_numeric($offset))) {
//         die('Non-numeric variable!');
//     }

//     $this->load->model('mdl_perfectcontroller');
//     $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
//     return $query;
// }

// function get_where($id)
// {
//     if (!is_numeric($id)) {
//         die('Non-numeric variable!');
//     }

//     $this->load->model('mdl_perfectcontroller');
//     $query = $this->mdl_perfectcontroller->get_where($id);
//     return $query;
// }

// function get_where_custom($col, $value) 
// {
//     $this->load->model('mdl_perfectcontroller');
//     $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
//     return $query;
// }

// function _insert($data)
// {
//     $this->load->model('mdl_perfectcontroller');
//     $this->mdl_perfectcontroller->_insert($data);
// }

// function _update($id, $data)
// {
//     if (!is_numeric($id)) {
//         die('Non-numeric variable!');
//     }

//     $this->load->model('mdl_perfectcontroller');
//     $this->mdl_perfectcontroller->_update($id, $data);
// }

// function _delete($id)
// {
//     if (!is_numeric($id)) {
//         die('Non-numeric variable!');
//     }

//     $this->load->model('mdl_perfectcontroller');
//     $this->mdl_perfectcontroller->_delete($id);
// }

// function count_where($column, $value) 
// {
//     $this->load->model('mdl_perfectcontroller');
//     $count = $this->mdl_perfectcontroller->count_where($column, $value);
//     return $count;
// }

// function get_max() 
// {
//     $this->load->model('mdl_perfectcontroller');
//     $max_id = $this->mdl_perfectcontroller->get_max();
//     return $max_id;
// }

// function _custom_query($mysql_query) 
// {
//     $this->load->model('mdl_perfectcontroller');
//     $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
//     return $query;
// }

}