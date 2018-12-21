<?php
class Store_voucher extends MX_Controller 
{

function __construct() {
	parent::__construct();
}

	public function index()
    {
        $this->load->module('site_security');
        $this->load->module('manage_poin');
        $this->load->module('manage_voucher');
        $this->site_security->_make_sure_logged_in();

        $user_id = $this->session->userdata('user_id');
        $this->load->module('manage_daftar');
        $query = $this->manage_daftar->get_where($user_id);
        foreach ($query->result() as $row) {
            $data['username'] = $row->username;
            $data['company'] = $row->company;
            $data['pic'] = $row->pic;
            $data['update_id'] = $row->user_code;
        }

        // get jumlah point
        $query2 = $this->manage_poin->get_where($user_id);
        foreach ($query2->result() as $val) {
        	$data['point'] = $val->points;
        }

        $data['headline'] = '';
        $data['vouchers'] = $this->manage_voucher->get_data();
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->market($data);
    }

	function view($url) {
	    $this->load->module('timedate');
	    $this->load->module('site_settings');
	    $this->load->module('manage_voucher');
	    $this->load->module('manage_poin');
	    $update_id = $this->manage_voucher->_get_id_from_item_url($url);

	    // get all data from voucher
	    $data = $this->manage_voucher->fetch_data_from_db($update_id);
	    $data['voucher_title'] = $data['voucher_title'];
	    $data['voucher_slug'] = $data['voucher_slug'];
	    $data['ketentuan'] = $data['ketentuan'];
	    $data['featured_image'] = $data['featured_image'];
	    $data['cara_pakai'] = $data['cara_pakai'];
	    $data['point_use'] = $data['point_use'];
	    $data['start'] = $this->timedate->get_nice_date($data['start'], 'indon2');
	    $data['end'] = $this->timedate->get_nice_date($data['end'], 'indon2');

	    //get user point
	    $user_id = $this->session->userdata('user_id');
	    // get jumlah point
        $data['point'] = $this->manage_poin->get_point($user_id);
        
	    // build breadcrumb data array
	    $breadcrumbs_data['template'] = 'public_bootstrap';
	    $breadcrumbs_data['current_page_title'] = $data['voucher_title'];
	    $breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($update_id);
	    $data['breadcrumbs_data'] = $breadcrumbs_data;

	    $data['headline'] = '';
	    $data['view_file'] = "view";
	    $this->load->module('templates');
	    $this->templates->market($data);
	}

	function _generate_breadcrumbs_array($update_id) {
	    $homepage_url = base_url('store_voucher');
	    $breadcrumbs_array[$homepage_url] = 'TokoPoints';
	    
	    // $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
	    return $breadcrumbs_array;
	}
}