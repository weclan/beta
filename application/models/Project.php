<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Model
{

    private static $db;

    function __construct(){
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    static function timer_status($type = 'order', $id, $user){
    	if ($type == 'order') {
    		$started = self::$db->where(array(
                	'user'=>$user,
                	'order'=>$id,
                	'status'=>'1'))->get('order_timer')->num_rows();
                return ($started > 0) ? 'On' : 'Off';
    	} 
    	
        // switch ($type) {
        //     case 'order':
        //         $started = self::$db->where(array(
        //         	'user'=>User::get_id(),
        //         	'project'=>$id,
        //         	'status'=>'1'))->get('project_timer')->num_rows();
        //         return ($started > 0) ? 'On' : 'Off';
        //         break;

        //     default:
        //         $started = self::$db->where(array('user'=>User::get_id(),'task'=>$id,'status'=>'1'))
        //                             ->get('tasks_timer')->num_rows();
        //         return ($started > 0) ? 'On' : 'Off';
        //         break;
        // }

    }

    // Get project information
    static function by_id($id = NULL)
    {
        return self::$db->where('id',$id)->get('store_orders')->row();
    }

}