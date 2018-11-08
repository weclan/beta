<?php
class Transaction extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->model('App');
    $this->load->library('form_validation');
    $this->form_validation->CI=& $this;
}

function upload_laporan() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get order id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;

    if ($submit == "Submit") {
     
        // we retrieve the number of files that were uploaded
        $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
     
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['uploadedimages'];
     
        // first make sure that there is no error in uploading the files
        for($i=0;$i<$number_of_files;$i++)
        {
            if($_FILES['uploadedimages']['error'][$i] != 0)
            {
                // save the error message and return false, the validation of uploaded files failed
                $this->form_validation->set_message('fileupload_check', 'Couldn\'t upload the file(s)');
                return FALSE;
            }
        }
        
        // we first load the upload library
        $this->load->library('upload');
        // next we pass the upload path for the images
        $config['upload_path'] = 'marketplace/laporan/';
        // also, we make sure we allow only certain type of images
        $config['allowed_types'] = 'gif|jpg|png';
     
        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++)
        {
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];
          
            //now we initialize the upload library
            $this->upload->initialize($config);
            if ($this->upload->do_upload('uploadedimage')) {
                $this->_uploaded[$i] = $this->upload->data();
                
            } else {
                $this->form_validation->set_message('fileupload_check', $this->upload->display_errors());
                return FALSE;
            }   
        }
        
        $data = array(
                'image1' => $files['name'][0],
                'image2' => $files['name'][1]
        );
        $this->db->insert('multi_upload', $data);
        
    }
}

// now the callback validation that deals with the upload of files
    public function fileupload_check() {
    
        // we retrieve the number of files that were uploaded
        $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
     
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['uploadedimages'];
     
        // first make sure that there is no error in uploading the files
        for($i=0;$i<$number_of_files;$i++)
        {
            if($_FILES['uploadedimages']['error'][$i] != 0)
            {
                // save the error message and return false, the validation of uploaded files failed
                $this->form_validation->set_message('fileupload_check', 'Couldn\'t upload the file(s)');
                return FALSE;
            }
        }
        
        // we first load the upload library
        $this->load->library('upload');
        // next we pass the upload path for the images
        $config['upload_path'] = FCPATH . 'upload/';
        // also, we make sure we allow only certain type of images
        $config['allowed_types'] = 'gif|jpg|png';
     
        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++)
        {
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];
          
            //now we initialize the upload library
            $this->upload->initialize($config);
            if ($this->upload->do_upload('uploadedimage')) {
                $this->_uploaded[$i] = $this->upload->data();
                
            } else {
                $this->form_validation->set_message('fileupload_check', $this->upload->display_errors());
                return FALSE;
            }   
        }
        
        $data = array(
                'image1' => $files['name'][0],
                'image2' => $files['name'][1]
        );
        $this->db->insert('multi_upload', $data);

        return TRUE;
        
    }

function download_file($session_id) {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    header("Content-type:application/image");

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    // shopper id
    $shopper_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    // get id where selected
    $id_downloaded_old = $this->manage_materi->_get_id_where_downloaded($order_id, $item_id, $shopper_id);

    // cek materi 
    $query = $this->manage_materi->chosen_materi($order_id, $item_id);
    // get id where selected
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id_selected = $row->id;
        }

        // change status download
        if ($id_downloaded_old != '') {
            $this->manage_materi->_update($id_downloaded_old, array('download' => 0));
        }
       
        $this->manage_materi->_update($id_selected, array('download' => 1));

        $data_materi = $this->manage_materi->fetch_data_from_db($id_selected);
        $nama = $data_materi['materi'];

        $name = $path.$nama;
        $data = file_get_contents('./marketplace/materi/'.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
        
    } else {
        $flash_msg = "Belum ada materi yang diupload.";
        $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('transaction/sell/'.$session_id);
    }
    
}

function get_chosen_materi() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('session_id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get item id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    // get shopper id
    $shopper_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    
    $query = $this->manage_materi->chosen_materi($order_id, $item_id);
    // get id where selected
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $id_selected = $row->id;
        }
    } else {
        $id_selected = '';
    }
        
    if ($id_selected != '') {

        // cek already download or not
        $id_yet_download = $this->manage_materi->_get_id_where_selected_but_yet_download($order_id, $item_id, $shopper_id);
        // get image materi
        $data_materi = $this->manage_materi->fetch_data_from_db($id_selected);
        $img_materi = $data_materi['materi'];
        $path_materi = base_url().'marketplace/materi/convert/'.$img_materi;
        

        if ($id_selected == $id_yet_download) {
            echo "<div class='materi blur'>
                    <div class='hider'>
                        <span>materi baru!</span>
                    </div>
                    <img src='".$path_materi."'>
                </div>";
        } else {
            echo "<img src='".$path_materi."'>";
        }
    } else {
        echo "";
    }
}

function get_select_materi() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $user_id = $this->input->post('user_id');
    $session_id = $this->input->post('session_id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get id where selected
    $id_selected = $this->manage_materi->_get_id_where_selected($order_id, $user_id);
    
    if ($id_selected != '') {
        // get image materi
        $data_materi = $this->manage_materi->fetch_data_from_db($id_selected);
        $img_materi = $data_materi['materi'];
        $path_materi = base_url().'marketplace/materi/convert/'.$img_materi;
        echo "<img src='".$path_materi."'>";
    } else {
        echo "";
    }

    
}

function get_count_materi() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    $query = $this->manage_materi->count_materi_order($order_id);
    // count it
    if ($query->num_rows() > 0) {
        $count = $query->num_rows();
    } else {
        $count = 0;
    }

    echo $count;
}

function pickSelect() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');
    $id_selected_new = $this->input->post('id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get id where selected
    $id_selected_old = $this->manage_materi->_get_id_where_selected($order_id, $user_id);

    // change selected status
    // old one
    $data_old = array('selected' => 0);
    $this->manage_materi->_update($id_selected_old, $data_old);
    // new one
    $data_new = array('selected' => 1);
    $this->manage_materi->_update($id_selected_new, $data_new);
}

function getMateri() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->load->module('timedate');
    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    $query = $this->store_orders->get_where($order_id);
    foreach ($query->result() as $row) {
        $shopper_id = $row->shopper_id;
    }

    // get materi from shopper id & order id
    $col1 = 'user_id';
    $value1 = $shopper_id;
    $col2 = 'order_id';
    $value2 = $order_id;

    $hasil = $this->manage_materi->get_with_double_condition($col1, $value1, $col2, $value2);

    if ($hasil->num_rows() > 0) {
        $mysql_query = "SELECT * FROM materi WHERE user_id = $shopper_id AND order_id = $order_id ORDER BY id DESC";
        $data_query = $this->manage_materi->_custom_query($mysql_query);

        foreach ($data_query->result() as $materi) {
            $pic = $materi->materi;
            $img_materi = base_url().'marketplace/materi/convert/'.$pic;
            $date = $this->timedate->get_nice_date($materi->created_at, 'cool');
            $select = $materi->selected;

            if ($select == 1) {
                $checked = "checked";
            } else {
                $checked = "";
            }

            echo "<div class='col-md-6'>
                    <input type='checkbox' id='" .$materi->id."' value='Value".$materi->id."' name='' class='pull-right' onclick='selectOnlyThis(this.id)' ".$checked." >
                    <a href='#' class='thumbnail'>
                        <img src='".$img_materi."' class='img-responsive' alt='...'>
                    </a>

                </div>";
        }
    } 
}

function addComment() {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->site_security->_make_sure_logged_in();

    $user_id = $this->input->post('user_id');
    $session_id = $this->input->post('id');
    $chat_body = $this->input->post('comment');
    $cat = $this->input->post('cat');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    $data = array(
        'order_id' => $order_id,
        'cat_chat' => $cat,
        'user_id' => $user_id,
        'chat_body' => $chat_body,
        'created_at' => time()
    );

    if ($this->db->insert('chats', $data)) {
        return TRUE;
    }

}

function getComment() {
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->load->module('store_orders');
    $this->load->module('timedate');

    $this->site_security->_make_sure_logged_in();

    $session_id = $this->input->post('id');
    $cat = $this->input->post('cat');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    // get all comment by req id
    $this->db->where('order_id', $order_id);
    $this->db->where('cat_chat', $cat);
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('chats');

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            if ($row->user_id != 0) {
                $username = $this->manage_daftar->_get_customer_name($row->user_id);
                $alias = $this->store_orders->get_initial_name($username);
                $message = 'you';
                $image = $this->db->where('id', $row->user_id)->get('kliens')->row()->pic;
                $pic = ($image != '') ? 'marketplace/photo_profil/'.$image : 'marketplace/images/default_v3-usrnophoto1.png';
            } else {
                $message = 'other';
                $username = 'Admin';
                $pic = 'marketplace/images/adm.png';
            }

            $date = $this->timedate->get_nice_date($row->created_at, 'lengkap');

            echo "<li class='".$message."'>
                    <a class='user' href='#'><img alt='' src='".base_url().$pic."' /></a>
                    <div class='date'>
                      ".$date."
                    </div>
                    <div class='message'>
                      <p>
                        ".$row->chat_body."
                      </p>
                    </div>
                  </li>";    

        }
    }
}

public function index()
{
    $this->load->library('session');
    $this->load->helper('tgl_indo');
    $this->load->module('site_security');
    $this->load->module('store_orders');

    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $col = 'shopper_id';
    $val = $user_id;
    $mysql_query = "SELECT * FROM store_orders WHERE shopper_id = $val ORDER BY id DESC";
    $data['campaign'] = $this->store_orders->get_where_custom($col, $val);

    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->market($data);
}

function upload_materi() {
    error_reporting(0);
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_materi');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    // get order id
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;

    if ($submit == "Submit") {
        $filename = $_FILES['file']['name'];
        $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
        $nama_baru = str_replace(' ', '_', $new_filename);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $loc = './marketplace/materi/';
        $config['upload_path']          = $loc;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '1000048';
        $config['file_name']            = $nmfile; //nama yang terupload nantinya

        $this->load->library('upload', $config);

        // cek jumlah materi so far
        $query = $this->manage_materi->count_materi_order($order_id);
        // count it
        if ($query->num_rows() > 0) {
            $count = $query->num_rows();
        } 

        // jika jml materi >= 12 maka tidak dapat upload
        if ($count >= 12) {
            
            $flash_msg = "Tidak dapat upload materi lagi.";
            $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('transaction/purchase/'.$session_id,'refresh');

        } else {

            if ( ! $this->upload->do_upload('userfile'))
            {
                
            } else {

                // get id where selected
                $id_selected_old = $this->manage_materi->_get_id_where_selected($order_id, $user_id);

                // change selected status
                // old one
                if ($id_selected_old != '') {
                    $data_old = array('selected' => 0);
                    $this->manage_materi->_update($id_selected_old, $data_old);
                }
                
                $data = array(
                    'order_id'      => $order_id,
                    'item_id'       => $item_id,
                    'user_id'       => $user_id,
                    'materi'        => $nmfile,
                    'created_at'    => time(),
                    'status'        => 1,
                    'selected'      => 1,
                    'download'      => 0
                );

                $this->manage_materi->_generate_thumbnail($nmfile);
                // insert to db
                $this->manage_materi->_insert($data);

                $flash_msg = "The image were successfully uploaded.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('transaction/purchase/'.$session_id,'refresh');
            }
        }
    }
}

function komplain() {
    error_reporting(0);
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('manage_complain');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    // get order id
    $order_id = $this->store_orders->get_id_from_session_id($session_id);

    if ($submit == "Submit") {

        // var_dump($_FILES['featured_image']['name'] == '');
        // die();

        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('headline', 'Judul', 'trim|required');
        $this->form_validation->set_rules('komplain', 'komplain', 'required');

        if ($this->form_validation->run() == TRUE) {
            $filename = $_FILES['featured_image']['name'];
            $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
            $nama_baru = str_replace(' ', '_', $new_filename);
        
            $nmfile = date("ymdHis").'_'.$nama_baru;
            
            $loc = './marketplace/komplain/';

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
                            'order_id' => $order_id,
                            'user_id' => $user_id,
                            'headline' => $this->input->post('headline', true),
                            'komplain_body' => $this->input->post('komplain', true),
                            'image' => $nmfile,
                            'status' =>  1,
                            'created_at' => time(),
                        );

                        $this->manage_complain->_insert($data);

                        $flash_msg = "The komplain was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('transaction/purchase/'.$session_id);

                    } else {
                        $flash_msg = "Upload failed!.";
                        $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('transaction/purchase/'.$session_id);
                    }
                }
            } else {
                $data = array(
                    'order_id' => $order_id,
                    'user_id' => $user_id,
                    'headline' => $this->input->post('headline', true),
                    'komplain_body' => $this->input->post('komplain', true),
                    'status' =>  1,
                    'created_at' => time(),
                );

                $this->manage_complain->_insert($data);

                $flash_msg = "The komplain was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('transaction/purchase/'.$session_id);

            }

        }
    }
}

function ulas_lokasi() {
    $this->load->library('session');
    $this->load->module('review');
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    $session_id = $this->input->post('session_id');
    $user_id = $this->input->post('user_id');

    if ($submit == 'Submit') {
        // get id from session order
        $order_id = $this->store_orders->get_id_from_session_id($session_id);

        $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
        $prod_id = $item_id;
        $headline = $this->input->post('headline', true);
        $ulasan = $this->input->post('ulasan', true);
        $rating = $this->input->post('rating', true);
        $token = $this->site_security->generate_random_string(6);

        $data = array(
            'user_id' => $user_id,
            'prod_id' => $prod_id,
            'headline' => $headline,
            'body' => $ulasan,
            'rating' => $rating,
            'token' => $token,
            'date' => time(),
            'status' => 0 
        );

        if ($this->review->_insert($data)) {
            $flash_msg = "berhasil menambahkan ulasan.";
            $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('transaction/purchase/'.$session_id,'refresh');
        } else {
            $flash_msg = "Gagal menambahkan ulasan!.";
            $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('transaction/purchase/'.$session_id);
        }
    }
    
}

function konfirmasi() {
    
}
 
function selling() {
    $this->load->library('session');
    $this->load->helper('tgl_indo');
    $this->load->module('site_security');
    $this->load->module('store_orders');

    $this->site_security->_make_sure_logged_in();

    $user_id = $this->session->userdata('user_id');
    $col = 'shop_id';
    $val = $user_id;
    $mysql_query = "SELECT * FROM store_orders WHERE shop_id = $val ORDER BY id DESC";
    $data['campaign'] = $this->store_orders->get_where_custom($col, $val);

    $data['view_file'] = "selling";
    $this->load->module('templates');
    $this->templates->market($data);
}

function purchase($session_id) {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('timedate');
    $this->load->module('site_settings');
    $this->site_security->_make_sure_logged_in();

    // get id from session order
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    $data_order = $this->db->where('id', $order_id)->get('store_orders')->row();
    // get all data order
    $data['lokasi'] = $data_order->item_title;
    $data['no_transaksi'] = $data_order->no_transaksi;
    $data['harga'] = $this->site_settings->currency_rupiah($data_order->price);
    $data['durasi'] = $data_order->duration;
    $data['awal_tayang'] = $this->timedate->get_nice_date($data_order->start, 'ok');
    $data['akhir_tayang'] = $this->timedate->get_nice_date($data_order->end, 'ok');

    // untuk icon progrees
    $data['order_id'] = $order_id;
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    $user_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    $data['approved'] = $this->db->where('id', $order_id)->get('store_orders')->row()->approved;

    $data['upl_materi'] = App::get_materi($order_id, $item_id, $user_id);
    $data['dl_materi']= App::get_materi_download($order_id, $item_id, $user_id);

    $data['user_id'] = $this->session->userdata('user_id');
    $data['id'] = $session_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "detail_purchase";
    $this->load->module('templates');
    $this->templates->market($data);
}

function sell($session_id) {
    $this->load->module('site_security');
    $this->load->module('store_orders');
    $this->load->module('timedate');
    $this->load->module('site_settings');
    $this->site_security->_make_sure_logged_in();

    // get id from session order
    $order_id = $this->store_orders->get_id_from_session_id($session_id);
    $data_order = $this->db->where('id', $order_id)->get('store_orders')->row();
    // get all data order
    $data['lokasi'] = $data_order->item_title;
    $data['no_transaksi'] = $data_order->no_transaksi;
    $data['harga'] = $this->site_settings->currency_rupiah($data_order->price);
    $data['durasi'] = $data_order->duration;
    $data['awal_tayang'] = $this->timedate->get_nice_date($data_order->start, 'ok');
    $data['akhir_tayang'] = $this->timedate->get_nice_date($data_order->end, 'ok');

    // untuk icon progrees
    $data['order_id'] = $order_id;
    $item_id = $this->db->where('id', $order_id)->get('store_orders')->row()->item_id;
    $user_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
    $data['approved'] = $this->db->where('id', $order_id)->get('store_orders')->row()->approved;

    $data['upl_materi'] = App::get_materi($order_id, $item_id, $user_id);
    $data['dl_materi']= App::get_materi_download($order_id, $item_id, $user_id);

    $data['user_id'] = $this->session->userdata('user_id');
    $data['id'] = $session_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "detail_sell";
    $this->load->module('templates');
    $this->templates->market($data);
}

function get($order_by)
{
    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_transaction');
    $this->mdl_transaction->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $this->mdl_transaction->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_transaction');
    $this->mdl_transaction->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_transaction');
    $count = $this->mdl_transaction->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_transaction');
    $max_id = $this->mdl_transaction->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_transaction');
    $query = $this->mdl_transaction->_custom_query($mysql_query);
    return $query;
}

}