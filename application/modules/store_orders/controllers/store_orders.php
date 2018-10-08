<?php
class Store_orders extends MX_Controller 
{

    var $mailFrom;
    var $mailPass;
    var $path_approval;
    function __construct() {
        parent::__construct();
        $this->load->model(array('Client', 'App'));
        $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
        $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
        $path_approval = './marketplace/approval/';
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM store_orders ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query); // $this->get('id');

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

function getData() {
    $this->load->module('timedate');
    $this->load->module('manage_product');
    $this->load->module('manage_daftar');
    $this->load->module('site_settings');

    $mysql_query = "SELECT * FROM store_orders ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $user_id = $row->shopper_id;
        $klien = Client::view_by_id($user_id);
        $persil = Client::view_by_id($row->shop_id);
        $item = App::view_by_id($row->item_id);
        $lokasi = $row->item_title;
        $price = ($row->price != '') ? $this->site_settings->currency_format2($row->price) : 0;
        $durasi = $row->duration;
        $start = $this->timedate->get_nice_date($row->start, 'ok');
        $end = $this->timedate->get_nice_date($row->end, 'ok');
        $date = $this->timedate->get_nice_date($row->date_added, 'ok');
        $opened = $row->opened;
        $slot = $row->slot;

        $order_status = $row->order_status;

        if ($order_status == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Approve";
        } else {
            $status_label = "m-badge--warning";
            $status_desc = "Pending";
        }

        $data_order[] = array(
            "No" => $no++,
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."store_orders/view/".$row->id."'><i class='la la-file-text'></i> Preview Order</a>                                
                            <a class='dropdown-item' href='#' onclick='showAjaxModal2(\"".base_url()."modal/popup/edit_order/".$row->id."/store_orders\")'><i class='la la-edit'></i> Edit Order</a>                                
                            <a class='dropdown-item' href='".base_url()."store_orders/timeline/".$row->id."'><i class='la la-files-o'></i> Payment History</a>                            
                            <a class='dropdown-item' href='".base_url()."store_orders/approval/".$row->id."'><i class='la la-envelope'></i> Kirim Approval</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/set_approve/".$row->id."/store_orders\")'><i class='la la-check-circle-o'></i> Set approve</a>   
                            <a class='dropdown-item' href='".base_url()."review/send_mail_review/".$row->id."'><i class='la la-envelope'></i> Kirim Ulasan</a>                              
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->id."/store_orders\")'><i class='la la-trash'></i> Delete</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/archive/".$row->id."/store_orders\")'><i class='la la-briefcase'></i> Archive</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "ID Order" => $row->no_order,
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."store_orders/view/".$row->id."'>".$lokasi."</a>",
            "Harga" => $price,
            "Durasi" => $durasi." ".$this->duration($durasi),
            "Slot" => $slot." ".$this->slot($slot),
            "Tayang" => $start." <br>-<br> ".$end,
            "Klien" => $klien->username.' <br> '.$klien->company,
            "Status" => "<span style='width: 110px;'><span class='m-badge ".$status_label." m-badge--wide'>".$status_desc."</span></span>",
            "Tanggal" => $date,
            
        );
    }
    echo json_encode($data_order);
}       

function open($opened) {
    return ($opened != 1)? 'seal' : '';
}

function duration($durasi) {
    return ($durasi != '') ? 'bulan' : '-';
}

function slot($slot) {
    return ($slot != '') ? 'slot' : '-';
}

    function view($order_id = null) {
        $this->load->module('site_security');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('store_categories');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);

            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $row->shopper_id;
            $data['owner'] = $row->shop_id;
        }

        $this->_set_to_opened($order_id);

        $data['headline'] = 'Order Detail';

        $data['update_id'] = $order_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function approval($order_id = null) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('store_categories');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);

            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $row->shopper_id;
            $data['owner'] = $row->shop_id;
        }

        $data['update_id'] = $order_id;
        $data['headline'] = "Kirim Approval";
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "approval";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function test() {
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('store_orders');
        }

        if ($submit == "Submit") {
            if ($_FILES['approval']['name'] != '') {
                $file_data = $this->upload_file();

                $path_file = $file_data['full_path'];

                if (file_exists($path_file)) {
                    echo "file exist";

                    echo $path_file;
                }
            }    
        }
    }

    function upload_file() {
        $config['upload_path'] = './marketplace/approval/'; //$this->path_approval; //$this->path;
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('approval')) {
            return $this->upload->data();   
        } else {
            return $this->upload->display_errors();
        }
    }

    function send_approval($order_id = null) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('store_orders/manage');
        }

        if ($submit == "Submit") {
            // get id shopper from id orders
            $customer_id = $this->_get_customer_id($order_id);
            // get email from id user
            $recipient = $this->manage_daftar->get_email_from_id($customer_id); //'webdeveloper@wiklan.com'; 
            $customer_name = $this->manage_daftar->_get_customer_name($customer_id);
            $lokasi = $this->_get_lokasi_name($order_id);

            // jika ada file yg di upload
            if ($_FILES['approval']['name'] != '') {
                $file_data = $this->upload_file();

                if (is_array($file_data)) {
                    $user = 'Admin';
                    $mailTo = $recipient;
                    // $message = '';
                    $subjek = 'MOHON ACC APPROVAL '.$customer_name.' untuk lokasi '.$lokasi;

                    // buat template
                    $data['user_id'] = $customer_id;
                    $mysql_query = "SELECT * FROM store_orders WHERE id = $order_id";
                    $data['products'] = $this->_custom_query($mysql_query);
                    $body = $this->load->view('mail_temp', $data, true);

                    $this->load->library('email');
                    $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
                    $this->email->to($mailTo);
                    $this->email->subject($subjek);
                    $this->email->message($body);
                    $this->email->attach($file_data['full_path']);
                    $this->email->bcc('cs@wiklan.com');
                    $this->email->cc('cs@wiklan.com');

                    if ($this->email->send()){
                        if (file_exists($file_data['full_path'])) {
                            unlink($file_data['full_path']);
                        //if (delete_file($file_data['file_path'])) {
                            $flash_msg = "Approval sended.";
                            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('store_orders/approval/'.$order_id); 
                        }
                        
                    } else {
                        if (file_exists($file_data['full_path'])) {
                            unlink($file_data['full_path']);
                        //if (delete_file($file_data['file_path'])) {
                            $flash_msg = "There is an error in email send.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('store_orders/approval/'.$order_id); 
                        }
                        // show_error($this->email->print_debugger());
                    }
                } else {
                    $flash_msg = "There is an error in attach file.";
                    $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_orders/approval/'.$order_id); 
                }
            }
        }

    }

    function get_all_own_cart($shopper_id) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_item');
        $this->site_security->_make_sure_is_admin();

        // get all location fron specific user
        $now = time();
        $mysql_query = "SELECT * FROM store_orders WHERE shopper_id = $shopper_id AND store_orders.end > $now";
        $query = $this->_custom_query($mysql_query);
        $count = $query->num_rows();

        if ($count > 0) {

            $all_result = array();
            $location = array();
            $final_result = array();

             // get all id from store_item
            $this->db->where('status', 1);
            $this->db->where('deleted <>', '1');
            $all_id = $this->db->get('store_item')->result_array();

            foreach ($all_id as $row) {
                $all_result[] = $row['id'];
            }

            // get array data from store basket
            $location = array();
            foreach ($query->result_array() as $key) {
               $location[] = $key['item_id'];
            }

            $final_result = array_intersect($all_result, $location);

            if (count($final_result) !== 0) {
                $this->db->order_by('id', 'desc');
                $this->db->where('deleted <>', '1');
                $this->db->where_in('id', $final_result);
                $data = $this->db->get('store_item');

                return $data->result();
            }
        } 
    }

    function liat_mail($customer_id) {
        $data = [];
        $data['user_id'] = $customer_id;
        $this->load->view('mail_temp', $data);
    }

    function _get_lokasi_name($order_id) {
        $query = $this->get_where_custom('id', $order_id);
        foreach ($query->result() as $row) {
            $lokasi = $row->item_title;
        }

        if (!isset($lokasi)) {
            $lokasi = 0;
        }

        return $lokasi;
    }

    function archive() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Submit') {
        
            $update_id = $this->input->post('order_id', true);
            $data['archived'] = 1;
            $this->_update($update_id, $data);

            $flash_msg = "Data successfully archived.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/manage/'); 
        }
    }

    function delete() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Delete') {
        
            $update_id = $this->input->post('order_id', true);
            $data['deleted'] = 1;
            $this->_update($update_id, $data);

            $flash_msg = "Data successfully delete.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/manage/'); 
        }
    }

    function _get_status_title() {
        $order_status = $this->uri->segment(3);
        $order_status = str_replace('status', '', $order_status);
        if (!is_numeric($order_status)) {
            $order_status = 0;
        }

        $this->load->module('store_order_status');

        if ($order_status == 0) {
            $status_title = 'Order Submitted';
        } else {
            $status_title = $this->store_order_status->_get_status_title($order_status);
        }

        return $status_title;
    }

    function submit_order_status() {
        $update_id = $this->uri->segment(3);
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        $order_status = $this->input->post('order_status', TRUE);

        if ($submit == "Cancel") {
            $query = $this->get_where($update_id);
            foreach ($query->result() as $row) {
                $order_status = $row->order_status;
            }

            $target_url = base_url().'store_orders/browse/status'.$order_status;
            redirect($target_url);
        } elseif ($submit == 'Submit') {
            $data['order_status'] = $order_status;
            $this->_update($update_id, $data);

            //autimatically generate a message for the customer
            $this->_auto_generate_msg($update_id);

            $flash_msg = "The order status was successfully updated.";
            $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('store_orders/view/'.$update_id);
        }
    }

    function _auto_generate_msg($update_id) {
        $this->load->module('enquiries');
        $this->load->module('store_order_status');
        $this->load->module('site_security');

        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
            $order_status = $row->order_status;
            $order_ref = $row->order_ref;
        }

        if ($order_status == 0) {
            $status_title = 'Order Submitted';
        } else {
            $status_title = $this->store_order_status->_get_status_title($order_status);
        }

        $msg = 'Order '.$order_ref.' has just been updated. ';
        $msg.= 'The new status for your order is '.$status_title.'.';

        $data['subject'] = 'Your order have been updated';
        $data['sent_to'] = $shopper_id;
        $data['message'] = $msg;
        $data['date_created'] = time();
        $data['sent_by'] = 0;
        $data['opened'] = 0;
        $data['code'] = $this->site_security->generate_random_string(6);

        $this->enquiries->_insert($data);
    }

    function _set_to_opened($update_id) {
        $data['opened'] = 1;
        $this->_update($update_id, $data);
    }

    function set_to_approve() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');

        $this->site_security->_make_sure_is_admin();
        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Submit') {
            # code...
        
            $update_id = $this->input->post('order_id', true);

            $shopper = Client::view_by_id($update_id);

            $this->load->module('manage_product');
            $data['order_status'] = 1;
            $this->_update($update_id, $data);

            // update status produk
            // get id produk
            $data_order = $this->db->where('id', $update_id)->get('store_orders')->row();
            $prod_id = $data_order->item_id;
            $data_prod['cat_stat'] = 2;
            $this->manage_product->_update($prod_id, $data_prod);

            // get all data produk
            $produk = $this->db->where('id', $prod_id)->get('store_item')->row();
            $url = base_url()."product/billboard/".$produk->item_url;
            $image_location = base_url().'marketplace/limapuluh/70x70/'.$produk->limapuluh;
            $tipe_kategori = $this->store_categories->get_name_from_category_id($produk->cat_prod);
            $nama_provinsi = $this->store_provinces->get_name_from_province_id($produk->cat_prov);
            $nama_kota = $this->store_cities->get_name_from_city_id($produk->cat_city);

            $detail_produk = array(
                'title' => $produk->item_title,
                'description' => $produk->item_title,
                'start' => $data_order->start,
                'end' => $data_order->end,
                'code' => $produk->prod_code,
                'url' => $url,
                'image' => $image_location,
                'client' => $shopper->username,
                'price' => $produk->item_price,
                'province' => $nama_provinsi,
                'city' => $nama_kota,
                'className' => 'm-fc-event--danger m-fc-event--solid-warning',
                'created' => date('Y-m-d H:i:s')
            );

            $table = 'events';
            App::save_data($table, $detail_produk);

            $flash_msg = "Data successfully approve.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/manage/'); 
        }
    }

    function edit() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $submit = $this->input->post('submit', TRUE);
        
        if ($submit == 'Submit') {
            # code...
        
            $update_id = $this->input->post('order_id', true);
            $data['price'] = str_replace('.', '', $this->input->post('price', true));
            $this->_update($update_id, $data);
        }

        $flash_msg = "Data successfully edit.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_orders/manage/'); 
    }

    function view2() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('cart');
        $this->load->module('timedate');
        $this->load->module('store_accounts');
        $this->load->module('store_order_status');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        // update row to opened
        $this->_set_to_opened($update_id);

        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['order_ref'] = $row->order_ref;
            $date_created = $row->date_created;
            $data['paypal_id'] = $row->paypal_id;
            $session_id = $row->session_id;
            $data['opened'] = $row->order_ref;
            $order_status = $row->order_status;
            $data['shopper_id'] = $row->shopper_id;
            $data['mc_gross'] = $row->mc_gross;
        }

        if ($order_status == 0) {
            $data['status_title'] = 'Order Submitted';
        } else {
            $data['status_title'] = $this->store_order_status->_get_status_title($order_status);    
        }

        $table = 'store_shoppertrack';
        $data['query_cart_contents'] = $this->cart->_fetch_cart_contents($session_id, $data['shopper_id'], $table);

        $data['order_status'] = $order_status;
        $data['date_created'] = $this->timedate->get_nice_date($date_created, 'full');
        $data['options'] = $this->store_order_status->_get_dropdown_options();
        $data['headline'] = 'Orders'.$data['order_ref'];
        $data['store_accounts_data'] = $this->store_accounts->fetch_data_from_db($data['shopper_id']);
        $data['customer_address'] = $this->store_accounts->_get_shopper_address($data['shopper_id'], '<br>');
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function browse() {
        $this->load->module('custom_pagination');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        // count orders for 
        $use_limit = FALSE;
        $mysql_query = $this->_generate_mysql_query($use_limit);
        $query = $this->_custom_query($mysql_query);
        $total_items = $query->num_rows();

        // fetch orders for this page
        $use_limit = TRUE;
        $mysql_query = $this->_generate_mysql_query($use_limit);
        $data['query'] = $this->_custom_query($mysql_query);
        $data['num_rows'] = $data['query']->num_rows();

        // 
        $pagination_data['template'] = 'admin';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_row'] = $total_items;
        $pagination_data['offset_segment'] = 4;
        $pagination_data['limit'] = $this->get_limit();
        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

        $pagination_data['offset'] = $this->get_offset();
        $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data); 
        $data['status_title'] = $this->_get_status_title();
        $data['query'] = $this->_custom_query($mysql_query);

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "browse";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function get_target_pagination_base_url() {
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $third_bit = $this->uri->segment(3);
        $target_base_url = base_url().$first_bit."/".$second_bit."/".$third_bit;
        return $target_base_url;
    }

    function _generate_mysql_query($use_limit) {

        $order_status = $this->uri->segment(3);
        $order_status = str_replace('status', '', $order_status);
        if (!is_numeric($order_status)) {
            $order_status = 0;
        }

        if ($order_status > 0) {
            $mysql_query = "
                SELECT store_orders.id,
                    store_orders.order_ref,
                    store_orders.date_created,
                    store_orders.opened,
                    store_orders.mc_gross,
                    store_accounts.firstname,
                    store_accounts.lastname,
                    store_accounts.company,
                    store_order_status.status_title
                FROM store_orders LEFT JOIN store_accounts ON store_orders.shopper_id = store_accounts.id
                LEFT JOIN store_order_status ON store_orders.order_status = store_order_status.id
                WHERE store_orders.order_status=$order_status ORDER BY store_orders.date_created desc 
            ";
        } else {
            $mysql_query = "
                SELECT store_orders.id,
                    store_orders.order_ref,
                    store_orders.date_created,
                    store_orders.opened,
                    store_orders.mc_gross,
                    store_accounts.firstname,
                    store_accounts.lastname,
                    store_accounts.company,
                FROM store_orders LEFT JOIN store_accounts ON store_orders.shopper_id = store_accounts.id
                WHERE store_orders.order_status=$order_status
                ORDER BY store_orders.date_created desc 
            ";
        }

        if ($use_limit == TRUE) {
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }                        

        return $mysql_query;                        
    }

    function get_limit() {
        $limit = 20;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(4);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
    }

    function _get_mc_gross($paypal_id) {
        $this->load->module('paypal');
        $query = $this->paypal->get_where($paypal_id);

        foreach ($query->result() as $row) {
            $posted_information = $ow->posted_information;
        }

        if (!isset($posted_information)) {
            $mc_gross = 0;
        } else {
             $posted_information = unserialize($posted_information);
            $mc_gross = $posted_information['mc_gross'];
        }

        return $mc_gross;
       
    }

    function _get_shopper_id($customer_session_id) {
        $this->load->module('store_basket');
        $query = $this->store_basket->get_where_custom('session_id', $customer_session_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
        }

        if (!isset($shopper_id)) {
            $shopper_id = 0;
        }

        return $shopper_id;
    }

    function _get_customer_id($order_id) {
        $query = $this->get_where_custom('id', $order_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
        }

        if (!isset($shopper_id)) {
            $shopper_id = 0;
        }

        return $shopper_id;
    }

    function _auto_generate_order($paypal_id, $customer_session_id) {
        //this gets called from paypal IPN
        $this->load->module('site_security');
        $order_ref = $this->site_security->generate_random_string(6);
        $order_ref = strtoupper($order_ref);

        $data['order_ref'] = $order_ref;
        $data['date_created'] = time();
        $data['paypal_id'] = $paypal_id;
        $data['session_id'] = $customer_session_id;
        $data['opened'] = 0;
        $data['order_status'] = 0;
        $data['shopper_id'] = $this->_get_shopper_id($customer_session_id);
        $data['mc_gross'] = $this->_get_mc_gross($paypal_id);
        $this->_insert($data);

        //transfer from store basket to store_shoppertrack
        $this->load->module('store_shoppertrack');
        $this->store_shoppertrack->_transfer_from_basket($customer_session_id);
    }

    function get($order_by)
    {
        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_store_orders');
        $this->mdl_store_orders->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $this->mdl_store_orders->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $this->mdl_store_orders->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_store_orders');
        $count = $this->mdl_store_orders->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_store_orders');
        $max_id = $this->mdl_store_orders->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->_custom_query($mysql_query);
        return $query;
    }

}