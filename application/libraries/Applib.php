<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applib {

	private static $db;

	function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->database();

        self::$db = &get_instance()->db;

    }

	static function time_elapsed_string($ptime)
    {
        date_default_timezone_set('Asia/Jakarta');
        $etime = time() - $ptime;

        if ($etime < 1)
        {
            return '0 seconds';
        }

        $a = array( 365 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60  =>  'month',
            24 * 60 * 60  =>  'day',
            60 * 60  =>  'hour',
            60  =>  'minute',
            1  =>  'second'
        );
        $a_plural = array( 'year'   => 'years',
            'month'  => 'months',
            'day'    => 'days',
            'hour'   => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str)
        {
            $d = $etime / $secs;
            if ($d >= 1)
            {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) .' '.'ago';
            }
        }
    }

}