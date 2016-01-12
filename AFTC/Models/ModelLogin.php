<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 16/12/2015
 */

namespace AFTC\Framework\App\Models;

use AFTC\Framework\Core\Model;

class ModelLogin extends Model
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		parent::__construct();
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function test($email,$password)
	{
		$params = array(
			":email"=>$email,
			":password"=>$password
		);
		$this->getRows("SELECT * FROM users WHERE email = :email AND password = :password",$params);
		return $this->db->driver->result;
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}