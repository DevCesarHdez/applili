<?php namespace App\Validation;

use Config\Services;

/**
 * 
 */
class Rules
{
	private $session;

	function date_greater_than(string $str, string $min_date): bool
	{
		return strtotime($str) > strtotime($min_date);
	}
	
	function valid_current_date(string $str): bool
	{
		$c_date = strtotime(date("Y/m/d H:i", time()));
		return $c_date < strtotime($str);
	}

	function valid_time_interval(string $str): bool
	{
		# code...
	}

	function create_valid_role(string $str): bool
	{
		$this->session = Services::session();
		if ( (int)$str < $this->session->get('userData.role') ) return false;

		return true;
	}
}