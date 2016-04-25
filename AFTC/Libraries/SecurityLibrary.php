<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 01/02/2016
 *
 * // https://github.com/paragonie/random_compat (php7 has this function, 5 doesnt)
 * $salt1 = bin2hex(random_bytes(10));
 * $salt2 = bin2hex(random_bytes(11));
 *
 *
 */

namespace AFTC\Framework\App\Libraries;

use AFTC\Framework\App\Variables;
use AFTC\Framework\Config;
use AFTC\Framework\Utilities;

class SecurityLibrary
{

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private $encryption;
	private $session = "";
	private $cookie = "";
	private $model;

	private $PageAccessLevel = "";

	private $SessionVariablesValid = false;
	private $Redirect = true;

	public $LoggedIn = false;
	public $Admin = false;
	public $User = false;

	private $result;
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct($PageAccessLevel = "", $Redirect = true)
	{

		// Component, Model, Helper ini
		$this->encryption = new EncryptionLibrary();
		$this->cookie = new CookieLibrary();
		$this->session = new SessionLibrary();

		$this->PageAccessLevel = $PageAccessLevel;
		$this->Redirect = $Redirect;

		$this->SessionVariablesValid = $this->validateSessionVariables();
		//vd($this->SessionVariablesValid);

		if ($this->SessionVariablesValid) {
			// User is logged in set vars
			if ($this->session->get("access_level") == "user") {
				$this->LoggedIn = true;
				$this->User = true;
				$this->Admin = false;
			} elseif ($this->session->get("access_level") == "admin") {
				$this->LoggedIn = true;
				$this->User = false;
				$this->Admin = true;
			} else {
				$this->LoggedIn = false;
				$this->User = false;
				$this->Admin = false;
			}
		}

		/*
				trace($this->LoggedIn);
				trace($this->User);
				trace($this->Admin);

				*/

		// If we want to use this class as a utility without redirects
		if (!$this->Redirect) {
			return;
		}

		// Handle maintenance mode
		if (Variables::$maintenance_mode && !$this->Admin) {
			redirect(Config::$root_absolute_path . "maintenance");
			die;
		} else {

			// Only validate user and admin user & page access levels
			if ($this->Admin) {
				// Admins get full access regardless of page access level
				return;
			}

			if ($this->PageAccessLevel === "user" && !$this->User && !$this->Admin) {
				//trace("PAGE IS FOR USER - USER:FALSE ADMIN:FALSE");
				redirect(Config::$root_absolute_path . "access-denied");
				die;
			}

			if ($this->PageAccessLevel === "admin" && !$this->Admin) {
				//trace("PAGE IS FOR ADMIN - ADMIN:FALSE");
				redirect(Config::$root_absolute_path . "admin-access-denied");
				die;
			}
		}

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private function validateSessionVariables()
	{
		$valid = true;
		if (!$this->session->doesKeyExist("loggedin")) {
			//trace("session loggedin doesn't exist!");
			$valid = false;
			return $valid;
		}
		if (!$this->session->doesKeyExist("user_id")) {
			//trace("session user_id doesn't exist!");
			$valid = false;
			return $valid;
		}
		if (!$this->session->doesKeyExist("email")) {
			//trace("session email doesn't exist!");
			$valid = false;
			return $valid;
		}
		if (!$this->session->doesKeyExist("access_level")) {
			//trace("session access_level doesn't exist!");
			$valid = false;
			return $valid;
		}

		// Check Session logged in code is valid
		if ($this->session->get("loggedin") != Variables::$SessionLoggedInCode) {
			//trace("SESSION LOGGEDIN CODE NOT VALID!");
			$valid = false;
			return $valid;
		}

		// Check user group names
		if (($this->session->get("access_level") != "user") && ($this->session->get("access_level") != "admin")) {
			//trace("SESSION USER GROUP IS INVALID!");
			$valid = false;
			return $valid;
		}
		
		return $valid;
	}

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -





	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function getUserAccessLevel()
	{
		if ($this->LoggedIn && $this->Admin) {
			return "admin";
		} elseif ($this->LoggedIn && $this->User) {
			return "user";
		} else {
			return "public";
		}
	}

	public function isLoggedin()
	{
		return $this->LoggedIn;
	}

	public function isAdmin()
	{
		return $this->Admin;
	}

	public function isUser()
	{
		return $this->User;
	}

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function createSID()
	{
		$salt1 = bin2hex(random_bytes(20));
		$salt2 = bin2hex(random_bytes(20));
		//$salt1 = random_bytes(20);
		//$salt2 = random_bytes(20);
		$sid = $this->getSID($salt1, $salt2);
		/*
		// Due to length limits password_hash with BCRYPT cant be used
		$options = [
			'cost' => Config::$password_hashing_cost,
		];
		$hash = password_hash($sid, PASSWORD_BCRYPT, $options);
		*/
		$hash = hash('sha512', $sid);
		return [
			"salt1" => $salt1,
			"salt2" => $salt2,
			"hash" => $hash
		];
	}

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function getSID($salt1, $salt2)
	{
		$sid = $salt1 . strtolower(Utilities::getUserIP()) . $salt2 . strtolower($_SERVER['HTTP_USER_AGENT']);
		return $sid;
	}

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function isValidSID($DBHash, $salt1, $salt2)
	{
		$sid = $this->getSID($salt1, $salt2);
		$new_hash = hash("sha512", $sid);

		if ($new_hash === $DBHash) {
			return true;
		} else {
			return false;
		}

		//return password_verify($this->getSID($salt1,$salt2),$SIDHash);
	}

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function createPassword($password)
	{
		// Set these too big and verify_passowrd will return true regardless of inputs
		$salt1 = random_bytes(20);
		$salt2 = random_bytes(20);
		$pwd = $salt1 . $password . $salt2;

		$options = [
			'cost' => Config::$password_hashing_cost,
		];
		$hash = password_hash($pwd, PASSWORD_BCRYPT, $options);

		return [
			"salt1" => $salt1,
			"salt2" => $salt2,
			"hash" => $hash
		];
	}

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function isValidPassword($salt1, $salt2, $password, $hash)
	{
		$pwd = $salt1 . $password . $salt2;
		return password_verify($pwd, $hash);
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function getPostbackCode()
	{
		if (!$this->encryption){
			$this->encryption = new EncryptionLibrary();
		}
		return base64_encode($this->encryption->encrypt(Variables::$PostbackCode));
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function isPostbackCodeValid($input=null)
	{
		$postback = "";
		if ($input == null){
			$postback = Utilities::getCleanPost("postback");
		} else {
			$postback = $input;
		}

		if ($postback == null){
			return false;
		}

		$postback = base64_decode($postback);
		$postback = $this->encryption->decrypt($postback);

		if ($postback === Variables::$PostbackCode) {
			return true;
		} else {
			return false;
		}

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

}