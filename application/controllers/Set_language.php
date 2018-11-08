<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Set_language extends MX_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->session->set_userdata('lang', $this->input->get('lang'));
		setcookie("lang",$this->input->get('lang'), time() + 86400);
		redirect($_SERVER["HTTP_REFERER"]);
	}
}
/* End of file sys_language.php */
/* Location: ./application/controllers/sys_language.php */