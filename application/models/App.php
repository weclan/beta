<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Freelancer Office
 *
 * Web based project and invoicing management system available on codecanyon
 *
 * @package     Freelancer Office
 * @author      William Mandai
 * @copyright   Copyright (c) 2014 - 2016 Gitbench,
 * @license     http://codecanyon.net/wiki/support/legal-terms/licensing-terms/
 * @link        http://codecanyon.net/item/freelancer-office/8870728
 * @link     	https://gitbench.com
 */

class App extends CI_Model
{

	private static $db;

	function __construct(){
		parent::__construct();
		self::$db = &get_instance()->db;
	}

	// Get all countries
	static function countries() {
		return self::$db->get('countries')->result();
  	}

  	// Get all currencies
	static function currencies($code = FALSE)
	{
		if (!$code) {
			return self::$db->order_by('name','ASC')->get('currencies')->result();
		}
		$c = self::$db->where('code',$code)->get('currencies')->result();
		if (count($c > 0)) { return $c[0]; }
		$c = self::$db->where('code',  config_item('default_currency'))->get('currencies')->result();
		if (count($c > 0)) { return $c[0]; } else { return FALSE; }
	}

	// Get languages
	static function languages($lang = FALSE)
	{
		if (!$lang) {
			return self::$db->order_by('name','ASC')->get('languages')->result();
		}
		$l =  self::$db->where('name',$lang)->get('languages')->result();
		if (count($l > 0)) { return $l[0]; }
		$l =  self::$db->where('name',  config_item('default_language'))->get('languages')->result();
		if (count($l > 0)) { return $l[0]; } else { return FALSE; }
	}

	/**
	* Counts num of records in TABLE
	*/

	static function counter($table,$where = array()) {

		return self::$db->where($where)->get($table)->num_rows();
	}

	// Get activities
	static function get_activity($limit = NULL) {
		return self::$db->order_by('activity_date','desc')->get('activities',$limit)->result();
	}

	// Access denied redirection
	static function access_denied($module) {
		$ci =& get_instance();
		$ci->session->set_flashdata('response_status', 'error');
		$ci->session -> set_flashdata('message', lang('access_denied'));
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Get email template body
	static function email_template($group = NULL,$column = NULL){
		return self::$db->where('email_group',$group)->get('email_templates')->row()->$column;
	}

	// Get number of days
	static function num_days($frequency){
	switch ($frequency)
	{
			case '7D':
				return 7;
			break;
			case '1M':
				return 31;
			break;
			case '3M':
				return 90;
			break;
			case '6M':
				return 182;
			break;
			case '1Y':
				return 365;
			break;
		}
	}

  	/**
	* Insert data to logs table
	*/
	static function Log($data = array()) {
		return self::$db->insert('activities',$data);
	}

	// Get category name using ID
	static function get_category_by_id($category){
		$cat = self::$db->where('id',$category)->get('categories');
		return ($cat->num_rows() > 0) ? $cat->row()->cat_name : 'Uncategorized';
	}
	// Get payment method name using ID
	static function get_method_by_id($method){
		return self::$db->where('method_id',$method)->get('payment_methods')->row()->method_name;
	}

	public static function view_by_id($id)
    {
        return self::$db->where('id', $id)->get('store_item')->row();
    }

	// Get department name
	static function get_dept_by_id($id){
		return self::$db->where('deptid',$id)->get('departments')->row()->deptname;
	}

	// Get a list of payment methods
	static function list_payment_methods(){
		return self::$db->get('payment_methods')->result();
	}

	static function get_by_where($table, $array = NULL, $order_by = array()){
		if(count($order_by) > 0) { self::$db->order_by($order_by['column'],$order_by['order']) ; }
    	return self::$db->where($array)->get($table)->result();
	}

	static function field_meta_value($key, $client){
		$r = self::$db->where(array('meta_key'=>$key,'client_id'=>$client))->get('formmeta');
		return ($r->num_rows() > 0) ? $r->row()->meta_value : NULL;
	}


	// Check if module disabled
	static function module_access($module){
	$result = self::$db->where(array('module' => $module,
								  'hook' => 'main_menu_'.User::get_role(User::get_id())))
						-> get('hooks')->row();
	if($result == NULL || $result->visible == '0'){ redirect(); }else { return; }

	}

	// Save any data
	static function save_data($table, $data){
		self::$db->insert($table,$data);
		return self::$db->insert_id();
	}

	/**
	* Update records in $table matching $match.
	*
	* @return Affected rows int
	*/

	static function update($table,$match = array(),$data = array()) {

		self::$db->where($match)->update($table,$data);
		return self::$db->affected_rows();
	}

	/**
	* Deletes data matching $where in $table.
	*
	* @return boolean
	*/

	static function delete($table,$where = array()) {

		return self::$db->delete($table,$where);
	}

 	// Get locale
 	static function get_locale(){
 		return self::$db->where('locale',config_item('locale'))->get('locales')->row();
 	}

 	// Get locales
 	static function locales()
	{
		return self::$db->order_by('name')->get('locales')->result();
	}

	// Stop running timers by this user
	static function stop_running_timer(){
		$ci = & get_instance();
		$ci->load->model('Project');
		$user = User::get_id();
		$projects = self::$db->where(
							array('timer_started_by'=>$user,'timer'=>'On'))->get('projects')->result();

		foreach ($projects as $key => $project) {
			Project::stop_timer($project->project_id,'project');
		}
		$tasks = self::$db->where(array('timer_started_by'=>$user,'timer_status'=>'On'))->get('tasks')->result();

		foreach ($tasks as $key => $task) {
			Project::stop_timer($task->t_id,'task');
		}
	}

	static function get_admin_by_id($admin) {
		return self::$db->where('id', $admin)->get('accounts')->row();
	}

	static function get_materi($order_id, $item_id, $user_id) {
    	$r = self::$db->where(array('order_id'=>$order_id,'item_id'=>$item_id,'user_id'=>$user_id,'selected'=>1))->get('materi');
    	return ($r->num_rows() > 0) ? $r->num_rows() : NULL;
	}

	static function get_materi_download($order_id, $item_id, $user_id) {
    	$r = self::$db->where(array('order_id'=>$order_id,'item_id'=>$item_id,'user_id'=>$user_id,'download'=>1))->get('materi');
    	return ($r->num_rows() > 0) ? $r->num_rows() : NULL;
	}

}

/* End of file model.php */
