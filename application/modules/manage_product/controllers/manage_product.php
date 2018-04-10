<?php
class Manage_product extends MX_Controller 
{

    var $path_big = './marketplace/big_pics/';
    var $path_small = './marketplace/small_pics/';
    var $path_video = './marketplace/video/';
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
        $this->load->helper(array('text', 'tgl_indo_helper'));
    }

    // function do_delete() {
    //     $id = $this->input->post('id');
    //     $type = $this->input->post('tipe');

    //     // check available
    //     $this->db->select('*');
    //     $this->db->where('token', $id);
    //     $query = $this->db->get('gambar');

    //     if ($query->num_rows() > 0) {

    //         foreach ($query->result() as $row) {
    //             $file = $row->image;
    //         }

    //         // delete di DB
    //         $this->db->delete('gambar',array('token'=>$id));

    //         // get location
    //         $loc = $this->location($type);

    //         $pic_path = $loc.$file;

    //         if (file_exists($pic_path)) {
    //             unlink($pic_path);
    //             // delete berhasil
    //             $msg = 'gambar berhasil didelete';
    //             echo json_encode($msg);
    //         } else {
    //             $msg = 'tidak ada gambar';
    //             echo json_encode($msg);
    //         }

    //     }
    // }

    function _make_sure_is_in_db($item_url) {
        $query = $this->get_where_custom('item_url', $item_url);
       
        if ($query->num_rows() > 0) { 
            $exist = TRUE;
        } else {
            $exist = FALSE;
        } 
        return $exist;
    
    }

    function _draw_fav_product() {
        $this->load->helper('text');

        $mysql_query = "select * from store_item order by id desc limit 0,8";
        $data['query'] = $this->_custom_query($mysql_query);
        $this->load->view('fav_product', $data);
    }

    function getAjaxRes($word) {
        $query = $this->db->from('store_item')->like('item_title',$word)->order_by('id', 'asc')->limit(6)->get();  

        $no = 1;
        foreach ($query->result_array() as $row)
        {   
            $class = ($no % 2 == 0) ? 'search-even' : 'search-odd';
            $path = base_url()."product/billboard/".$row['item_url'];
            echo "<div id='searchresults'>";
            echo "<div class='searchresults-wrapper'>";
            echo "<div class=".$class.">";
            echo "<a href=".$path.">".$row['item_title']."<small>".word_limiter($row['item_description'],10)."</small></a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $no++;
       }
    }

    function get_id_from_code($code) {
        $query = $this->get_where_custom('code', $code);
        foreach ($query->result() as $row) {
            $id = $row->id;
        }

        if (!is_numeric($id)) {
            $id = 0;
        }

        return $id;
    }

    function draw_recomm_product($update_id = '') {
        $this->load->helper('text');
        $data = $this->fetch_data_from_db($update_id);
        $id = $data['id'];
        $cat_id = $data['cat_prod'];
        // get cat title
        $this->load->module('store_categories');
        $data['kategori'] = $this->store_categories->_get_cat_title($cat_id);
        $mysql_query = "select * from store_item where not (id = $id) and cat_prod = $cat_id and cat_stat = 1 order by id desc limit 0,5";
        $data['query'] = $this->_custom_query($mysql_query);
        $this->load->view('recomm', $data);
    }

    function getFile($token) {
        header("Content-type:application/pdf");
        //cek nama image dari database
        $this->load->module('report_maintenance');
        $id = $this->report_maintenance->get_id_from_token($token);
        $data = $this->report_maintenance->get_where($id);

        // $this->db->select('*');
        // $this->db->where('id', $id);
        // $data =  $this->db->get($this->table);
        $result =  $data->first_row('array');
        $nama = $result['image'];
        $tipe = $result['type'];
        $loc = $this->location($tipe);
        $path = base_url().$loc.'300x160/'; // $this->destination . '/';

        $name = $path.$nama;
        $data = file_get_contents($path.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
    }

    function get_code_from_prod_id($id) {
        $query = $this->get_where_custom('id', $id);
        foreach ($query->result() as $row) {
            $code = $row->code;
        }

        if (!isset($code)) {
            $code = 0;
        }

        return $code;
    }

    function _get_item_id_from_item_url($item_url) {
        $query = $this->get_where_custom('item_url', $item_url);
        foreach ($query->result() as $row) {
            $item_id = $row->id;
        }

        if (!isset($item_id)) {
            $item_id = 0;
        }

        return $item_id;
    }

    function check_product_mine($user_id, $code) {
        // $mysql_query = "select * from store_item where user_id = '$user_id' and code = '$code'";
        $mysql_query = "select * from store_item where user_id = ? and code = ?";

        $hasil = $this->db->query($mysql_query, array($user_id, $code)); // $this->_custom_query($mysql_query);
        return $hasil;

        // var_dump($result->num_rows());
        // die();
    }

    function match($code)  {
        $query = $this->get_where_custom('code', $code);

        return $query;
    }

    function space_image($filename) {
        $parts      = explode('.', $filename);
        $ext        = array_pop($parts);
        $filename   = array_shift($parts);

        foreach ($parts as $part)
        {
            $filename .= '_'.$part;   
        }
        // echo $filename.'.'.$ext;
        return $filename.'.'.$ext;
    }

    function location($type) {
        switch ($type) {
            // foto dokumen
            case 'ktp':
                $loc = './marketplace/ktp/';
                break;

            case 'sertifikat':
                $loc = './marketplace/sertifikat/';
                break;

            case 'ijin':
                $loc = './marketplace/ijin/';
                break;
                
            case 'npwp':
                $loc = './marketplace/npwp/';
                break;      

            // foto lokasi path
            case 'limapuluh':
                $loc = './marketplace/limapuluh/';
                break;

            case 'seratus':
                $loc = './marketplace/seratus/';
                break;
                
            case 'duaratus':
                $loc = './marketplace/duaratus/';
                break;  

            // foto report path
            case 'listrik':
                $loc = './marketplace/listrik/';
                break;

            case 'lokasi':
                $loc = './marketplace/lokasi/';
                break;
            // asuransi
            default:
                $loc = './marketplace/asuransi/';
                break;
        }

        $path = $loc;
        return $path;
    }

    function process_upload() {
        $this->load->module('site_security');

        $data_json = $this->input->post('objArr');

        $result = json_decode($data_json);

        $update_id = $result[0]->segment;
        $loc = $this->location($result[0]->type);

        $token = $this->site_security->generate_random_string(6);

        $nama_baru = str_replace(' ', '_', $_FILES['file']['name']);
        
        $nmfile = date("ymdHis").'_'.$nama_baru;

        $update_data[$result[0]->type] = $nmfile;

        $this->_update($update_id, $update_data);

        $config['upload_path']          = $loc; //$this->path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size'] = '20048'; //maksimum besar file 2M
        $config['max_width']  = '1600'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $location = base_url().$loc.$nmfile;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $results['gambar'] =  '<img src="'.$location.'" height="150" width="225" id="sumber" class="img-thumbnail" data-id="'.$token.'" data-type="'.$result[0]->type.'" />';
            $results['msg'] = 'sukses';
            $results['token'] = $token; 
            $results['type'] = $result[0]->type;
            echo json_encode($results);
        } else {
            echo $this->upload->display_errors();
        }
    }

    function get_name_from_light_id($id) {
        $light = ($id == '1') ? 'Front Light' : 'Back Light';

        return $light;
    }
 
    function get_name_from_display_id($id) {
        $display = ($id == '1') ? 'Horizontal' : 'Vertikal';

        return $display;
    }

    function view($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->module('selling_points');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('store_districs');

        $this->load->module('store_categories');
        $this->load->module('store_sizes');
        $this->load->module('store_roads');
        $this->load->module('store_labels');
        $this->load->module('store_duration');

        $data = $this->fetch_data_from_db($update_id);
        $data['prod_id'] = $data['id'];
        $data['user'] = $this->session->userdata('user_id');
        $data['sell_points'] = $this->selling_points->get_where_custom('prod_id', $data['id']);
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_module'] = "manage_product";
        $data['page_url'] = "detail_produk";
        // kecamatan kabupaten provinsi
        $data['kecamatan'] = $this->store_districs->get_name_from_distric_id($data['cat_distric']);
        $data['kota'] = $this->store_cities->get_name_from_city_id($data['cat_city']);
        $data['provinsi'] = $this->store_provinces->get_name_from_province_id($data['cat_prov']);
        // kategori produk
        $data['tipe_kategori'] = $this->store_categories->get_name_from_category_id($data['cat_prod']);
        $data['tipe_jalan'] = $this->store_roads->get_name_from_road_id($data['cat_road']);
        $data['tipe_ukuran'] = $this->store_sizes->get_name_from_size_id($data['cat_size']);
        $data['tipe_cahaya'] = $this->get_name_from_light_id($data['cat_light']);
        $data['tipe_display'] = $this->get_name_from_display_id($data['cat_type']);
        $data['tipe_ketersediaan'] = $this->store_labels->get_name_from_label_id($data['cat_stat']);
        $data['tipe_durasi'] = $this->store_duration->get('id');
        // build breadcrumb data array
        $breadcrumbs_data['template'] = 'public_bootstrap';
        $breadcrumbs_data['current_page_title'] = $data['item_title'];
        $breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($update_id);
        $data['breadcrumbs_data'] = $breadcrumbs_data;

        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function _generate_breadcrumbs_array($update_id) {
        $homepage_url = base_url();
        $breadcrumbs_array[$homepage_url] = 'Home';
        
        // get sub cat id
        $data = $this->fetch_data_from_db($update_id);
        $sub_cat_id = $data['cat_prod']; // $this->_get_sub_cat_id($update_id);
        // get sub cat title
        $this->load->module('store_categories');
        $sub_cat_title = $this->store_categories->_get_cat_title($sub_cat_id);
        // get sub cat url
        $sub_cat_url = $this->store_categories->_get_full_cat_url($sub_cat_id);

        $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
        return $breadcrumbs_array;
    }

    function add_map($update_id) {
        $update_id = $this->uri->segment(3);

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $submit = $this->input->post('submit', true);
        if ($submit == "Cancel") {
            redirect('manage_product/create/'.$update_id);
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('sr_address', 'Alamat', 'required');
            $this->form_validation->set_rules('sr_lat', 'Latitude', 'required|numeric');
            $this->form_validation->set_rules('sr_lng', 'Longitude', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data['address'] = $this->input->post('sr_address', true);
                $data['lat'] = $this->input->post('sr_lat', true);
                $data['long'] = $this->input->post('sr_lng', true);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The map were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('manage_product/create/'.$update_id);
                }
            }
        }    

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Add Map";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "add_map";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_big.$file_name;
        $config['new_image'] = $path_small.$file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    function add_video($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('manage_product/create/'.$update_id);
        }

        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("ymd");
            $configVideo['upload_path'] = $this->path_video;
            $configVideo['max_size'] = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date.$_FILES['video']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);

            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
                $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
                $data['headline'] = "Upload error";
                $data['video_name'] = '';
                $data['update_id'] = $update_id;
                $data['flash'] = $this->session->flashdata('item');
                $data['view_file'] = "upload_video";
                $this->load->module('templates');
                $this->templates->admin($data);
            } else {
                $videoDetails = $this->upload->data();
                $data['video_name']= $configVideo['file_name'];
                $data['video_detail'] = $videoDetails;

                // $data = array('upload_data' => $this->upload->data());

                // $upload_data = $data['upload_data'];
                $file_name = $configVideo['file_name']; // $upload_data['file_name'];

                //update database
                $update_data['video'] = $this->space_image($file_name);
                $this->_update($update_id, $update_data);

                $flash_msg = "The video were successfully uploaded.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);

                $data['headline'] = "Upload Success";
                $data['update_id'] = $update_id;
                $data['flash'] = $this->session->flashdata('item');
                $data['view_file'] = "show_video";
                $this->load->module('templates');
                $this->templates->admin($data);
            }
            
        }

        
    }

    function do_upload($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('manage_product/create/'.$update_id);
        }

        $config['upload_path']          = $this->path_big;
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
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_product";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
        else
        {
    
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            //update database
            $update_data['big_pic'] = $file_name;
            $update_data['small_pic'] = $file_name;
            $this->_update($update_id, $update_data);

            $flash_msg = "The image were successfully uploaded.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_product";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }

    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

        $big_pic_path = $this->path_big.$big_pic;
        $small_pic_path = $this->path_small.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['big_pic'] = "";
        $data['small_pic'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The product image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_product/create/'.$update_id);
    } 

    function delete_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $video = $data['video'];

        $video_path = $this->path_video.$video;

        if (file_exists($video_path)) {
            unlink($video_path);
        } 

        unset($data);
        $data['video'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The video were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_product/create/'.$update_id);
    } 

    function upload_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function upload_document($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_document";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function upload_maintenance($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_maintenance";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function upload_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Video";
        $data['update_id'] = $update_id;
        $data['video_name'] = '';
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_video";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_provinces');
    $this->load->module('store_cities');
    $this->load->module('store_categories');
    $this->load->module('store_roads');
    $this->load->module('store_sizes');
    $this->load->module('store_labels');
    $this->load->module('report_maintenance');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_product/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_title', 'Item title', 'required|max_length[204]');
        // $this->form_validation->set_rules('item_price', 'Item price', 'required|numeric');
        $this->form_validation->set_rules('item_description', 'Item description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|numeric');
        $this->form_validation->set_rules('cat_prod', 'Kategori', 'required|numeric');
        $this->form_validation->set_rules('cat_road', 'Jenis Jalan', 'required|numeric');
        $this->form_validation->set_rules('cat_size', 'Ukuran', 'required|numeric');
        $this->form_validation->set_rules('cat_stat', 'Status ketersediaan', 'required|numeric');
        $this->form_validation->set_rules('cat_type', 'Tipe', 'required|numeric');
        $this->form_validation->set_rules('cat_light', 'Pencahayaan', 'required|numeric');
        $this->form_validation->set_rules('cat_prov', 'Provinsi', 'required|numeric');
        $this->form_validation->set_rules('cat_city', 'Kota/Kabupaten', 'required|numeric');
        $this->form_validation->set_rules('cat_distric', 'Kecamatan', 'required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            // generate kode produk dari id provinsi & kota
            $keyCode = $data['cat_prov'].$data['cat_city'];

            $cek_kode = $this->checkCode($keyCode);
            $kode = "";
            foreach($cek_kode->result() as $ck)
            {
                if($ck->prod_code == NULL)
                {
                    $kode = $keyCode.'0001';
                }
                else
                {
                    $kd_lama = $ck->prod_code ;
                    $kode = $kd_lama + 1;
                }
            }

            $data['prod_code'] = $kode;
            $data['item_url'] = url_title($data['item_title'].' '.$data['prod_code']);

            // generate random code
            $data['code'] = $this->site_security->generate_random_string(12);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The product were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_product/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The product was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_product/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
        $data['big_pic'] = "";
        $data['video'] = "";

        $data['lat'] = "";
        $data['long'] = "";

        $data['ktp'] = "";
        $data['npwp'] = "";
        $data['sertifikat'] = "";
        $data['ijin'] = "";

        $data['limapuluh'] = "";
        $data['seratus'] = "";
        $data['duaratus'] = "";
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Produk";
    } else {
        $data['headline'] = "Update Produk";
    }


    $data['prov'] = $this->store_provinces->get('id_prov');
    $data['city'] = $this->store_cities->get('id_kab');
    $data['jenis'] = $this->store_categories->get('id');
    $data['jalan'] = $this->store_roads->get('id'); 
    $data['ukuran'] = $this->store_sizes->get('id');
    $data['ketersediaan'] = $this->store_labels->get('id');
    $data['reports'] = $this->report_maintenance->get_where_custom('prod_id', $update_id);
    
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = "select store_item.*, provinsi.*, kabupaten.*, store_categories.*, store_roads.*, store_labels.*, store_item.id as id_produk, store_item.status as stat_prod, provinsi.nama as provinsi, kabupaten.nama as kabupaten from store_item left join provinsi on store_item.cat_prov=provinsi.id_prov left join kabupaten on store_item.cat_city=kabupaten.id_kab left join store_categories on store_item.cat_prod=store_categories.id left join store_roads on store_item.cat_road=store_roads.id left join store_labels on store_item.cat_stat=store_labels.id order by store_item.id desc";

    // $result = $this->_custom_query($mysql_query);
    $data['query'] = $this->_custom_query($mysql_query); // $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_product";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    
    $data['item_title'] = $this->input->post('item_title', true);
    $data['item_price'] = $this->input->post('item_price', true);
    $data['item_description'] = $this->input->post('item_description', true);
    $data['was_price'] = $this->input->post('was_price', true);
    $data['cat_prod'] = $this->input->post('cat_prod', true);
    $data['cat_road'] = $this->input->post('cat_road', true);
    $data['cat_size'] = $this->input->post('cat_size', true);
    $data['cat_stat'] = $this->input->post('cat_stat', true);
    $data['cat_type'] = $this->input->post('cat_type', true);
    $data['cat_light'] = $this->input->post('cat_light', true);
    $data['item_address'] = $this->input->post('item_address', true);
    $data['cat_prov'] = $this->input->post('cat_prov', true);
    $data['cat_city'] = $this->input->post('cat_city', true);
    $data['cat_distric'] = $this->input->post('cat_distric', true);
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function checkCode($key) {
    // $this->load->module('site_security');
    // $this->site_security->_make_sure_is_admin();

    $mysql_query = "select MAX(prod_code) FROM store_item where prod_code like '%$key%'";
    
    $result = $this->_custom_query($mysql_query);

    return $result;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['prod_code'] = $row->prod_code;
        $data['item_title'] = $row->item_title;
        $data['item_url'] = $row->item_url;
        $data['item_price'] = $row->item_price;
        $data['item_description'] = $row->item_description;
        $data['item_address'] = $row->item_address;
        $data['big_pic'] = $row->big_pic;
        $data['small_pic'] = $row->small_pic;
        $data['video'] = $row->video;
        $data['was_price'] = $row->was_price;
        $data['cat_prod'] = $row->cat_prod;
        $data['cat_road'] = $row->cat_road;
        $data['cat_size'] = $row->cat_size;
        $data['cat_stat'] = $row->cat_stat;
        $data['cat_type'] = $row->cat_type;
        $data['cat_light'] = $row->cat_light;
        $data['address'] = $row->address;
        $data['lat'] = $row->lat;
        $data['long'] = $row->long;
        $data['cat_prov'] = $row->cat_prov;
        $data['cat_city'] = $row->cat_city;
        $data['cat_distric'] = $row->cat_distric;
        $data['created_at'] = $row->created_at;
        $data['updated_at'] = $row->updated_at;
        $data['status'] = $row->status;
        //
        $data['ktp'] = $row->ktp;
        $data['npwp'] = $row->npwp;
        $data['sertifikat'] = $row->sertifikat;
        $data['ijin'] = $row->ijin;

        $data['limapuluh'] = $row->limapuluh;
        $data['seratus'] = $row->seratus;
        $data['duaratus'] = $row->duaratus;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

        $big_pic_path = $this->path_big.$big_pic;
        $small_pic_path = $this->path_small.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        // delete the item record from db
        $this->_delete($update_id);
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
        redirect('manage_product/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        $this->_process_delete($update_id);

        $flash_msg = "The banner were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_product/manage');
    }
}


function get($order_by)
{
    $this->load->model('mdl_product');
    $query = $this->mdl_product->get($order_by);
    return $query;
}

function get_where_with_limit($col, $value, $limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_where_with_limit($col, $value, $limit, $offset, $order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_product');
    $this->mdl_product->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $this->mdl_product->_update($id, $data);
}

function _update_upload($id, $data)
{
    if (!isset($id)) {
        die('No token exist!');
    }

    $this->load->model('mdl_product');
    $this->mdl_product->_update_upload($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $this->mdl_product->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_product');
    $count = $this->mdl_product->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_product');
    $max_id = $this->mdl_product->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_product');
    $query = $this->mdl_product->_custom_query($mysql_query);
    return $query;
}

}